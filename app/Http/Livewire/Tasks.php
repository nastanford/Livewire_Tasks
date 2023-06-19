<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task;


class Tasks extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public $newTask = '';

  public function render()
  {
    $tasks = Task::paginate(3);
    return view('livewire.tasks', compact('tasks'));
  }
  public function addTask()
  {
    $table = new Task;
    $table->task_name = $this->newTask;
    $table->save();

    $this->newTask = '';
  }

  public function editTask($id)
  {
    $table = Task::find($id);
    $table->is_complete = !$table->is_complete;
    $table->save();
  }

  public function deleteTask($id)
  {
    $table = Task::find($id);
    $table->delete();
  }
}
