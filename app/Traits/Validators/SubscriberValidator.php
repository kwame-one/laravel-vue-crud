<?php

namespace App\Traits\Validators;

use Illuminate\Validation\Rule;

trait SubscriberValidator
{


    /**
     * store rules for subscriber
     *
     * @return array
     */
    public static function storeRules()
    {
        return [
            'phone' => ['required', 'string', 'unique:subscribers,phone'],
            'org_id' => ['required', 'string'],
            'is_active' => ['required', 'boolean']
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
            'phone' => [
                'required', 'string',
                Rule::unique('subscribers', 'phone')
                    ->ignore($id)
            ],
            'org_id' => ['required', 'string'],
            'is_active' => ['required', 'boolean']
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
