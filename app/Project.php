<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=[
        'project_name',
        'project_code',
        'project_start_date',
        'description',
        'project_end_date',
        'project_duration_days',
        'file',
        'status',
    ];
}
