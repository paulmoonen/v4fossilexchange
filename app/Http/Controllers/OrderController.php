<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $order = new Order([
            'user_id'   => Auth::user()->id,
            'date'      => now()
        ]);
        $order->save();
        $order_id = $order->id;         

        /*
        loop through data from $request
        save order-product combinations
        each item in request has the following layout:
        key   => value   
        product_id    => [count, price, stock, description]
        'sum'         => sum ( float )               
        */
        //local variable, declared out here to avoid scope problems
        $sum = 0.00;
        $itemlist = $request->all();                
        foreach( $itemlist as $key => $value ){
            if($key != 'sum'){

                $order_product = new OrderProduct([
                    'order_id'      => $order_id, 
                    'product_id'    => $key,
                    'amount'        => $value[0]             
                ]);
                $order_product->save();                           
                
                //decrease the stock in the products table    
                $old_stock = intval($value[2]);
                $number_sold = intval($value[0]);
                $new_stock = ($old_stock - $number_sold);
                Product::where('id', intval($key))->update([
                    'stock' => $new_stock ]
                );
            }
            if($key == 'sum'){$sum = $value;}
        }
        
        //create an invoice
        //sum = $sum
        $username       = Auth::user()->name;
        $street         = Auth::user()->street;
        $housenumber    = Auth::user()->housenumber;
        $postal_code    = Auth::user()->postal_code;
        $city           = Auth::user()->city;
        $country        = Auth::user()->country;
        $date           = today();
        
        $invoice = new Invoice([
            'created_at'        => now(),
            'customer_id'       => Auth::user()->id,
            'order_id'          => $order_id,
            'sum'               => $sum,
            'text'              => "Dear $username.\n
                                    This is your invoice for purchase with purchase number $order_id 
                                    on $date.\n                                   
                                    Please transfer a grand total of $sum to our bank account.\n
                                    Your shipping data:\n
                                    $username\n
                                    $street $housenumber\n
                                    $postal_code $city\n
                                    $country\n
                                    Thank you for shopping at FossilExchange.
                                    ",
            'created_by'        => 0//machine: any other user, e.g. admin, has an id > 0
        ]);
        $invoice->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
