<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'primary_key';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'firstname',
        'lastname',
    ];
}