<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsors extends Model
{
    protected $fillable = ['src', 'alt','order'];
    public $timestamps = false;
}
