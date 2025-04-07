<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = product::all();
        $title = "Product";
        return view('products.index')
                    ->with('products', $products)
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
        $title = "Product";
        return view('products.create')->with('title',$title);
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
        $title = "Product";

        $this->validate($request,[
            'nameProduct' => 'required',
            'descProduct' => 'required',
        ]);

        if($request->hasFile('imgFilepath')){
            $request->validate([
                'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
              ]);

            $filee = $request->file('imgFilepath');
            $fileName = date('Ymdhis') . uniqid() . '.'. $filee->getClientOriginalExtension();
            $filee->move('public/images',$fileName);
            $image = $fileName;
        }

        try{

            $product = new product;
            $product->nameProduct = $request->input('nameProduct');
            $product->descProduct = $request->input('descProduct');
            $product->imgFilepath = $image;
            $product->created_by = $request->user()->name;
            $product->updated_by = $request->user()->name;
            $product->save();

        } catch(Exception $errors) {
            return redirect('/admin/product')->with('failed','Failed insert data.');
        }
        return redirect('/admin/product')->with('success','Success insert data.');
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
        $product = product::find($id);
        $title = "Product";
        return view('products.show')
                    ->with('product', $product)
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
        $product = product::find($id);
        $title = "Product";
        return view('products.edit')
                            ->with('product', $product)
                            ->with('title',$title);;
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
            'nameProduct' => 'required',
            'descProduct' => 'required',
        ]);

        try{
            $product = product::find($id);
            if($request->hasFile('imgFilepath')){
                $request->validate([
                    'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                  ]);

                $filee = $request->file('imgFilepath');
                $fileName = $filee->getClientOriginalName();
                $filee->move('public/images',$fileName);
                $image = $fileName;
            }

            $product->nameProduct = $request->input('nameProduct');
            $product->descProduct = $request->input('descProduct');
            $product->imgFilepath = $image;
            $product->updated_by = $request->user()->name;
            $product->save();

        } catch(Exception $errors) {
            return redirect('/admin/product')->with('failed','Failed update data.');
        }
        return redirect('/admin/product')->with('success','Success update data.');
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

            $product = product::find($id);
            $product->delete();

        } catch(Exception $errors) {
            return redirect('/admin/product')->with('failed','Failed delete data.');
        }
        return redirect('/admin/product')->with('success','Success delete data.');
    }
}
