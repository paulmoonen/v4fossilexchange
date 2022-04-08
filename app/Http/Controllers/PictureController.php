<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Picture;
use App\Models\ProductPicture;

class PictureController extends Controller
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
     * Show the form for uploading a new picture
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //list of products, to select one to which the uploaded image belongs
        $products = Product::all();

        //return form to upload new picture
        return view('/admin/uploadpicture', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly uploaded picture
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /**
         * location storage/app/public/pictures (where the uploaded files are saved)
         * has a symbolic link to:
         * public/storage/pictures/ ... ( this path can be referenced by <img/> src attribute )
         * link created by command: php artisan storage:link
         */
        
        //check for user role
        if (Auth::user()->role != 1){
            return redirect('/pagenotfound');
        }

        if(Auth::user()->role == 1){

            $newfilename = $request->filename;            
            $picture = $request->file('picture');
            $selected_product = $request->product;         

            //save uploaded file
            //link to appropriate product
            try{
                Storage::putFileAs('/public/pictures', $picture, $newfilename);
                
                //save image name to database
                $newpicture = new Picture([
                    'name'          => $newfilename,
                    'created_at'    => now(),
                    'created_by'    => Auth::user()->id
                ]);                
                $newpicture ->save();
                $newpicture_id = $newpicture->id;
                
                if($selected_product != 0){
                    //update prouct_picture table
                    $new_product_picture = new ProductPicture([
                        'created_at'    => now(),
                        'created_by'    => Auth::user()->id,
                        'product_id'    => $selected_product,
                        'picture_id'    => $newpicture_id
                    ]);                    
                    $new_product_picture->save();
                }  
            }
            catch(Exception $e){
                return view('/admin/file_upload_error');
            }    
            return redirect('/admin/picture/create');     
            
        }  
        
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

    /**
     * returns a list of all pictures of an inividual product
     * @param int $id
     * @return Json picturelist
     */
    public function getPictures($id){
        $picturelist = DB::table('pictures')
            ->join('product_picture', 'pictures.id', '=', 'product_picture.picture_id')
            ->select('pictures.name')
            ->where('product_picture.product_id', $id)
            ->get();
            
        return $picturelist;
    }
}
