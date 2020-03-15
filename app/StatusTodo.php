<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusTodo extends Model
{
    protected $table="status";
    public $timestamps=false;
    protected $fillable=['name_status'];
    protected $primaryKey='id_status';
    public function todo()
    {
        return $this->hasMany('App\Todo');
    }
}
