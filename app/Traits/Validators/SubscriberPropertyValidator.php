<?php

namespace App\Traits\Validators;

trait SubscriberPropertyValidator
{


    /**
     * store rules for subscriber
     *
     * @return array
     */
    public static function storeRules()
    {
        return [
            'org_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'is_private' => ['required', 'boolean']
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
            'org_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'is_private' => ['required', 'boolean']
        ];
    }

    /**
     * custom error messages
     *
     * @return array
     */
    public static function errorMessages()
    {
        return [];
    }
}
