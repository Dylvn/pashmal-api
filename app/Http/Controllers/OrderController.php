<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use App\Http\Resources\Order as ResourcesOrder;
use App\Order;
use App\Services\OrderManager;
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
    public function store(StoreOrder $request, OrderManager $orderManager) : JsonResponse
    {
        $order = Order::create($request->all());
        $order->books()->attach($request->books);
        $orderManager->calculatePrices($order);

        return response()->json(
            new ResourcesOrder($order),
            Response::HTTP_CREATED
        );
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
    public function update(StoreOrder $request, OrderManager $orderManager, Order $order) : JsonResponse
    {
        $order->update($request->all());
        $order->books()->sync($request->books);
        $orderManager->calculatePrices($order);

        return response()->json(
            new Resourcesorder($order),
            Response::HTTP_CREATED
        );
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
