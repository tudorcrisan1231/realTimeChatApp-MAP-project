<?php

namespace App\Livewire;

use App\Models\Report;
use App\Models\User;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $users = [], $reports = [];

    public function blockUser($id, $report_id = null){
        $user = User::find($id);
        $user->banned = 1;
        $user->save();

        if($report_id){
            $report = Report::find($report_id);
            $report->status = 1;
            $report->save();
            $this->reports = Report::orderBy('status', 'asc')->get();
        }

        $this->users = User::where('role_id', 0)->orderBy('banned', 'asc')->get();
    }

    public function unblockUser($id){
        $user = User::find($id);
        $user->banned = 0;
        $user->save();

        $this->users = User::where('role_id', 0)->get();
    }

    public function markAsSolved($report_id){
        $report = Report::find($report_id);
        $report->status = 1;
        $report->save();

        $this->reports = Report::orderBy('status', 'asc')->get();
    }

    public function markAsPending($report_id){
        $report = Report::find($report_id);
        $report->status = 0;
        $report->save();

        $this->reports = Report::orderBy('status', 'asc')->get();
    }

    
    public function mount()
    {   
        $this->users = User::where('role_id', 0)->orderBy('banned', 'asc')->get();
        $this->reports = Report::orderBy('status', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
