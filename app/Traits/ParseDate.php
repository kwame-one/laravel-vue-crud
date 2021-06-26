<?php

namespace App\Traits;

use Carbon\Carbon;

trait ParseDate
{

    /**
     * getCreatedAtAttribute
     *
     * @param  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return $this->parseDate($value);
    }

    /**
     * getUpdatedAtAttribute
     *
     * @param  $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {

        return $this->parseDate($value);
    }

    /**
     * convert timestamp to datetime
     *
     * @param  string|null $value
     * @return string
     */
    private function parseDate($value)
    {
        if (!$value) {
            return null;
        }

        return Carbon::parse($value)->toDateTimeString();
    }
}
