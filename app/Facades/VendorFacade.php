<?php

declare(strict_types=1);

namespace App\Facades;

use App\Contracts\VendorInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class VendorFacade
 *
 */
class VendorFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return VendorInterface::class;
    }
}
