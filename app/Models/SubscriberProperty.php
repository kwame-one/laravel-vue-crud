<?php

namespace App\Models;

use App\Traits\ParseDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberProperty extends Model
{
    use HasFactory, ParseDate;

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
        return $this->hasMany(SubscriberPropertyValue::class, 'subscriber_property_id');
    }
}
