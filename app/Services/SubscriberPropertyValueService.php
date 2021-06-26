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
}
