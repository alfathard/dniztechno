<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\product;
use App\Models\productused;

class ProductsUsedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productuseds = DB::table('productuseds')
            ->join('products', 'productuseds.idProduct', '=', 'products.idProduct')
            ->select('productuseds.*','products.nameProduct')
            ->whereNull('productuseds.deleted_at')
            ->get();
        $title = "Product Used";
        return view('productuseds.index')
                    ->with('productuseds', $productuseds)
                    ->with('title',$title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Product Used";
        $products = DB::table('products')
            ->select('products.idProduct','products.nameProduct')
            ->whereNull('products.deleted_at')
            ->get();
        return view('productuseds.create')
                    ->with('title',$title)
                    ->with('products', $products);
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
        $this->validate($request,[
            'textProductUsed' => 'required',
            'idProduct' => 'required',
        ]);

        if($request->hasFile('imgFilepath')){
            $request->validate([
                'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
              ]);
            
            $filee = $request->file('imgFilepath');
            $fileName = $filee->getClientOriginalName();
            $filee->get('public/images',$fileName);
            $image = $fileName;
        }
        
        try{

            $productused = new productused;
            $productused->textProductUsed = $request->input('textProductUsed');
            $productused->idProduct = $request->input('idProduct');
            $productused->imgFilepath = $image;
            $productused->created_by = $request->user()->name; 
            $productused->updated_by = $request->user()->name; 
            $productused->save();

        } catch(Exception $errors) {
            return redirect('/admin/productused')->with('failed','Failed insert data.');
        }
        return redirect('/admin/productused')->with('success','Success insert data.');
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
        $productused = productused::find($id)
            ->join('products', 'productuseds.idProduct', '=', 'products.idProduct')
            ->select('productuseds.*','products.nameProduct')
            ->find($id);
        $title = "Product Used";
        return view('productuseds.show')
                    ->with('productused', $productused)
                    ->with('title',$title);
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
        $productused = productused::find($id);
        $products = DB::table('products')
            ->select('products.idProduct','products.nameProduct')
            ->whereNull('products.deleted_at')
            ->get();
        $title = "Product Used";
        return view('productuseds.edit')
                    ->with('productused', $productused)
                    ->with('products',$products)
                    ->with('title',$title);
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
        $this->validate($request,[
            'textProductUsed' => 'required',
            'idProduct' => 'required',
        ]);        

        try{
            $productused = productused::find($id);
            if($request->hasFile('imgFilepath')){
                $request->validate([
                    'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                  ]);

                $filee = $request->file('imgFilepath');
                $fileName = $filee->getClientOriginalName();
                $filee->move('public/images',$fileName);
                $image = $fileName;

                $productused->imgFilepath = $image;
            }
            $productused->textProductUsed = $request->input('textProductUsed');
            $productused->idProduct = $request->input('idProduct');
            $productused->updated_by = $request->user()->name; 
            $productused->save();

        } catch(Exception $errors) {
            return redirect('/admin/productused')->with('failed','Failed update data.');
        }
        return redirect('/admin/productused')->with('success','Success update data.');
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
        try{

            $productused = productused::find($id);
            $productused->delete();

        } catch(Exception $errors) {
            return redirect('/admin/productused')->with('failed','Failed delete data.');
        }
        return redirect('/admin/productused')->with('success','Success delete data.');
    }
}
