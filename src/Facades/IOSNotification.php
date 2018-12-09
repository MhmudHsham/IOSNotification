<?php

namespace mhmudhsham\IOSNotification\Facades;

use Illuminate\Support\Facades\Facade;

class IOSNotification extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'iosnotification';
    }
}
