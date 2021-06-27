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
     * eager load relationships
     *
     * @var array
     */
    protected $with = ['subscriber', 'subscriberProperty'];

    /**
     * Attributes that are hidden
     *
     * @var array
     */
    // protected $hidden = ['subscriber_id', 'subscriber_property_id'];

    /**
     * Attributes that are not mass assignable
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'subscriber_id');
    }

    public function subscriberProperty()
    {
        return $this->belongsTo(SubscriberProperty::class, 'subscriber_property_id');
    }
}
