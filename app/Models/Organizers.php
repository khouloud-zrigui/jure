<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizers extends Model
{
    use HasFactory;
    protected $fillable = ['src', 'alt','order'];

    public $timestamps = false;
}
