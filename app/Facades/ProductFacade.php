<?php

declare(strict_types=1);

namespace App\Facades;

use App\Contracts\ProductInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class ProductFacade
 *
 */
class ProductFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ProductInterface::class;
    }
}
