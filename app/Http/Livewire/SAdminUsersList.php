<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SAdminUsersList extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $role;
    public $search, $userStats;
    protected $listeners = [
        'makeAdminConfirmed', 'removeAdminConfirmed'
    ];
    public function mount (){
        $users = User::all();
       $this->userStats = [
        [
            'title' => "Total Users",
            'percent'=>  percent_two_values($users->count(), $users->count()),
            'value'=>  $users->count(),
            'color' => 'info'
        ],
        [
            'title' => "Registered Brands",
            'percent'=> percent_two_values($users->where('role', 'brand')->count(), $users->count()),
            'value'=> $users->where('role', 'brand')->count(),
            'color' => 'warning'
        ],
        [
            'title' => "Registered Creators",
            'percent'=> percent_two_values($users->where('role', 'creator')->count(), $users->count()),
            'value'=> $users->where('role', 'creator')->count(),
            'color' => 'primary'
        ],
       
    ];
    }
    public function makeAdminConfirmed ($user_id){
       $user = User::find($user_id);
       $user->update([
        'role' => 'adm_admin'
       ]);
       $this->dispatchBrowserEvent('success_alert', [
        'message' => $user->name. ' Has been successfully made Admin, and now hass access to all features that admin have access to'
       ]);
       createLog("you made ".$user->name. " Admin", getIcon('users'), 'warning');
       createLog("you have been made an admin", getIcon('user-shield'), 'success', $user->id);


    }
    public function removeAdminConfirmed ($user_id){
       $user = User::find($user_id);
       $user->update([
        'role' => 'creator'
       ]);
       $this->dispatchBrowserEvent('success_alert', [
        'message' => $user->name. ' Has been successfully made a Creator, and now hass access to all features that creators have access to'
       ]);
       createLog("you've removed ".$user->name. " from being an Admin", getIcon('users'), 'warning');
       createLog("your admin previledges has been revoked", getIcon('user-shield'), 'success', $user->id);

    }
    public function makeAdminConfirm ($user_id){
       $this->dispatchBrowserEvent('makeAdmin:confirmation', [
        'title' => "Make Admin",
        'message' => 'Before proceeding, please take a moment to consider the implications. By making this user an admin, they will gain elevated privileges and access to sensitive system features. This action should only be performed if it is absolutely necessary and authorized. Are you certain that you want to proceed with granting admin privileges to this user? Your confirmation is required to ensure the security and integrity of the system.',
        'user_id' => $user_id,
        'type' => 'warning'
       ]);
    }
    public function removeAdminConfirm ($user_id){
       $this->dispatchBrowserEvent('removeAdmin:confirmation', [
        'title' => "Remove Admin",
        'message' => 'Admin Privilege Removal Warning: Confirm before proceeding. user will be automatically become a creator in the app',
        'user_id' => $user_id,
        'type' => 'warning'
       ]);
    }
    public function render()
    {
        return view('livewire.s-admin-users-list', [
            'admUsers' =>  User::search(trim($this->search))
            ->when($this->role, function($query){
                $query->where('role', $this->role);
            })->paginate($this->perPage)
        ]);
    }
}
