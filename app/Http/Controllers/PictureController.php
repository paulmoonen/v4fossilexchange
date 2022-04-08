<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return form to upload new picture
        return view('/admin/uploadpicture');
    }

    /**
     * Store a newly created resource in storage.
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

            //save uploaded file
            try{
                Storage::putFileAs('/public/pictures', $picture, $newfilename);
                return redirect('/admin/picture/create');  
            }
            catch(Exception $e){
                return view('/admin/file_upload_error');
            }         
            
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
