<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DashHeader extends Component
{
    public $user, $links, $selected_notification;
    protected $listeners = [
        "updateAdminHeader" => '$refresh',
        "showNotificationModal" => "showNotificationModal"
    ];
 

    public function mount()
    {
       
        $this->links = (new SideBar())->links();
    }

    

    public function markAlertsAsRead($previousCount){
        $user= User::find(auth()->user()->id);
        $newCount =$user->unreadNotifications->count();
        $user->unreadNotifications->markAsRead();
        if($newCount != $previousCount){
            
        }
    }

   

    public function markAllAsRead(){
        $user= User::find(auth()->user()->id);
        // $newCount =$user->unreadNotifications->count();
        $user->unreadNotifications->markAsRead();
      $this->showToast('All Notifications Are now Marked as Read', 'info');
    }
  
    public function showToast($message, $type){
        $this->saveLog(substr($message, 20).'...', $type);
        return $this->dispatchBrowserEvent('showToast', [
            'message'=> $message,
            'type'=>$type
        ]);
    }
    public function success_alert($message){
        $this->saveLog(substr($message, 20).'...', 'success');

        return $this->dispatchBrowserEvent('success_alert', [
            'message'=> $message,
        ]);
    }
    public function error_alert($message){
        $this->saveLog(substr($message, 20).'...', 'danger');

        return $this->dispatchBrowserEvent('error_alert', [
            'message'=> $message,
        ]);
    }
    public function warning_alert($message){
        $this->saveLog(substr($message, 20).'...', 'warning');

        return $this->dispatchBrowserEvent('warning_alert', [
            'message'=> $message,
        ]);
    }
    public function info_alert($message){
        $this->saveLog(substr($message, 20).'...', 'info');

        return $this->dispatchBrowserEvent('info_alert', [
            'message'=> $message,
        ]);
    }
    public function showNotificationModal($notification_id){
        // kt_notifications
        $user = User::find(auth()->user()->id);
        $notification = $user->notifications->firstWhere('id', $notification_id);
        $this->selected_notification = $notification->data;
        $this->dispatchBrowserEvent('show_notification');
    }
    public function render()
    {
       
        $this->user= User::find(auth()->user()->id);
        
        $user = $this->user;
        return view('livewire.dash-header', ['links'=>$this->links,], compact('user'));
    }
}
