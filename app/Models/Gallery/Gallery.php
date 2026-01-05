<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['photo','date','title','caption'];
}
