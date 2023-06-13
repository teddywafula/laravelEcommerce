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
     */
    public function index(): JsonResponse
    {
        return response()->json(CategoryFacades::findAll(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        return response()->json(CategoryFacades::save($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): JsonResponse
    {
        return response()->json($category, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        return response()->json(CategoryFacades::update($request->all(), $category), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Throwable
     */
    public function destroy(Category $category): JsonResponse
    {
        return response()->json($category->deleteOrFail(), Response::HTTP_NO_CONTENT);
    }
}
