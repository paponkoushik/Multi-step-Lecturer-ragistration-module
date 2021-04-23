<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerPublication extends Model
{
    protected $fillable = ['title', 'link', 'lecturer_id', 'description'];
}
