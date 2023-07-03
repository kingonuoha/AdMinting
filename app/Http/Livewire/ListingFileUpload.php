<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Listing;
use Livewire\Component;
use App\Models\ListingFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingFileUpload extends Component
{
    public $listing_slug, $brand, $applicant, $listing;
   
    public function mount(){
        $this->listing_slug = $listing_slug = (isset(request()->route()->parameters['listing']))? request()->route()->parameters['listing'] : $this->listing_slug;
        $this->listing = Listing::where('slug', $listing_slug)->first();
        $this->brand = User::find($this->listing->user_id);
        $this->applicant = User::find($this->listing->onboarded_by);
    }
    
    public function listingFileUpload( Request $req, $listing_slug){

        $listing = Listing::where('slug', $listing_slug)->first();


        if($req->hasFile('file')){
         $file = $req->file('file');
         // Get the size of the uploaded file
        $sizeInBytes = $file->getSize();
        $fileType = $file->getClientOriginalExtension();

        // Convert the size to a human-readable format
        $sizeInKB = round($sizeInBytes / 1024, 2);
        $sizeInMB = round($sizeInKB / 1024, 2);

         $filename =  str_replace(' ', '_',  $file->getClientOriginalName());
         $folder = 'ListingsFiles/'.$listing_slug;
         Storage::disk('public')->putFileAs($folder, $file, $filename);
         // $file->storeAs('ListingsFiles/', now(), $filename);
            $this->dispatchBrowserEvent('showToast', [
                'message' => "File has been Uploaded Successfully",
                'type' => 'success'
            ]);
            $listingFiles = new ListingFiles();
            $listingFiles->name = $filename;
            $listingFiles->listing_id = $listing->id;
            $listingFiles->uploaded_by = auth()->user()->id;
            $listingFiles->size =  $sizeInMB;
            $listingFiles->type = $fileType;
            $listingFiles->folder = $folder;
            // $listingFiles->uploaded_by = auth()->user()->id;
            $listingFiles->save();
            redirect()->back();
         return $folder;
        }
 
        return '';
     }

    public function render()
    { 
        $listingFiles = $this->listing->files;
        return view('livewire.listing-file-upload', compact('listingFiles'))->extends('layouts.ADM_app',  [
            'current_page' => 'Listing File',
            'title' => appSetting('app_name').' | Listing Files',
            
        ]);
    }
}
