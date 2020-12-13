<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    protected $fillable = ['processors_type', 'processors_description', 'processors_sign',];
}
