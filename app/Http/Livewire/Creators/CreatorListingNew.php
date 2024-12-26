<?php

namespace App\Http\Livewire\Creators;

use App\Models\Deals;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\CreatorListing;

class CreatorListingNew extends Component
{
    public $user, $step = 1; // Current step
    public $listingId; // ID of the draft listing
    public $listingData = [
        'title' => '',
        'slug' => '',
        'description' => '',
        'media' => [],
        'status' => 'draft',
        'social_page_id' => null,
    ]; // Stores form data for the listing

    public $deals = []; // Stores all deals for the current listing
    public $currentDeal = []; // Temporarily stores deal data for editing/creating
    public $editingDealId = null; // Tracks if a deal is being edited

    protected $rules = [
        1 => [
            'listingData.social_page_id' => 'required|exists:social_pages,id',
        ],
        2 => [
            'listingData.title' => 'required|string|max:255',
            'listingData.description' => 'nullable|string',
        ],
        3 => [
            'currentDeal.name' => 'required|string|max:255',
            'currentDeal.description' => 'nullable|string',
            'currentDeal.price' => 'required|numeric|min:10000',
            'currentDeal.delivery_duration' => 'required|integer|min:1',
            'currentDeal.is_optional' => 'boolean',
            'currentDeal.questions' => 'nullable|array',
        ],
        4 => [
            "deals" => "required"
        ],
        "custom_message" =>  [
            "deals.required" => "you need to have at least 1 deal connected to this listing"
        ]
    ];

    protected $listeners = ['fileUploaded'];

    public function mount($user, $listingId = null)
    {
        $this->user = $user;
        // dd(request()->listing_id);
        // Check if we're editing an existing draft
        if ($listingId || isset(request()->listing_id)) {
            $this->listingId = $listingId ?? (int)request()->listing_id;
            // dd($this->listingId);
            $listing = CreatorListing::findOrFail($this->listingId);
            $this->listingData = $listing->toArray();
            $this->deals = $listing->deals->toArray();
        }
    }


    public function addFileLink($fileInfo)
    {
        // dd($fileInfo);
        // Append the uploaded file info to the media array
        $this->listingData['media'][] = $fileInfo;
        $this->saveDraft(); // Save the updated media data as a draft
    }

    public function saveDraft()
    {
        // dd($this->listingId);

        if(!empty($this->listingData['title']) && empty($this->listingData['slug'])){
            $this->listingData['slug']  = Str::slug($this->listingData['title'], "_");
        }
        if($this->step === 4){
            
            $this->listingData["status"] ="awaiting approval";
            $this->dispatchBrowserEvent('showToast', [
                'message'=>'Listing saved successfully, redirecting...',
                "type"=>"success"
            ]);
            
            $listing = $this->user->creator_listings()->updateOrCreate(
                ['id' => $this->listingId],
                $this->listingData
            );
            return to_route('user.services.show', "@".$this->user->username);
        }
        $listing = $this->user->creator_listings()->updateOrCreate(
            ['id' => $this->listingId],
            $this->listingData
        );
       return  $this->listingId = $listing->id;
    }

    public function nextStep()
    {
        if($this->step === 3){
            $this->validateStep(4);
        }else{
            $this->validateStep();
        }
        $this->saveDraft();
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function validateStep($step = null)
    {
        if($step === 4){
            $rules = $this->rules[$step] ?? [];
        }else{
            $rules = $this->rules[$this->step] ?? [];
        }
        $this->validate($rules, $this->rules["custom_message"] );
    }

    public function addDeal()
    {
        // dd($this->listingId);
        if (isset($this->currentDeal['questions']) && is_string($this->currentDeal['questions'])) {
            // Convert newline-separated questions into an array
            $this->currentDeal['questions'] = array_filter(array_map('trim', explode("\n", $this->currentDeal['questions'])));
        }
        $this->validateStep();
        $this->currentDeal['listing_id'] = $this->listingId;
        Deals::create($this->currentDeal);
        $this->resetDealForm();
        $this->refreshDeals();
    }

    public function editDeal($dealId)
    {
        $deal = Deals::findOrFail($dealId);
        $this->currentDeal = $deal->toArray();
        $this->editingDealId = $dealId;
    }

    public function updateDeal()
    {
        $this->validateStep();
        $deal = Deals::findOrFail($this->editingDealId);
        $deal->update($this->currentDeal);
        $this->resetDealForm();
        $this->refreshDeals();
    }

    public function deleteDeal($dealId)
    {
        $deal = Deals::findOrFail($dealId);
        $deal->delete();
        $this->refreshDeals();
    }

    public function resetDealForm()
    {
        $this->currentDeal = [];
        $this->editingDealId = null;
    }

    public function refreshDeals()
    {
        $this->deals = Deals::where('listing_id', $this->listingId)->get()->toArray();
    }

    public function finalizeListing()
    {
        $this->saveDraft();
        CreatorListing::where('id', $this->listingId)->update(['status' => 'published']);
        session()->flash('message', 'Listing finalized and published!');
    }

    public function reorderMedia(array $orderedIds)
{
    // Reorder the $listingData['media'] array based on $orderedIds
    $newOrder = [];
    foreach ($orderedIds as $id) {
        $newOrder[] = $this->listingData['media'][$id];
    }
    $this->listingData['media'] = $newOrder;

    // Save the new order to the database
    CreatorListing::where('id', $this->listingId)->update([
        'media' => $this->listingData['media'],
    ]);

    $this->dispatchBrowserEvent('showToast', [
        'message'=>'The media order has been updated successfully.',
        "type"=>"success"
    ]);
 
}



    public function render()
    {
        // get connected accounts
        $pages = [];
        foreach ($this->user->socialAccounts as $account) {
            foreach ($account->socialPages as $page) {
                // get followers for each page and add to the page object
                $page->followers = $page->metrics()->firstWhere("name", "followers")->value ?? null;
                if (!is_null($page->followers)) {
                    $page->followers =  formatNumber($page->followers);
                }


                array_push($pages, $page);
            }
        }
        // dd($pages);
        return view('livewire.creators.creator-listing-new', compact("pages"));
    }
}
