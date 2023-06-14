<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use ProductFacades;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * * @OA\Get(
     *     path="/api/product",
     *     operationId = "getAllProducts",
     *     summary="Get List of Products",
     *     description="Return List of Products",
     *     tags={"Products"},
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
        return response()->json(ProductFacades::findAll(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * * @OA\Post(
     *      path="/api/product",
     *      operationId="storeProduct",
     *      tags={"Products"},
     *      summary="Store product in DB",
     *      description="Store product in DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name", "category_id", "vendor_id", "price", "quantity"},
     *            @OA\Property(property="name", type="string", format="string", example="Jacket"),
     *            @OA\Property(property="category_id", type="integer", format="integer", example=1),
     *            @OA\Property(property="vendor_id", type="integer", format="integer", example=1),
     *            @OA\Property(property="price", type="float", format="integer", example=10.23),
     *            @OA\Property(property="quantity", type="integer", format="integer", example=100),
     *            @OA\Property(property="description", type="string", format="string", example="Jacket description"),
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
    public function store(ProductRequest $request): JsonResponse
    {
        return response()->json(ProductFacades::save($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Display the specified resource.
     *
     * * @OA\Get(
     *     tags={"Products"},
     *     path="/api/product/{product}",
     *     operationId="getProduct",
     *     summary="Show product",
     *     description="Show product",
     *     @OA\Parameter(name="product", in="path", description="Id of product", required=true,
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
    public function show(Product $product): JsonResponse
    {
        return response()->json($product, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * * @OA\Put(
     *      path="/api/product/{product}",
     *      operationId="updateProduct",
     *      tags={"Products"},
     *      summary="Update product",
     *      description="Update product",
     *     @OA\Parameter(name="product", in="path", description="Id of product", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *      @OA\RequestBody(
     *         required=false,
     *         @OA\JsonContent(
     *            @OA\Property(property="name", type="string", format="string", example="Jacket"),
     *            @OA\Property(property="category_id", type="integer", format="integer", example=1),
     *            @OA\Property(property="vendor_id", type="integer", format="integer", example=1),
     *            @OA\Property(property="price", type="float", format="integer", example=10.23),
     *            @OA\Property(property="quantity", type="integer", format="integer", example=100),
     *            @OA\Property(property="description", type="string", format="string", example="Jacket description"),
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
     *
     */
    public function update(ProductRequest $request, Product $product): JsonResponse
    {
        return response()->json(ProductFacades::update($request->all(), $product), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *    path="/api/product/{product}",
     *    operationId="destroy",
     *    tags={"Products"},
     *    summary="Delete Products",
     *    description="Delete Products",
     *    @OA\Parameter(name="product", in="path", description="Id of Product", required=true,
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
     */
    public function destroy(Product $product): JsonResponse
    {
        return response()->json($product->deleteOrFail(), Response::HTTP_NO_CONTENT);
    }
}
