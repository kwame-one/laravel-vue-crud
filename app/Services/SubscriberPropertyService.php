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
}
