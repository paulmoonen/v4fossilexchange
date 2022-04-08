<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShoppingCartController extends Controller
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
     * Show the content of the shopping cart 
     * in a form to allow adjusting quantities.
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
        
        return view('/customer/phpcart',[
            'sum' => $sum,
            'cartitems'=> $cartitems
        ]);
        
    }

    /**
     * Stores updated version of shopping cart content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //read $request data
        $itemlist = $request->all();
        
        //erase previous cart data
        session()->forget('sum');
        session()->forget('shoppingcart');  
        $sum = 0;
        $shoppingcart = [];   
        /*
        data in shopping cart:
        product_id : [ count, price, stock, name, description ]
        */           
        foreach( $itemlist as $key => $value ){ //product_id -->  count
            
            //skip the csrf token that is sent along with the request
            if($key !="_token"){
                
                //ignore ( and thus forget ) items with count 0
                if( $value == 0 ){ continue;}

                $product = Product::find($key);
                $shoppingcart[$key] = [$value, 
                                        $product->price,
                                        $product->stock,
                                        $product->name,
                                        $product->description];
                
                $sum = $sum +  ( $product->price * $value );
            }    
        }
        session()->put('shoppingcart', $shoppingcart);
        session()->put('sum', $sum);
        return redirect('/'); //home
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
     * Add one item to shopping cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //find product
        $product = Product::find($id);
        $price = $product->price;
        $stock = $product->stock;
        $name = $product->name;
        $description = $product->description;
        //addition or subtraction?
        $modifier = $request->json('modifier');
        /*
        data in shopping cart:
        product_id : [ count, price, stock, name, description ]
        */
        //check for presence of a shoppingcart in session array
        $shoppingcart = session()->get('shoppingcart');        
        if(!$shoppingcart){
            $shoppingcart[$id] = [1,$price, $stock, $name, $description ];
            session()->put('shoppingcart', $shoppingcart); 
        }
        else{
            if(array_key_exists($id, $shoppingcart)){
                $count = $shoppingcart[$id][0];
                $count += $modifier;
                $shoppingcart[$id][0] = $count;
                session()->put('shoppingcart', $shoppingcart);
            }
            else{
                $shoppingcart[$id] = [1,$price, $stock, $name, $description ];
                session()->put('shoppingcart', $shoppingcart);
            }
        }                    

        //find price        
        $price = $product->price;       
        //update sum, to be displayed to the customer
        $sum = session()->get('sum');
        if(!$sum){
            session()->put('sum', $price);
        }
        else{
            $sumold = session()->get('sum');
            $sumnew = $sumold + ( $modifier * $price );
            session()->put('sum', $sumnew);
        }
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

    /**
     * Empty the shopping cart
     * 
     */
    public function emptycart(){
        session()->forget('sum');
        session()->forget('shoppingcart');
        return redirect('/'); //home
    }
}
