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
