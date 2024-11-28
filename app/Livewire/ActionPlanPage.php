<?php

namespace App\Livewire;

use App\Models\Cap;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;

class ActionPlanPage extends Component
{
    use WithPagination;
    private const REQUIRED_STRING = 'required|string';
    public $showActionPlanModal = false;
    public $showActionPlanDetailsModal = false;
    public $actionPlanId;
    public $status;
    public $assigned_to;
    public $source;
    public $cc = ["1", "2"];
    public $finding;
    public $grade;
    public $completedBy;
    public $users = [];
    public $isRootCause = false;
    public $isCA = false;
    public $sourceList = [
        'QAD/ AMO /180403',
        'QAD/AMO TECH /180702',
        'QAD/ AMO TECH /180702',
        'QAD/OPS-HQ/180801',
        'QAD/OPS-HQ/180801-002',
        'QAD/OPS-HQ/180801-003',
        'QAD/OPS-HQ/180801-004',
        'QAD/OPS-HQ/180801-005',
        'QAD/OPS-HQ/180801-006',
        'QAD/OPS-HQ/180801-007',
        'QAD/OPS-HQ/180801-008',
        'QAD/AJK/190203',
        'QAD/EBB-FLT/190402',
        'QAD/MSF/190401',
        'QAD/EBB-MNT/190403',
        'QAD/AMO-TECH/190601',
        'QAD/AMO-TECH/190601',
        'QAD/TECH-REC/190702',
    ];
    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $actionStatus = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 6;
    public $filterByAssignedTo = '';
    public $filterByCreatedBy = '';
    public $filterBySource = '';
    public $actionPlan = [];
    public $reportSource = '';
    public $reportPlanId = '';
    public $reportStatus = '';
    public $reportAssignedTo = '';
    public $reportCreatedBy = '';
    public $reportDateCreated = '';
    public $reportDateCompleted = '';
    public $reportDateCompleteBy = '';
    public $reportFinding = '';
    public $reportGrade = '';
    public $reportRootCause = '';
    public $reportCorrection = '';

    public function createActionPlan()
    {
        // get the last action plan id and add 1 to it, it is a string. should start with the year eg 24-0001 for 2024, it is saved in db in string format
        $lastActionPlan = Cap::latest()->first();
        $lastActionPlanId = $lastActionPlan ? $lastActionPlan->CAPName : '23-0000';
        $lastActionPlanYear = substr($lastActionPlanId, 0, 2);
        $currentYear = date('y');
        // check if the last action plan year is the current year
        if ($lastActionPlanYear == $currentYear) {
            $lastActionPlanNumber = substr($lastActionPlanId, 3);
            $newActionPlanNumber = str_pad($lastActionPlanNumber + 1, 4, '0', STR_PAD_LEFT);
            $this->actionPlanId = $currentYear . '-' . $newActionPlanNumber;
        } else {
            $this->actionPlanId = $currentYear . '-0001';
        }
        // Reset action plan data when creating a new one
        $this->showActionPlanModal = true;
        $this->status = 'open';
        $this->assigned_to = '';
        $this->source = '';
        $this->cc = [];
        $this->finding = '';
        $this->grade = 'level1';
        $this->completedBy = '';
    }

