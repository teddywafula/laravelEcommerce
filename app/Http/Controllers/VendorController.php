<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use Illuminate\Http\Response;
use VendorFacades;
use Illuminate\Http\JsonResponse;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(VendorFacades::findAll(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request): JsonResponse
    {
        return response()->json(VendorFacades::save($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor): JsonResponse
    {
        return response()->json($vendor, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorRequest $request, Vendor $vendor): JsonResponse
    {
        return response()->json(VendorFacades::update($request->all(), $vendor), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Throwable
     */
    public function destroy(Vendor $vendor): JsonResponse
    {
        return response()->json($vendor->deleteOrFail(), Response::HTTP_NO_CONTENT);
    }
}
