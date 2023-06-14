<?php

namespace App\Http\Controllers;

use App\DTO\CategoryDTO;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use CategoryFacades;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @OA\Get(
     *     path="/api/category",
     *     operationId = "getAllcategories",
     *     summary="Get List of Categories",
     *     description="Return List of Categories",
     *     tags={"Categories"},
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
     *
     */
    public function index(): JsonResponse
    {
        return response()->json(CategoryFacades::findAll(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/api/category",
     *      operationId="storeCategory",
     *      tags={"Categories"},
     *      summary="Store category in DB",
     *      description="Store category in DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name"},
     *            @OA\Property(property="name", type="string", format="string", example="Fashion"),
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
    public function store(CategoryRequest $request): JsonResponse
    {
        return response()->json(CategoryFacades::save($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     tags={"Categories"},
     *     path="/api/category/{category}",
     *     operationId="getCategory",
     *     summary="Show category",
     *     description="Show category",
     *     @OA\Parameter(name="category", in="path", description="Id of Category", required=true,
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
     *
     */
    public function show(Category $category): JsonResponse
    {
        return response()->json($category, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *      path="/api/category/{category}",
     *      operationId="updateCategory",
     *      tags={"Categories"},
     *      summary="Update category",
     *      description="Update category",
     *     @OA\Parameter(name="category", in="path", description="Id of Category", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name"},
     *            @OA\Property(property="name", type="string", format="string", example="Fashion"),
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
    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        return response()->json(CategoryFacades::update($request->all(), $category), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *    path="/api/category/{category}",
     *    operationId="destroyCategory",
     *    tags={"Categories"},
     *    summary="Delete Category",
     *    description="Delete Category",
     *    @OA\Parameter(name="category", in="path", description="Id of Category", required=true,
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
     *
     * @throws \Throwable
     */
    public function destroy(Category $category): JsonResponse
    {
        return response()->json($category->deleteOrFail(), Response::HTTP_NO_CONTENT);
    }
}
