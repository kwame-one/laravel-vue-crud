<?php

namespace App\Services;

use App\Models\SubscriberPropertyValue;

class SubscriberPropertyValueService extends CoreService
{

    /**
     * Inject subscriber model
     */
    public function __construct()
    {
        parent::__construct(SubscriberPropertyValue::class);
    }

    /**
     * store resource
     *
     * @param  array $data
     * @return mixed
     */
    public function store(array $data)
    {

        $data['updated_at'] = now();

        $exists = $this->model::where([
            'subscriber_id' =>  $data['subscriber_id'],
            'subscriber_property_id' => $data['subscriber_property_id']
        ])
            ->first();

        if ($exists) {
            return $exists->update($data);
        }

        return parent::store($data);
    }
}
