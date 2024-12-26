<?php

namespace App\Http\Livewire;

use App\Models\ChangeLog;
use Livewire\Component;

class ChangelogSettingLive extends Component
{
    public $version_name, $version_type, $last_version, $all_versions, $s_version_id, $s_version, $s_version_change, $isUpdating = false, $updatingId;
    protected $listeners = ['deleteVersionConfirmed'];

    public function mount()
    {
        $this->last_version = ChangeLog::orderBy("publish_date", "desc")->first();
        $this->all_versions =  ChangeLog::orderBy("created_at", "desc")->get();
    }
    public function newVersion()
    {
        $this->validate([
            "version_name" => "required|unique:change_logs,version",
            "version_type" => "required"
        ]);

        $newVersion = ChangeLog::create([
            "version" => $this->version_name,
            "type" => $this->version_type,
            'user_id' => auth()->user()->id,
            "change_description" => []
        ]);

        if ($newVersion) {
            $this->dispatchBrowserEvent("success_alert", [
                'message' => "New version of " . env("APP_NAME") . " has been created, make sure you edit environment variables after publishing this version"
            ]);
        }
       createLog("you created ".env('APP_NAME')." ". $this->version_name." ". $this->version_type, getIcon('spanner'), 'success');

    }

    public function updatedSVersionId($value)
    {
        $this->s_version = ChangeLog::find($value);
    }
    public function saveChanges()
    {
        $this->validate([
            "s_version_change" => "required"
        ]);
        $changelog = ChangeLog::find($this->s_version_id);
        $oldArr = $changelog->change_description;
        $oldArr = array_merge($oldArr, [$this->s_version_change]);
        $changelog->update([
            "change_description"=> $oldArr
        ]);
        $this->s_version_id = NULL;
        $this->dispatchBrowserEvent("success_alert", [
            'message' => "updated Successfully",
        ]);
        $this->s_version = ChangeLog::find($this->s_version_id);
    }
    public function editChange($changeId)
    {
        $this->isUpdating = true;
        $this->updatingId = $changeId;
        return $this->s_version_change = $this->s_version->change_description[$changeId];
        // dd($this->s_version->change_description[$changeId]);
    }
    public function updateChange()
    {
        $updating_change_description = $this->s_version->change_description;
        $updating_change_description[$this->updatingId] = $this->s_version_change;
        $this->s_version->update([
            "change_description" =>  $updating_change_description
        ]);
        $this->isUpdating = false;
        $this->dispatchBrowserEvent("showToast", [
            'type' => "info",
            "message" => "Updated successfully"
        ]);
        $this->s_version_change =  NULL;
        // dd($this->s_version->change_description[$changeId]);
    }
    public function publish()
    {
        $changelog = ChangeLog::find($this->s_version_id);
        $oldArr = $changelog->change_description;
        $oldArr = array_merge($oldArr, [$this->s_version_change]);
        $changelog->update([
            "publish_date"=> now()
        ]);
        // $this->s_version_id = NULL;
        $this->dispatchBrowserEvent("success_alert", [
            'message' => "Published Successfully",
        ]);
        $this->s_version = ChangeLog::find($this->s_version_id);
       createLog("you published a version of the app", getIcon('setting-1'), 'danger');
        
    }
    public function rollBack()
    {
       $this->s_version->update([
        'publish_date'=> NULL
       ]);
       return  $this->dispatchBrowserEvent("showToast", [
        'type' => "info",
        "message" => "Version has been rolled back successfully"
    ]);
    }
    public function deleteVersionConfirm()
    {
        $this->dispatchBrowserEvent("deleteVersionConfirm", [
            "id" =>$this->s_version->id,
            "message" => "You are about to permernently Delete ".$this->s_version->version.", Proceed?"
        ]);
    }
    public function deleteVersionConfirmed($id)
    {
        
        $isDel = ChangeLog::find($id)->delete();

        $this->dispatchBrowserEvent("showToast", [
            'type' => "info",
            "message" => "Version Deleted  successfully"
        ]);
        $this->reset();
        $this->mount();
    }
    public function render()
    {
        return view('livewire.changelog-setting-live');
    }
}
