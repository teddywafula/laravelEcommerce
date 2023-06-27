<?php

namespace App\Contracts;

use App\Models\Vendor;

interface VendorInterface
{
    public function findAll(): object;
    public function save(array $data): Vendor;
    public function update(array $data, Vendor $vendor): Vendor;
}
