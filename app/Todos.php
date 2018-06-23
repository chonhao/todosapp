<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $table = 'todos';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
