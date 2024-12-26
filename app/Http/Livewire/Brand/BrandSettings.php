<?php

namespace App\Http\Livewire\Brand;

use Livewire\Component;

class BrandSettings extends Component
{
    public $brand, $short_desc, $description, $phone_number, $location;
    protected $listeners = [
        "refreshComponent" => '$refresh'
    ];

    // public function mount()
    // {
    // }

    public function updateBrand()
    {
        // dd('hi mf');
        $this->validate([
            "short_desc" => "required",
            "description" => "required",
            "phone_number" => "required",
            "location" => "required",
            "short_desc" => "required",
        ]);
        $phone_number = explode(",", $this->phone_number);

        if ($this->brand) {
            $this->brand->update([
                'short_desc' => $this->short_desc,
                'description' => $this->description,
                'phone_number' => $phone_number,
                'location' => $this->location,
            ]);
            // session()->flash('message', 'Your brand information has been updated successfully');
            // return redirect(route("dashboard"));
            $this->dispatchBrowserEvent('success_alert', [
                'message' => "Your brand information has been updated successfully"
            ]);
            createLog("you updated your brand details", getIcon('pencil'), 'success');

        } else {
            dd("No Brand Found");
        }
        $this->emit('$refresh');
    }
    public function updatedTags($newTags)
    {
        // Handle updated tags
        //    dd('hi bruv');
    }

    public function render()
    {
        $this->brand = auth()->user()->brandInfos;
        $this->short_desc = $this->brand->short_desc;
        $this->description = $this->brand->description;
        $this->phone_number = implode(",", $this->brand->phone_number);
        $this->location = $this->brand->location;
        return view('livewire.brand.brand-settings');
    }
}
