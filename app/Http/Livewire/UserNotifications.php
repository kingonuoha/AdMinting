<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserNotifications extends Component
{
    use WithPagination;
    public $user; 
    public $search; 
    protected $listeners = [
        'notificationDeleteConfirmed'
    ];
    public function deleteNotification($notification_id)
    {
            $user = User::find(auth()->user()->id);
            $notification = $user->notifications->find($notification_id);
            $notification->delete();

            $this->dispatchBrowserEvent('showToast', [
                'message'=> "Notification deleted successfully",
                'type'=> 'success'
            ]);
            createLog("you deleted a notification", getIcon('bin'), 'danger');


    }
    public function deleteAllNotifications(){
        $this->dispatchBrowserEvent('notificationDelete:confirm', [
            'title' => "Confirm",
        'message' => 'Delete all notifications? This action cannot be undone. Proceed?',
        'type' => 'warning'
        ]);
        
    }
    public function notificationDeleteConfirmed(){
        $this->user->notifications()->delete();
        $this->dispatchBrowserEvent('success_alert', [
            'message' => 'All notifications have been successfully deleted.',
        ]);
        createLog("you deleted all your notifications", getIcon('bin'), 'danger');
}
    public function markAllAsRead(){
        $this->user->unreadNotifications->markAsRead();
        $this->dispatchBrowserEvent('showToast', [
            'message' => 'All notifications has been marked as read',
            'type' => 'info'
        ]);
        createLog("you marked all your notifications as read", getIcon('layers'), 'info');

}
    public function render()
    {
        $this->user = $user = User::find(auth()->user()->id);
        $notifications = $this->user->notifications()
        ->where('data', 'LIKE', "%{$this->search}%")
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('livewire.user-notifications', compact('notifications'))->extends('layouts.ADM_app', [
            'current_page' => 'Security',
            'title' => 'Adminting | Secure Profile',
            
        ]);
    }
}
