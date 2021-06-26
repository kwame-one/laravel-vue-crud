<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SubscriberPropertyService;
use Illuminate\Http\Request;

class SubscriberPropertyController extends CoreController
{
    public function __construct()
    {
        parent::__construct(new SubscriberPropertyService());
    }
}
