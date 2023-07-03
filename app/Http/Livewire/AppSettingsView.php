<?php

namespace App\Http\Livewire;

use App\Models\AppSettings;
use Livewire\Component;

class AppSettingsView extends Component
{

    public $app_name, $app_email, $app_phone;
    public $app_facebook, $app_instagram, $app_linkedin, $app_youtube;
    public function mount(){
        $this->app_name = ucwords(appSetting('app_name'));
        $this->app_email = appSetting('app_email');
        $this->app_phone = appSetting('app_phone');
        $this->app_facebook = appSetting('app_facebook');
         $this->app_instagram = appSetting('app_instagram');
         $this->app_linkedin = appSetting('app_linkedin');
         $this->app_youtube = appSetting('app_youtube');
        }
    public function basicSettingSave(){
        $this->validate([
            'app_name' => "required",
            'app_email' => "required|email",
            'app_phone' => "required"
        ]);

         $result = AppSettings::find(1)->update([
            'app_name' => $this->app_name,
            'app_email' => $this->app_email,
            'app_phone' => $this->app_phone,

        ]);
       if($result){
        $this->dispatchBrowserEvent('success_alert', [
            'message' => "Changes has been saved Successfully, refresh browser to see implementation"
        ] );
       }
           
    }


    public function socialSettingSave(){
        $this->validate([
            'app_facebook' => "nullable|url",
            'app_youtube' => "nullable|url",
            'app_instagram' => "nullable|url",
            'app_linkedin' => "nullable|url"
        ]);
        $result = AppSettings::find(1)->update([
            'app_facebook' => $this->app_facebook,
            'app_youtube' => $this->app_youtube,
            'app_instagram' => $this->app_instagram,
            'app_linkedin' => $this->app_linkedin,

        ]);

        if($result){
            $this->dispatchBrowserEvent('success_alert', [
                'message' => "Changes has been successfully Saved, Refresh page to see implementation"
            ] );
        }
    }
    public function render()
    {
        return view('livewire.app-settings-view');
    }
}
