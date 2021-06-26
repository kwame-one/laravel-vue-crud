<?php

namespace App\Services;

use App\Models\Subscriber;

class SubscriberService extends CoreService
{

    /**
     * Inject subscriber model
     */
    public function __construct()
    {
        parent::__construct(Subscriber::class);
    }
}
