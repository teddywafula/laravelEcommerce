<?php

namespace App\Repository;

use App\Contracts\VendorInterface;
use App\Models\Vendor;

class VendorRepository implements VendorInterface
{

    public function findAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Vendor::all();
    }

    public function save(array $data): Vendor
    {
        $vendor = new Vendor();
        return $this->extracted($data, $vendor);
    }

    public function update(array $data, Vendor $vendor): Vendor
    {
        return $this->extracted($data, $vendor);
    }

    /**
     * @param array $data
     * @param Vendor $vendor
     * @return Vendor
     */
    public function extracted(array $data, Vendor $vendor): Vendor
    {
        if (!empty($data['first_name'])) {
            $vendor->first_name = $data['first_name'];
        }
        if (!empty($data['middle_name'])) {
            $vendor->middle_name = $data['middle_name'];
        }
        if (!empty($data['last_name'])) {
            $vendor->last_name = $data['last_name'];
        }
        if (!empty($data['company_name'])) {
            $vendor->company_name = $data['company_name'];
        }
        if (!empty($data['phone'])) {
            $vendor->phone = $data['phone'];
        }
        if (!empty($data['country'])) {
            $vendor->country = $data['country'];
        }
        if (!empty($data['location'])) {
            $vendor->location = $data['location'];
        }
        if (!empty($data['company_email'])) {
            $vendor->company_email = $data['company_email'];
        }
        if (!empty($data['user_id'])) {
            $vendor->user_id = $data['user_id'];
        }
        $vendor->save();
        return $vendor;
    }
}
