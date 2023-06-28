<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use CartFacades;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
class CartController extends Controller
{
    /**
     * Add items to cart.
     *   @OA\Post(
     *      path="/api/cart/add-to-cart",
     *      operationId="addToCart",
     *      tags={"Cart"},
     *      summary="Create user cart",
     *      description="Create user cart",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"product_id", "quantity"},
     *            @OA\Property(property="product_id", type="integer", format="integer", example=1),
     *            @OA\Property(property="quantity", type="integer", format="integer", example=1),
     *            @OA\Property(property="cart_id", type="integer", format="integer", example=1),
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
     *
     */
    public function addToCart(CartRequest $request)
    {
        return response()->json(CartFacades::addProductToCart($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Store a newly created resource in storage.
     *   @OA\Post(
     *      path="/api/cart",
     *      operationId="createCart",
     *      tags={"Cart"},
     *      summary="Create user cart",
     *      description="Create user cart",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"user_id"},
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
     *
     */
    public function createCart(CartRequest $request): JsonResponse
    {
        return response()->json(CartFacades::createCart($request->input('user_id'), Response::HTTP_CREATED));
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     tags={"Cart"},
     *     path="/api/cart/{cart}/items",
     *     operationId="getCartItems",
     *     summary="Show cart items",
     *     description="Show cart items",
     *     @OA\Parameter(name="cart", in="path", description="Id of cart", required=true,
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
    public function getCart(Request $request)
    {
        return response()->json(CartFacades::getCart($request->query('user_id'), Response::HTTP_OK));
    }


    /**
     * Display the specified resource.
     *
     * * @OA\Get(
     *     tags={"Cart"},
     *     path="/api/cart",
     *     operationId="getUserCart",
     *     summary="Get user cart",
     *     description="Show user cart",
     *     @OA\Parameter(name="user_id", in="query", description="Id of user", required=true,
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
    public function getCartItems(Request $request, $id)
    {
        return response()->json(CartFacades::getCartItems($id, Response::HTTP_OK));
    }

    /**
     * Remove cart item.
     *
     * * @OA\Delete (
     *     tags={"Cart"},
     *     path="/api/cart/item/{cartItem}",
     *     operationId="removeCartItem",
     *     summary="Remove cart item",
     *     description="remove cart item",
     *     @OA\Parameter(name="cartItem", in="path", description="Id of cart item", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *     @OA\Response(
     *         response=204,
     *         description="No content",
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
     * )
     *
     */
    public function removeCartItem(Request $request, $id)
    {
        return response()->json(CartFacades::removeItemFromCart($id), Response::HTTP_NO_CONTENT);
    }
}
