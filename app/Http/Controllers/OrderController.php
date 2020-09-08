<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use App\Http\Resources\Order as ResourcesOrder;
use App\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        return response()->json(
            [
                'data' => ResourcesOrder::collection(Order::all()),
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrder $request) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order) : JsonResponse
    {
        return response()->json(
            new ResourcesOrder($order),
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOrder $request, Order $order) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order) : JsonResponse
    {
        $order->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
