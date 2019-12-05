<?php

namespace Manhle\CartPackage\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\CartCondition;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        if(request()->ajax())
        {
            $items = [];
            \Cart::session($user_id)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });
            $orders_item = [];
            if (count($items) == 0) {
                $orders = Order::where('user_id', $user_id)->where('status_id', 1)->get();
                foreach ($orders as $order) {
                    $orders_item['name'] = $order->product->productInfor[0]->name;
                    $orders_item['price'] = $order->product->price * $order->qty;
                    $orders_item['id'] = $order->id;
                    array_push($items, $orders_item);
                }
            }
            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ),200,[]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;
        $product_name = $request->product_name;
        $qty = $request->qty;
        $price = $request->total_money;
        $item = \Cart::session($user_id)->add($product_id, $product_name, $price, $qty);
        $code = 'GK' . random_int(0, 1000) . str_random(5);
        Order::create([
            'code' => $code,
            'product_id' => $product_id,
            'status_id' => 1,
            'price' => $request->price,
            'user_id' => $user_id,
            'qty' => $qty
        ]);
        return response(array(
            'success' => true,
            'data' => $item,
            'message' => "item added."
        ), 200, []);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('fronts.cart.cartproduct', compact(['product', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecart(Request $request)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       \Cart::session(Auth::user()->id)->remove($id);
       Order::where('product_id', $id)->where('user_id', Auth::user()->id)->delete();
        $items = [];
        \Cart::session(Auth::user()->id)->getContent()->each(function($item) use (&$items)
        {
            $items[] = $item;
        });
        return response(array(
            'success' => true,
            'data' => $items,
            'message' => "item added."
        ), 200, []);
    }
}
