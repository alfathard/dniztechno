<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\contactinfo;
use App\Models\about;
use App\Models\vision;
use App\Models\mission;
use App\Models\testimoni;
use App\Models\custTestimoni;
use App\Models\product;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get about
        $abouts = DB::table('abouts')
            ->select('titleAbout', 'textAbout')
            ->whereNull('deleted_at')
            ->get();

        //get vision
        $visions = DB::table('visions')
            ->select('titleVision', 'textVision')
            ->whereNull('deleted_at')
            ->get();

        //get mission
        $missions = DB::table('missions')
            ->select('titleMission', 'textMission')
            ->whereNull('deleted_at')
            ->get();
        
        //get testimoni header
        $testimonies = DB::table('testimonies')
        ->select('titleTestimoni', 'textTestimoni')
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

        return view('about')
            ->with('visions', $visions)
            ->with('missions', $missions)
            ->with('testimonies', $testimonies)
            ->with('cust_testimonies', $cust_testimonies)
            ->with('abouts', $abouts)
            ->with('contactsinfo', $contactsinfo)
            ->with('idps',$idps);
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
