<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\testimoni;

class TestimoniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testimonies = testimoni::all();
        $title = "Testimoni";
        return view('testimonies.index')
                    ->with('testimonies', $testimonies)
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
        $title = "Testimoni";
        return view('testimonies.create')->with('title',$title);
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
            'titleTestimoni' => 'required',
            'textTestimoni' => 'required',
        ]);

        try{

            $testimoni = new testimoni;
            $testimoni->titleTestimoni = $request->input('titleTestimoni');
            $testimoni->textTestimoni = $request->input('textTestimoni');
            $testimoni->created_by = $request->user()->name; 
            $testimoni->updated_by = $request->user()->name; 
            $testimoni->save();

        } catch(Exception $errors) {
            return redirect('/admin/testimoni')->with('failed','Failed insert data.');
        }
        return redirect('/admin/testimoni')->with('success','Success insert data.');
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
        $testimoni = testimoni::find($id);
        $title = "Testimoni";
        return view('testimonies.show')
                    ->with('testimoni', $testimoni)
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
        $testimoni = testimoni::find($id);
        $title = "Testimoni";
        return view('testimonies.edit')
                    ->with('testimoni', $testimoni)
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
            'titleTestimoni' => 'required',
            'textTestimoni' => 'required',
        ]);

        try{

            $testimoni = testimoni::find($id);
            $testimoni->titleTestimoni = $request->input('titleTestimoni');
            $testimoni->textTestimoni = $request->input('textTestimoni');
            $testimoni->updated_by = $request->user()->name; 
            $testimoni->save();

        } catch(Exception $errors) {
            return redirect('/admin/testimoni')->with('failed','Failed update data.');
        }
        return redirect('/admin/testimoni')->with('success','Success update data.');
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

            $testimoni = testimoni::find($id);
            $testimoni->delete();

        } catch(Exception $errors) {
            return redirect('/admin/testimoni')->with('failed','Failed delete data.');
        }
        return redirect('/admin/testimoni')->with('success','Success delete data.');
    }
}
