<?php


namespace App\Http\Livewire;


use App\Services\IssuesService;
use Livewire\Component;

// TODO: Should we use livewire or classic POST & routes to request through the controller ?
class CreateIssue extends Component
{
    public $title;
    public $description;

    protected $rules = [
        'title' => 'required|min:4',
        'description' => 'required|min:4'
    ];

    protected $issuesService;

    /*
     * dependencies injection based on https://laravel-livewire.com/docs/2.x/rendering-components#parameters
     * not sure if is it the correct way to to it
     * */
    public function createIssue(IssuesService $issuesService) {
        $this->validate();

        $issuesService->create($this->title, $this->description);

        session()->flash('success_message', 'Idea was added successfully');

        $this->reset();

        return $this->redirect()->route('issue.index');
    }

    public function mount(IssuesService $issuesService)
    {
        $this->issuesService = $issuesService;
    }

    public function render()
    {
        return view('issue.index', [
            'issues' => $this->issuesService->get()
        ]);
    }

}
