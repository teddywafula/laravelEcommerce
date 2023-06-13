<?php

declare(strict_types=1);

namespace App\Facades;

use App\Contracts\CategoryInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class CategoryFacade
 *
 */
class CategoryFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CategoryInterface::class;
    }
}
