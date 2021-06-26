<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SubscriberPropertyValueService;
use Illuminate\Http\Request;

class SubscriberPropertyValueController extends CoreController
{
    public function __construct()
    {
        parent::__construct(new SubscriberPropertyValueService());
    }
}
