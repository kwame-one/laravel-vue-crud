<?php

namespace App\Models;

use App\Traits\ParseDate;
use App\Traits\Validators\SubscriberValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use HasFactory, ParseDate, SubscriberValidator;

    public $timestamps = false;

    /**
     * Attributes that are not mass assignable
     *
     * @var array
     */
    protected $guarded = ['id'];


    /**
     * get property values
     *
     * @return App\Models\SubscriberPropertyValue
     */
    public function propertyValues()
    {
        return $this->hasMany(SubscriberPropertyValue::class, 'subscriber_id');
    }
}
