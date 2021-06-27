<?php

namespace App\Services;

use App\Models\SubscriberProperty;

class SubscriberPropertyService extends CoreService
{

    /**
     * Inject subscriber model
     */
    public function __construct()
    {
        parent::__construct(SubscriberProperty::class);
    }

    /**
     * store resource
     *
     * @param  array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $data['created_at'] = now();

        return parent::store($data);
    }
}
