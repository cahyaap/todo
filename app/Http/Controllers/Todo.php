<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodoList;

class Todo extends Controller
{
    public function index () {
      return view('todo');
    }
    
    public function add (Request $request) {
      $name = $request->input('name');
      $description = $request->input('description');
      $todoCreated = TodoList::create([
          'name' => $name,
          'description' => $description,
          'status' => 0
      ]);
      return response()->json([
          'status' => 'success',
          'data' => $todoCreated,
      ]);
    }
    
    public function getTodoList (Request $request) {
      $status = $request->input('status');
      if ($status === "0") {
        $todoList = TodoList::where('status', $status)->orderBy('created_at', 'asc')->get();
      } else if ($status === "1") {
        $todoList = TodoList::where('status', $status)->orderBy('updated_at', 'asc')->get();
      } else if ($status === "2") {
        $todoList = TodoList::where('status', $status)->orderBy('updated_at', 'desc')->get();
      }
      return view('todolist', compact('todoList'));
    }
    
    public function changeStatus (Request $request) {
      $todo = TodoList::find($request->input('id'));
      if ($todo->status === 0) {
        $todo->status = 1;
      } else if ($todo->status === 1) {
        $todo->status = 2;
      }
      $todo->updated_at = time();
      $todo->save();
      return response()->json([
          'status' => 'success',
          'data' => $todo
      ]);
    }
    
    public function delete (Request $request) {
      $todo = TodoList::find($request->input('id'));
      $todo->delete();
      return response()->json([
          'status' => 'success',
          'data' => $todo
      ]);
    }
}
