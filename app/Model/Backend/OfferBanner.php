<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class OfferBanner extends Model
{
    protected $fillable = [
        'title', 'description', 'banner', 'percentage', 'status',
    ];

}