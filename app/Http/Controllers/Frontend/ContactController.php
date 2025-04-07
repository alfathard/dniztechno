<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\contactinfo;
use App\Models\contact;
use App\Models\contactlist;
use App\Models\product;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get contact header
        $contacts = DB::table('contacts')
            ->select('titleContactUs', 'textContactUs')
            ->whereNull('deleted_at')
            ->get();

        //get contact info
        $contactsinfo = DB::table('contactsinfo')
            ->select('typeContactInfo', 'textContactInfo', 'imgFilepath')
            ->whereNull('deleted_at')
            ->get();

        $idp = DB::table('products')->select('idProduct')->whereNull('deleted_at')->first();
        $idps = $idp->idProduct;

        return view('contact')
            ->with('contacts', $contacts)
            ->with('idps',$idps)
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
