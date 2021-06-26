<?php

namespace App\Models;

use App\Traits\ParseDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberPropertyValue extends Model
{
    use HasFactory, ParseDate;

    /**
     * Attributes that are not mass assignable
     *
     * @var array
     */
    protected $guarded = ['id'];
}
