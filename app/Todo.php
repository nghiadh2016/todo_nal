<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table="todotable";
    public $timestamps=false;
    protected $fillable=['name','date_start','date_end','id_status'];
    public function statusTodo(){
        
        return $this->belongsTo('App\StatusTodo','id_status');
    }
}
