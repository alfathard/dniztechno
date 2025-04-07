<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\custTestimoni;


class CustTestimoniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ctesti = custTestimoni::all();
        $title = "Customer Testimoni";
        return view('custTestimoni.index')
                    ->with('ctesti', $ctesti)
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
        $title = "Customer Testimoni";
        return view('custTestimoni.create')->with('title',$title);
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
            'custName' => 'required',
            'companyName' => 'required',
            'textCustTestimoni' => 'required',
        ]);

        if($request->hasFile('imgFilepath')){
            $request->validate([
                'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
              ]);

            $filee = $request->file('imgFilepath');
            $fileName = date('Ymdhis');
            $filee->move('public/images/custestimonies',$fileName);
            $image = $fileName;
        }

        try{

            $ctesti = new custTestimoni;
            $ctesti->custName = $request->input('custName');
            $ctesti->companyName = $request->input('companyName');
            $ctesti->textCustTestimoni = $request->input('textCustTestimoni');
            $ctesti->imgFilepath = $image;
            $ctesti->created_by = $request->user()->name;
            $ctesti->updated_by = $request->user()->name;
            $ctesti->save();

        } catch(Exception $errors) {
            return redirect('/admin/custTestimoni')->with('failed','Failed insert data.');
        }
        return redirect('/admin/custTestimoni')->with('success','Success insert data.');
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
        $ctesti = custTestimoni::find($id);
        $title = "Customer Testimoni";
        return view('custTestimoni.show')
                    ->with('ctesti', $ctesti)
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
        $ctesti = custTestimoni::find($id);
        $title = "Customer Testimoni";
        return view('custTestimoni.edit')
                    ->with('ctesti', $ctesti)
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
            'custName' => 'required',
            'companyName' => 'required',
            'textCustTestimoni' => 'required',
        ]);

        try{
            $ctesti = custTestimoni::find($id);
            if($request->hasFile('imgFilepath')){
                $request->validate([
                    'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                  ]);

                $filee = $request->file('imgFilepath');
                $fileName = $filee->getClientOriginalName();
                $filee->move('public/images',$fileName);
                $image = $fileName;
            }

            $ctesti->custName = $request->input('custName');
            $ctesti->companyName = $request->input('companyName');
            $ctesti->textCustTestimoni = $request->input('textCustTestimoni');
            $ctesti->imgFilepath = $image;
            $ctesti->updated_by = $request->user()->name;
            $ctesti->save();

        } catch(Exception $errors) {
            return redirect('/admin/custTestimoni')->with('failed','Failed update data.');
        }
        return redirect('/admin/custTestimoni')->with('success','Success update data.');
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

            $ctesti = custTestimoni::find($id);
            $ctesti->delete();

        } catch(Exception $errors) {
            return redirect('/admin/custTestimoni')->with('failed','Failed delete data.');
        }
        return redirect('/admin/custTestimoni')->with('success','Success delete data.');
    }
}
