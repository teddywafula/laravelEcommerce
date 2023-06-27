<?php

namespace App\Contracts;

use App\Models\Vendor;

interface VendorInterface
{
    public function findAll(): \Illuminate\Database\Eloquent\Collection;
    public function save(array $data): Vendor;
    public function update(array $data, Vendor $vendor): Vendor;
}
