<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use App\Models\productfeature;

class ProductsFeatureController extends Controller
{
    //
    public function index()
    {
        //
        // $productfeatures = productfeature::all();
        $productfeatures = DB::table('productfeatures')
            ->join('products', 'productfeatures.idProduct', '=', 'products.idProduct')
            ->select('productfeatures.*','products.nameProduct')
            ->whereNull('productfeatures.deleted_at')
            ->get();
        $title = "Product Feature";
        return view('productfeatures.index')
                    ->with('productfeatures', $productfeatures)
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
        $title = "Product Feature";
        $products = DB::table('products')
            ->select('products.idProduct','products.nameProduct')
            ->whereNull('products.deleted_at')
            ->get();
        return view('productfeatures.create')
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
            'idProduct' => 'required',
            'textProductFeature' => 'required',
        ]);

        try{

            $productfeature = new productfeature;
            $productfeature->idProduct = $request->input('idProduct');
            $productfeature->textProductFeature = $request->input('textProductFeature');
            $productfeature->created_by = $request->user()->name; 
            $productfeature->updated_by = $request->user()->name; 
            $productfeature->save();

        } catch(Exception $errors) {
            return redirect('/admin/productfeature')->with('failed','Failed insert data.');
        }
        return redirect('/admin/productfeature')->with('success','Success insert data.');
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
        // $productfeature = productfeature::find($id);
        $productfeature = productfeature::find($id)
            ->join('products', 'productfeatures.idProduct', '=', 'products.idProduct')
            ->select('productfeatures.*','products.nameProduct')
            ->find($id);
        $title = "Product Feature";
        return view('productfeatures.show')
                    ->with('productfeature', $productfeature)
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
        $productfeature = productfeature::find($id);
        $products = DB::table('products')
            ->select('products.idProduct','products.nameProduct')
            ->whereNull('products.deleted_at')
            ->get();
        $title = "Product Feature";
        return view('productfeatures.edit')
                    ->with('productfeature', $productfeature)
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
            'textProductFeature' => 'required',
            'idProduct' => 'required',
        ]);

        try{

            $productfeature = productfeature::find($id);
            $productfeature->textProductFeature = $request->input('textProductFeature');
            $productfeature->idProduct = $request->input('idProduct');
            $productfeature->updated_by = $request->user()->name; 
            $productfeature->save();

        } catch(Exception $errors) {
            return redirect('/admin/productfeature')->with('failed','Failed update data.');
        }
        return redirect('/admin/productfeature')->with('success','Success update data.');
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

            $productfeature = productfeature::find($id);
            $productfeature->delete();

        } catch(Exception $errors) {
            return redirect('/admin/productfeature')->with('failed','Failed delete data.');
        }
        return redirect('/admin/productfeature')->with('success','Success delete data.');
    }
}
