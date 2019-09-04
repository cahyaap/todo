<!DOCTYPE html>
<html lang="en">
  @include('head')
  <body>
    @include('header')
    <div class="todo-container">
      <div class="todo-content" id="todo">
        <div class="todo-title" id="title-todo">
          To Do
        </div>
        <div class="loading-animation" id="todo-loading">
          <img src="{{ asset('loading-animation.gif') }}">
        </div>
        <div class="todo-list" id="todo-list"></div>
      </div>
      <div class="todo-content" id="doing">
        <div class="todo-title" id="title-doing">
          Doing
        </div>
        <div class="loading-animation" id="doing-loading">
          <img src="{{ asset('loading-animation.gif') }}">
        </div>
        <div class="todo-list" id="doing-list"></div>
      </div>
      <div class="todo-content" id="done">
        <div class="todo-title" id="title-done">
          Done
        </div>
        <div class="loading-animation" id="done-loading">
          <img src="{{ asset('loading-animation.gif') }}">
        </div>
        <div class="todo-list" id="done-list"></div>
      </div>
    </div>
    @include('footer')
  </body>
  @include('modal')
  @include('script')
</html>