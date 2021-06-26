<?php

namespace App\Traits\Validators;

trait SubscriberPropertyValueValidator
{


    /**
     * store rules for subscriber
     *
     * @return array
     */
    public static function storeRules()
    {
        return [
            'subscriber_id' => ['required', 'integer', 'exists:subscribers,id'],
            'org_id' => ['required', 'string'],
            'subscriber_property_id' => ['required', 'integer', 'exists:subscriber_properties,id'],
            'value' => ['required', 'string']
        ];
    }

    /**
     * update rules for subscriber
     *
     * @param  int $id
     * @return array
     */
    public static function updateRules($id)
    {
        return [
            'subscriber_id' => ['required', 'integer', 'exists:subscribers,id'],
            'org_id' => ['required', 'string'],
            'subscriber_property_id' => ['required', 'integer', 'exists:subscriber_properties,id'],
            'value' => ['required', 'string']
        ];
    }

    /**
     * custom error messages
     *
     * @return array
     */
    public static function errorMessages()
    {
        return [
            'subscriber_id.exists' => 'The selected subscriber does not exists',
            'subscriber_id.required' => 'The subscriber field is required',
            'subscriber_property_id.exists' => 'The selected subscriber property does not exists',
            'subscriber_property_id.required' => 'The subscriber property field is required'
        ];
    }
}
