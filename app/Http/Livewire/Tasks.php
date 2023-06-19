<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task;

// use App\Models\Task as Task;

class Tasks extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  // public $tasks = [];
  public $newTask = '';

  public function render()
  {
    $tasks = Task::paginate(3);
    return view('livewire.tasks', compact('tasks'));
  }
  // public function render()
  // {
  //   // $tasks = $this->tasks = \App\Models\Task::paginate(3);
  //   // return view('livewire.tasks');
  //   $this->tasks = Task::all();

  //   // $tasks = Task::paginate(3);
  //   return view('livewire.tasks');
  // }

  public function addTask()
  {
    $table = new Task;
    $table->task_name = $this->newTask;
    $table->save();

    // Get all of the tasks
    // $this->reset("task");
    // $this->tasks = \App\Models\Task::all();
    // reset the newTask input to null
    $this->newTask = '';
  }

  public function editTask($id)
  {
    $table = Task::find($id);
    $table->is_complete = !$table->is_complete;
    $table->save();
    // Get all of the tasks
    // $this->reset("task");
    // $this->tasks = \App\Models\Task::all();
  }

  public function deleteTask($id)
  {
    $table = Task::find($id);
    $table->delete();
    // Get all of the tasks
    // $this->reset("task");
    // $this->tasks = \App\Models\Task::all();
  }
}
/*

  public function mount()
  {
    // $tasks = Task::paginate(3);
    // how to paginate tasks
    // $this->tasks = \App\Models\Task::paginate(3);
    // $this->reset("tasks");
    $this->tasks = Task::all();
    // $this->tasks = Task::paginate(3);
  }
*/
