<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keynotespeakers extends Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'lastname', 'description', 'website'];
    public $timestamps = false;
}
