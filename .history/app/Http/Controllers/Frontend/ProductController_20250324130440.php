<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\contactinfo;
use App\Models\product;
use App\Models\productheader;
use App\Models\productfeature;
use App\Models\productused;
use App\Models\testimoni;
use App\Models\custTestimoni;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get product
        $products = DB::table('products')
            ->select('idProduct', 'nameProduct', 'descProduct', 'imgFilepath')
            ->whereNull('deleted_at')
            ->get();

        //get product header
        $productheaders = DB::table('productheaders')
            ->select('titleProductHeader', 'textProductHeader')
            ->whereNull('deleted_at')
            ->get();

        //get product used
        $productuseds = productused::find($id)
            ->select('productuseds.*')
            ->join('products', 'productuseds.idProduct', '=', 'products.idProduct')
            ->whereNull('productuseds.deleted_at')
            ->where('productuseds.idProduct','=',$id)
            ->get();

        //get product feature
        // $productfeatures = productfeature::find($id)
        //     ->select('productfeatures.*')
        //     ->join('products', 'productfeatures.idProduct', '=', 'products.idProduct')
        //     ->whereNull('productfeatures.deleted_at')
        //     ->where('productfeatures.idProduct','=',$id)
        //     ->get();

        //get testimoni header
        $testimonies = DB::table('testimonies')
            ->select('titleTestimoni')
            ->whereNull('deleted_at')
            ->get();

        //get customer testimoni
        $cust_testimonies = DB::table('cust_testimonies')
            ->select('idCustTestimoni','custName', 'companyName','imgFilepath', 'textCustTestimoni')
            ->whereNull('deleted_at')
            ->get();

        //get contact info
        $contactsinfo = DB::table('contactsinfo')
            ->select('typeContactInfo', 'textContactInfo', 'imgFilepath')
            ->whereNull('deleted_at')
            ->get();

        $idp = DB::table('products')->select('idProduct')->whereNull('deleted_at')->first();
        $idps = $idp->idProduct;

        return view('product')
            ->with('idps',$idps)
            ->with('products', $products)
            ->with('productheaders', $productheaders)
            // ->with('productfeatures', $productfeatures)
            ->with('testimonies', $testimonies)
            ->with('cust_testimonies', $cust_testimonies)
            ->with('productuseds', $productuseds)
            ->with('contactsinfo', $contactsinfo);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get product
        $products = DB::table('products')
            ->select('idProduct', 'nameProduct', 'descProduct', 'imgFilepath')
            ->whereNull('deleted_at')
            ->get();

        //get product header
        $productheaders = DB::table('productheaders')
            ->select('titleProductHeader', 'textProductHeader')
            ->whereNull('deleted_at')
            ->get();

        //get product used
        $productuseds = productused::find($id)
            ->select('productuseds.*')
            ->join('products', 'productuseds.idProduct', '=', 'products.idProduct')
            ->whereNull('productuseds.deleted_at')
            ->where('productuseds.idProduct','=',$id)
            ->get();

        //get product feature
        $productfeatures = productfeature::find($id)
            ->select('productfeatures.*')
            ->join('products', 'productfeatures.idProduct', '=', 'products.idProduct')
            ->whereNull('productfeatures.deleted_at')
            ->where('productfeatures.idProduct','=',$id)
            ->get();

        //get testimoni header
        $testimonies = DB::table('testimonies')
            ->select('titleTestimoni')
            ->whereNull('deleted_at')
            ->get();

        //get customer testimoni
        $cust_testimonies = DB::table('cust_testimonies')
            ->select('idCustTestimoni','custName', 'companyName','imgFilepath', 'textCustTestimoni')
            ->whereNull('deleted_at')
            ->get();

        //get contact info
        $contactsinfo = DB::table('contactsinfo')
            ->select('typeContactInfo', 'textContactInfo', 'imgFilepath')
            ->whereNull('deleted_at')
            ->get();

        $idp = DB::table('products')->select('idProduct')->whereNull('deleted_at')->first();
        $idps = $idp->idProduct;

        return view('productfront.show')
            ->with('id',$id)
            ->with('idps',$idps)
            ->with('products', $products)
            ->with('productheaders', $productheaders)
            ->with('productuseds', $productuseds)
            ->with('productfeatures', $productfeatures)
            ->with('testimonies', $testimonies)
            ->with('cust_testimonies', $cust_testimonies)
            ->with('contactsinfo', $contactsinfo);
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
