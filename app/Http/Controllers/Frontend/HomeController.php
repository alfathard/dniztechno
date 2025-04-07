<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\contactinfo;
use App\Models\about;
use App\Models\productheader;
use App\Models\product;
use App\Models\testimoni;
use App\Models\custTestimoni;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //get about us
        $abouts = DB::table('abouts')
            ->select('titleAbout', 'textAbout')
            ->whereNull('deleted_at')
            ->get();

        //get product header
        $productheaders = DB::table('productheaders')
            ->select('titleProductHeader', 'textProductHeader')
            ->whereNull('deleted_at')
            ->get();

        //get products
        $products = DB::table('products')
            ->select('idProduct', 'nameProduct', 'descProduct', 'imgFilepath')
            ->whereNull('deleted_at')
            ->get();

        //get testimoni header
        $testimonies = DB::table('testimonies')
            ->select('titleTestimoni', 'textTestimoni')
            ->whereNull('deleted_at')
            ->get();

        //get customer testimoni
        $custtestimonies = DB::table('cust_testimonies')
        ->select('idCustTestimoni','custName', 'companyName', 'textCustTestimoni', 'imgFilepath')
        ->whereNull('deleted_at')
        ->get();

        //get contact info
        $contactsinfo = DB::table('contactsinfo')
            ->select('typeContactInfo', 'textContactInfo', 'imgFilepath')
            ->whereNull('deleted_at')
            ->get();

        $idp = DB::table('products')->select('idProduct')->whereNull('deleted_at')->first();
        $idps = $idp->idProduct;

        return view('welcome')
            ->with('idps',$idps)
            ->with('abouts', $abouts)
            ->with('productheaders', $productheaders)
            ->with('products', $products)
            ->with('testimonies', $testimonies)
            ->with('custtestimonies', $custtestimonies)
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
}
