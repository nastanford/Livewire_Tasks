<div class="container-fluid">
  <div class="row bg-dark text-white">
    <div class="col-12 h1">
      Tasks
    </div>
  </div>
  <div>
  <!---
    <div class="row">
      <form wire:submit.prevent="addTask">
        <div class="col-8">
          <input type="text" class="form-control my-2 border border-1 border-dark" placeholder="Enter a task" wire:model="newTask">
          <button type="submit" class="btn btn-sm btn-dark my-2">
            Add Task
          </button>
        </div>
      </form>
      <div class="col-4">
        <input type="text" wire:model="search">
        <label for="search" class="fw-bold">Search</label>
      </div>
    </div>
    --->
    <div class="row">
      <div class="col-9">
        <div class="float-start" wire:poll>
          <b>Time:</b> {{ now()->format('h:i:s A') }}
        </div>
      </div>
      <div class="col-3">
        <div class="float-end">
          <b>Date:</b> {{ now()->format('m/d/Y') }}
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-2">
        <input type="text" wire:model="search" class="form-control my-2 border border-1 border-dark" placeholder="Search">
      </div>
      <div class="col-1 pt-1">
        <button type="button" wire:click="clearSearch" class="btn btn-sm btn-dark my-2">
          Clear
        </button>
      </div>
      <div class="col-7">
        <form wire:submit.prevent="addTask">
          <div class="input-group">
            <input type="text" class="form-control my-2 border border-1 border-dark" placeholder="Enter a task" wire:model="newTask">
          </div>
        </div>
        <div class="col-2 pt-1">
          <button type="submit" class="btn btn-sm btn-dark my-2">
            Add Task
          </button>
        </div>
      </form>

    </div>


    <table class="table table-striped border-1 border-dark rounded-2">
      <thead>
        <tr>
          <th class="col-2">Mark</th>
          <th class="col-6">Task</th>
          <th class="col-2 text-center">Is Completed</th>
          <th class="col-2 text-end">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tasks as $task)
        <tr>
          <td>
              <a href="#" wire:click="editTask({{ $task->id }})" class="btn btn-sm btn-dark">
                Mark
              </a>
            </td>
            @if($task->is_complete)
            <td class="text-decoration-line-through">
              {{ $task->task_name }}
            </td>
            @else
            <td>
              {{ $task->task_name }}
            </td>
            @endif

          <td class="text-center">
            @if($task->is_complete)
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM337 209L209 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L303 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
            @else
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H384zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/></svg>
            @endif
          </td>
          <td class="text-end">
            <a href="#" wire:click="deleteTask({{ $task->id }})" class="btn btn-sm btn-dark">
              Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
          <div class="row">
            <div class="col-3 offset-4 border-1 border-primary pt-3">
              {{ $tasks->links() }}
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
