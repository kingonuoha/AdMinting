<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Deals;
use Livewire\Component;

class CreatorProfilePublic extends Component
{
    public $user;
    public $selected_user_id;
    public $stuff;
    public $isEditing = false, $editingUrl;
    public $title, $bio, $galleryLinks = [];
    // deals
    public $deal_title, $deal_description, $deal_features = [], $deal_price, $deal_delivery, $deal_licence, $deal_selectable_features ;
    // option
    public $option_title, $option_description, $option_price, $option_delivery;

    public $user_deals = [], $user_options = [];

    public function addFileLink($fileLink)
    {
        if(!is_null($fileLink)){
            $this->galleryLinks = array_merge($this->galleryLinks, $fileLink);
        createLog("you uploaded a file", getIcon('file-up'), 'info');

        }
        
    }
    public function editProfile()
    {
        $this->isEditing = true;
        return redirect()->away($this->editingUrl);
    }
    public function openDealModal()
    {
        $this->resetErrorBag();
       $this->dispatchBrowserEvent('modal:openDealModal');
    }
    public function openOptionModal()
    {
       $this->dispatchBrowserEvent('modal:openOptionModal');
    }

    public function saveProfileUpdate()
    {
        // dd($this->galleryLinks);
        $this->validate([
            'title' => "required", // also check for word count
            'bio' => "required" // also check for word count
        ]);
        $this->user->advertiserInfos()->update([
            "profile_title" => $this->title,
            'bio' => $this->bio,
            'gallery' => $this->galleryLinks
        ]);
        $this->dispatchBrowserEvent('success_alert', [
            "message"=> "Profile has been updated successfully"
        ]);
    }
    public function saveDeal()
    {
        // dd($this->deal_features);
      $data =   $this->validate([
            'deal_title' => "required|max:100", // also check for word count
            'deal_description' => "required|max:500", // also check for word count
            'deal_features' => "required", // also check for word count
            'deal_price' => "required|numeric|gt:5000", // also check for word count
            'deal_delivery' => "required", // also check for word count
            // 'deal_licence' => "required", // also check for word count
        ]);
        $this->user->deals()->create([
            'title' => $data["deal_title"], // also check for word count
            'description' => $data["deal_description"], // also check for word count
            'features' => $data["deal_features"], // also check for word count
            'price' => $data["deal_price"], // also check for word count
            'delivery' => $data["deal_delivery"], // also check for word count
            // 'licence' => $data["deal_licence"], // also check for word count
            'type' => "deal"
        ]);
        $this->dispatchBrowserEvent('success_alert', [
            "message"=> "Deal has been added to your public profile"
        ]);
              $this->dispatchBrowserEvent('modal:closeDealModal');
              createLog("you created a deal", getIcon('dollar'), 'success');

    }


    public function saveOption()
    {
        // dd($this->deal_features);
      $data =   $this->validate([
           "option_title" => 'required|max:100', // also check for word count
            "option_description" => 'required|max:500', // also check for word count
            "option_price" => 'required|numeric|gt:3000', // also check for word count
            "option_delivery" => 'required' // also check for word count

        ]);
            // $data['type'] = "deal";
        $this->user->deals()->create([
            "title" => $data['option_title'], // also check for word count
            "description" => $data['option_description'], // also check for word count
            "price" => $data['option_price'], // also check for word count
            "delivery" => $data['option_delivery'], // also check for word count
            'type' => "option"

        ]);
        $this->dispatchBrowserEvent('success_alert', [
            "message"=> "Deal has been added to your public profile"
        ]);
        $this->dispatchBrowserEvent('modal:closeOptionModal');
    }

    public function mount()
    {
        if (is_null($this->selected_user_id)) {
            $this->user = User::find(auth()->user()->id);
        } else {
            $this->user = User::find($this->selected_user_id);
        }

        $this->editingUrl = request()->url()."?editingProfile=".true;
        // check if user is editing profile
        if(request()->editingProfile && $this->user->id == auth()->user()->id){
        $this->isEditing = true;
        
    }else if(request()->editingProfile &&  env('APP_TESTING')){
            $this->isEditing = true;

        }
        $this->deal_selectable_features = (new Deals())->features;
       
        // dd($this->user->advertiserInfos);
        $this->title = (is_null($this->user->advertiserInfos->profile_title))? $this->user->name.": Master of Content Creation": $this->user->advertiserInfos->profile_title;
        $this->bio = $this->user->advertiserInfos->bio;
        $this->galleryLinks = (is_null($this->user->advertiserInfos->gallery))? []: $this->user->advertiserInfos->gallery;
           
    }

    public function click()
    {
        $this->stuff = now();
    }
    public function render()
    {
        $this->user_deals = $this->user->deals()->where('type', 'deal')->get();
        // dd( $this->user_deals);
        $this->user_options =  $this->user->deals()->where('type', 'option')->get();
        // dd($this->user_deals);
        return view('livewire.creator-profile-public');
    }
}
