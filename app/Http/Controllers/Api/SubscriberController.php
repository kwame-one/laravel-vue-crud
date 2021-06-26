<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SubscriberService;
use Illuminate\Http\Request;

class SubscriberController extends CoreController
{
    public function __construct()
    {
        parent::__construct(new SubscriberService());
    }
}
