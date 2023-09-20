<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrashModel extends Model
{
    protected $fillable = [
        'type',
        'price'
    ];
}
