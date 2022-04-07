<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

     //importante que tenga get al principio y Attribute al final lo del medio es como se llamara despues en el controller
     public function getGetTitleAttribute(){
        return strtoupper($this->title);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = strtolower($value);
    }
}

