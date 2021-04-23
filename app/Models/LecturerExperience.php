<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LecturerExperience extends Model
{
    protected $fillable = ['lecturer_id', 'institute_name', 'designation', 'description'];
}
