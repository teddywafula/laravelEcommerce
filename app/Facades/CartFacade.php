<?php

declare(strict_types=1);

namespace App\Facades;

use App\Contracts\CartInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class CartFacade
 *
 */
class CartFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CartInterface::class;
    }
}
