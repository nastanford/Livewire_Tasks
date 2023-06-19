<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tasks extends Component
{

  public $tasks = [];
  public $newTask = '';

  public function render()
  {
    return view('livewire.tasks');
  }

  public function addTask()
  {
    $table = new \App\Models\Task;
    $table->task_name = $this->newTask;
    $table->save();
    // Get all of the tasks
    $this->tasks = \App\Models\Task::all();
    // reset the newTask input to null
    $this->newTask = '';
  }

  public function editTask($id)
  {
    $table = \App\Models\Task::find($id);
    $table->is_complete = !$table->is_complete;
    $table->save();
    // Get all of the tasks
    $this->tasks = \App\Models\Task::all();
  }

  public function deleteTask($id)
  {
    $table = \App\Models\Task::find($id);
    $table->delete();
    // Get all of the tasks
    $this->tasks = \App\Models\Task::all();
  }

  public function mount()
  {
    // how to paginate tasks
    // $this->tasks = \App\Models\Task::paginate(3);
    $this->tasks = \App\Models\Task::all();
  }
}