    public function showActionPlanDetails($id)
    {
        //clear data if available
        $this->actionPlan = [];
        $this->actionPlan = Cap::find($id)->toArray();
        // decode the cc users
        $this->actionPlan['IdCCUsers'] = json_decode($this->actionPlan['IdCCUsers']);
        $this->isCA = $this->actionPlan['isCA_on'] == 1 ? true : false;
        $this->isRootCause = $this->actionPlan['isRootCause_On'] == 1 ? true : false;
        $this->reportGrade = $this->actionPlan['FindingGradeId'];
        $this->reportSource = $this->actionPlan['ReportSource'];
        $this->reportPlanId = $this->actionPlan['CAPName'];
        $this->reportStatus = $this->actionPlan['CAPStatusId'];
        //get name of assigned to from users matching id
        $this->reportAssignedTo = User::find($this->actionPlan['ResponsiblePersonId'])->name;
        //get name of created by from users matching id
        $this->reportCreatedBy = User::find($this->actionPlan['CreatedById'])->name;
        // format the date to be displayed
        $this->reportDateCreated = date('Y-m-d', strtotime($this->actionPlan['created_at']));
        // format the date to be displayed
        $this->reportDateCompleted = date('Y-m-d', strtotime($this->actionPlan['updated_at']));
        $this->reportDateCompleteBy = $this->actionPlan['CompleteByCA'];
        $this->reportFinding = $this->actionPlan['Finding'];
        $this->reportRootCause = $this->actionPlan['rootCauseAnalysis'];
        $this->reportCorrection = $this->actionPlan['PreventiveActionPA'];
        // Show the modal
        $this->showActionPlanDetailsModal = true;
    }

    public function closeActionPlanDetailsModal()
    {
        $this->showActionPlanDetailsModal = false;
    }
    // get users
    #[Computed('actionPlans')]
    public function mount()
    {
        $this->users = User::all();
    }

    public function closeActionPlanModal()
    {
        // Close the modal\
        $this->showActionPlanModal = false;
    }

    public function saveActionPlan()
    {
        $this->cc = json_encode($this->cc);
        // Validate and save action plan logic here
        $this->validate([
            'actionPlanId' => self::REQUIRED_STRING,
            'status' => self::REQUIRED_STRING,
            'assigned_to' => 'required',
            'source' => self::REQUIRED_STRING,
            'finding' => self::REQUIRED_STRING,
            'grade' => self::REQUIRED_STRING,
            'grade' => 'required|string',
            'completedBy' => 'required|date',
            'cc' => 'nullable',
        ]);

        // Create new CAP item
        Cap::create([
            'CAPName' => $this->actionPlanId,
            'CAPStatusId' => $this->status,
            'ReportSource' => $this->source,
            'ResponsiblePersonId' => $this->assigned_to,
            'Finding' => $this->finding,
            'FindingGradeId' => $this->grade,
            'CompleteByCA' => $this->completedBy,
            'IdCCUsers' => $this->cc,
            'CreatedById' => auth()->id(),
        ]);

        // Show success message using sweetalert toast
        $this->js('Swal.mixin({toast: true, position: "top-end", showConfirmButton: false, timer: 3000, timerProgressBar: true, didOpen: (toast) => {toast.addEventListener("mouseenter", Swal.stopTimer),toast.addEventListener("mouseleave", Swal.resumeTimer)}}).fire({icon: "success",title: "Action Plan created successfully!"});');

        $this->createActionPlan();

        // After saving, close the modal
        $this->showActionPlanModal = false;
    }
    public function refreshCriteria()
    {
        $this->search = '';
        $this->actionStatus = '';
        $this->filterByAssignedTo = '';
        $this->filterByCreatedBy = '';
        $this->filterBySource = '';
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function setSortBy($sortByField)
    {

        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }


    public function render()
    {
        return view(
            'livewire.action-plan-page',
            [
                // replace assigned_to with the user name and created_by with the user name from the users table
                'actionPlans' => Cap::where('CAPName', 'like', '%' . $this->search . '%')
                    ->when($this->actionStatus !== '', function ($query) {
                        $query->where('CAPStatusId', $this->actionStatus);
                    })
                    ->when($this->filterByAssignedTo !== '', function ($query) {
                        $query->where('ResponsiblePersonId', $this->filterByAssignedTo);
                    })
                    ->when($this->filterByCreatedBy !== '', function ($query) {
                        $query->where('CreatedById', $this->filterByCreatedBy);
                    })
                    ->when($this->filterBySource !== '', function ($query) {
                        $query->where('ReportSource', $this->filterBySource);
                    })
                    ->orderBy($this->sortBy, $this->sortDir)
                    ->paginate($this->perPage),
                'users' => User::all(),
            ]
        );
    }
}
