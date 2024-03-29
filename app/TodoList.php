<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{
//  use SoftDeletes;
  
  protected $fillable = ['name', 'description'];
  
  protected $guarded = [];

  protected $dates = [
    'created_at',
    'updated_at',
//    'deleted_at'
  ];
}
