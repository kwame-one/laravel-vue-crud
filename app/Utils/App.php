<?php

namespace App\Utils;

use App\Models\Order;
use Illuminate\Pipeline\Pipeline;

class App
{

    /**
     * paginate or return all resources
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Collection|static[]

     */
    public static function resources($query)
    {
        if (request()->has('paginate') && request()->boolean('paginate') && !empty(request('per_page'))) {

            return $query->paginate(request('per_page'));
        }

        return $query->get();
    }
}
