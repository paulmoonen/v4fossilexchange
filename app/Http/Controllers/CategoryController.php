<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * returns a list of all productcategories
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories_list = Category::all('name');
        return $categories_list;
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
        //
    }

    /**
     * Shows all products in the specified category
     * provides data for Productcard Vue components
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category   = Category::find( $id ); 
                                        
        $products = DB::table('products')
            ->join('product_category', 'product_category.product_id', '=', 'products.id')
            ->join('originsites', 'originsites.id', '=', 'products.originsite')  
            ->select(   'products.price',
                        'products.stock',
                        'products.id',
                        'products.description',
                        'originsites.site_name')
            ->where('product_category.category_id', $id)
            ->where('products.deleted_at', '=', null)
            ->get();
            
        return view('product/category', [
            'products'      => $products,
            'category'      => $category,                        
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
