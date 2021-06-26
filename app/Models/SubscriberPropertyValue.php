<?php

namespace App\Models;

use App\Traits\ParseDate;
use App\Traits\Validators\SubscriberPropertyValueValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberPropertyValue extends Model
{
    use HasFactory, ParseDate, SubscriberPropertyValueValidator;

    public $timestamps = false;

    /**
     * Attributes that are not mass assignable
     *
     * @var array
     */
    protected $guarded = ['id'];
}
