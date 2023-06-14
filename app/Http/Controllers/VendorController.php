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
     *
     * @OA\Get(
     *     path="/api/vendor",
     *     operationId = "getAllVendors",
     *     summary="Get List of Vendors",
     *     description="Return List of Vendors",
     *     tags={"Vendors"},
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json(VendorFacades::findAll(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * * @OA\Post(
     *      path="/api/vendor",
     *      operationId="storeVendor",
     *      tags={"Vendors"},
     *      summary="Store vendor in DB",
     *      description="Store vendor in DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"first_name", "last_name", "company_name", "phone", "country", "location", "company_email", "user_id"},
     *            @OA\Property(property="first_name", type="string", format="string", example="John"),
     *            @OA\Property(property="middle_name", type="string", format="string", example="Jack"),
     *            @OA\Property(property="last_name", type="string", format="string", example="Doe "),
     *            @OA\Property(property="company_name", type="string", format="string", example="Company Y"),
     *            @OA\Property(property="phone", type="string", format="string", example="+49 11111111"),
     *            @OA\Property(property="country", type="string", format="string", example="Cameroon"),
     *            @OA\Property(property="location", type="string", format="string", example="Address 123"),
     *            @OA\Property(property="company_email", type="string", format="string", example="aa@aa.aa"),
     *            @OA\Property(property="user_id", type="integer", format="integer", example=1),
     *         ),
     *      ),
     *      @OA\Response(
     *         response=201,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable content"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error"
     *      )
     *  )
     */
    public function store(VendorRequest $request): JsonResponse
    {
        return response()->json(VendorFacades::save($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     tags={"Vendors"},
     *     path="/api/vendor/{vendor}",
     *     operationId="getVendor",
     *     summary="Show vendor",
     *     description="Show vendor",
     *     @OA\Parameter(name="vendor", in="path", description="Id of vendor", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable content"
     *      )
     * )
     */
    public function show(Vendor $vendor): JsonResponse
    {
        return response()->json($vendor, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * * @OA\Put(
     *      path="/api/vendor/{vendor}",
     *      operationId="updateVendor",
     *      tags={"Vendors"},
     *      summary="Update vendor",
     *      description="Update vendor",
     *     @OA\Parameter(name="vendor", in="path", description="Id of vendor", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *      @OA\RequestBody(
     *         required=false,
     *         @OA\JsonContent(
     *            @OA\Property(property="first_name", type="string", format="string", example="John"),
     *            @OA\Property(property="middle_name", type="string", format="string", example="Jack"),
     *            @OA\Property(property="last_name", type="string", format="string", example="Doe "),
     *            @OA\Property(property="company_name", type="string", format="string", example="Company Y"),
     *            @OA\Property(property="phone", type="string", format="string", example="+49 11111111"),
     *            @OA\Property(property="country", type="string", format="string", example="Cameroon"),
     *            @OA\Property(property="location", type="string", format="string", example="Address 123"),
     *            @OA\Property(property="company_email", type="string", format="string", example="aa@aa.aa"),
     *            @OA\Property(property="user_id", type="integer", format="integer", example=1),
     *         ),
     *      ),
     *      @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable content"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error"
     *      )
     *  )
     */
    public function update(VendorRequest $request, Vendor $vendor): JsonResponse
    {
        return response()->json(VendorFacades::update($request->all(), $vendor), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *  @OA\Delete(
     *    path="/api/vendor/{vendor}",
     *    operationId="destroyVendor",
     *    tags={"Vendors"},
     *    summary="Delete Vendor",
     *    description="Delete Vendor",
     *    @OA\Parameter(name="vendor", in="path", description="Id of Vendor", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Response(
     *         response=204,
     *         description="No content",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      )
     *    ),
     *  )
     * @throws \Throwable
     */
    public function destroy(Vendor $vendor): JsonResponse
    {
        return response()->json($vendor->deleteOrFail(), Response::HTTP_NO_CONTENT);
    }
}
