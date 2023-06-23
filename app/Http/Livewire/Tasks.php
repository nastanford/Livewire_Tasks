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
  public $records_per_page = 5;
  public $search = '';
  public $page = 1;

  public function render()
  {
    $tasks = Task::whereRaw('LOWER(task_name) LIKE ?', ['%' . strtolower($this->search) . '%'])
      ->paginate($this->records_per_page, ['*'], 'page', $this->page);
    return view('livewire.tasks', compact('tasks'));
  }

  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function clearSearch()
  {
    $this->search = '';
    $this->resetPage();
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


  public function mount()
  {
    $this->resetPage();
  }
}
