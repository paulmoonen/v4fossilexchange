<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        
    }

    /**
     * Show the checkout form
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sum = session()->get('sum');
        if(!$sum){ 
            $sum = 0.00; 
        }
        $cartitems = session()->get('shoppingcart');
        if(!$cartitems){ 
            $cartitems = [];  //avoid display errors
        }
        
        if(Auth::guest()){ // not logged in, no address data
            $name = "You are currently not logged in.";
            $street = "To place an order you need to log in as existing customer,";
            $housenumber = "or register yourself as a new customer.";
            $postal_code = "";
            $city = "";
            $country = "";
        }
        if(Auth::check()){ //logged in
            $user = Auth::user();
            $name = $user->name;
            $street = $user->street;
            $housenumber = $user->housenumber;
            $postal_code = $user->postal_code;
            $city = $user->city;
            $country = $user->country;             
        }
        return view('/order/checkout', [
            'sum'               => $sum,
            'cartitems'         => $cartitems,
            'name'              => $name,
            'street'            => $street,
            'housenumber'       => $housenumber,
            'postal_code'       => $postal_code,
            'city'              => $city,
            'country'           => $country
        ]);
    }

    /**
     * Store a new order
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //an order record only has two fields: 'user_id' and 'date'
        $order = new Order([
            'user_id'   => Auth::user()->id,
            'date'      => now()
        ]);
        $order->save();
        $order_id = $order->id;         

        $sum = session()->get('sum');
        $shoppinglist =  session()->get('shoppingcart'); 
        /*
        data in session shopping cart:
        product_id : [ count, price, stock, name, description ]
        */  
        foreach( $shoppinglist as $key => $value ){

                $order_product = new OrderProduct([
                    'order_id'      => $order_id, 
                    'product_id'    => $key,        //product_id
                    'amount'        => $value[0]    //count             
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
        
        //create an invoice
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
        //empty cart and go home
        session()->forget('sum');
        session()->forget('shoppingcart');
        return redirect('/'); //home

    }

    /**
     * Display a specific order
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //user id must be equal to user who made the order 
        if( !(Auth::id() === Order::find( $id )->user_id ) ){
            return redirect('/pagenotfound');
        }

        $order = Order::find($id);
        $invoice = DB::table('invoices')
            ->where('order_id', '=', $id)
            ->select('sum', 'text')
            ->get();
        $products = DB::table('products')
            ->join('order_product', 'order_product.product_id', '=','products.id')
            ->join('orders', 'orders.id', '=', 'order_product.order_id')            
            ->select('products.price','products.description', 'order_product.amount')
            ->where('orders.id', $id )
            ->get();

            //ddd($invoice);
        return view('/order/order',[
            'order'         => $order,
            'invoice'       => $invoice[0],
            'products'      => $products
        ]);
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
