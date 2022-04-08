<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Originsite;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a list of all products
     * admin user can select one to edit
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
                ->where(    'products.deleted_at', '=', null)
                ->get();        

        return view('/admin/products',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new prodct
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //present a view to enter new product data
        $originsites = Originsite::all();
        $categories = Category::all();
        return view('/product/create',[
            'originsites' => $originsites,
            'categories' => $categories
        ]);
    }

    /**
     * Store a new product
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role === 1){ //if user is admin
            $product = new Product([
                'originsite'    => $request->originsite,
                'created_at'    => now(),
                'created_by'    => Auth::user()->id,
                'stock'         => $request->stock,
                'price'         => $request->price,
                'name'          => $request->name,
                'description'   => $request->description

            ]);
            $product->save();
            $product_id = $product->id;

            //array of appropriate categories for this product
            $appropriate_categories = $request->categorylist;
            foreach($appropriate_categories as $category){
                $productCategoryCombination = new  ProductCategory([
                    'product_id'     => $product_id,
                    'category_id'    => $category,
                    'created_by'     => Auth::user()->id
                ]);
            $productCategoryCombination->save();
            }
            return redirect('/admin');
        }
        else return redirect('/pagenotfound'); 
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
     * Show the product edit form
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
             
        return view('/product/edit',[
            'product' => $product,
                        
        ]);
    }

    /**
     * receives updated product information
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->role === 1 ){
            $product = Product::find($id); //id concatenated in url
            $product->name          = $request->name;
            $product->stock         = $request->stock;
            $product->price         = $request->price;
            $product->description   = $request->description;
            $product->picture       = $request->picture;
            $product->modified_by   = Auth::user()->id;

            $product->save();
            return redirect('/admin');
        }
        else return redirect('/pagenotfound');
    }

    /**
     * Deletes an existing prouct
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update(['deleted_at' => now()]);
        
        return redirect('/admin');  
        
    }
}
