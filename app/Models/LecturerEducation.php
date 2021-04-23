<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LecturerEducation extends Model
{
    protected $fillable = ['lecturer_id', 'institute_name', 'qualification', 'result'];
}
