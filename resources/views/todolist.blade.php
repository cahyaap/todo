@foreach ($todoList as $todo)
<div class="todo-item">
  <div class="todo-item-text">
    <p class="todo-name">{{ $todo->name }}</p>
    <p class="todo-description">{{ $todo->description }}</p>
  </div>
  <div class="todo-item-action">
    @if ($todo->status !== 2)
    <a class="btn btn-success changeStatus" id="{{ $todo->id }}" href="javascript:void(0)">&RightArrow;</a>
    @endif
    <a class="btn btn-danger deleteTodo" id="{{ $todo->id }}" href="javascript:void(0)">&Chi;</a>
  </div>
</div>
@endforeach