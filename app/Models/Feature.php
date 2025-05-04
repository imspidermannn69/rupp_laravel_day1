<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'image', 'title'
    ];
    protected $table = 'features';
    public $timestamps = false;
}
