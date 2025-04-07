<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\productheader;

class ProductsHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productheaders = productheader::all();
        $title = "Header Product";
        return view('productheaders.index')
                    ->with('productheaders', $productheaders)
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
        $title = "Header Product";
        return view('productheaders.create')->with('title',$title);
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
            'titleProductHeader' => 'required',
            'textProductHeader' => 'required',
        ]);

        try{

            $productheader = new productheader;
            $productheader->titleProductHeader = $request->input('titleProductHeader');
            $productheader->textProductHeader = $request->input('textProductHeader');
            $productheader->created_by = $request->user()->name; 
            $productheader->updated_by = $request->user()->name; 
            $productheader->save();

        } catch(Exception $errors) {
            return redirect('/admin/productheader')->with('failed','Failed insert data.');
        }
        return redirect('/admin/productheader')->with('success','Success insert data.');
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
        $productheader = productheader::find($id);
        $title = "Header Product";
        return view('productheaders.show')
                    ->with('productheader', $productheader)
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
        $productheader = productheader::find($id);
        $title = "Header Product";
        return view('productheaders.edit')
                    ->with('productheader', $productheader)
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
            'titleProduct' => 'required',
            'textProduct' => 'required',
        ]);

        try{

            $productheader = productheader::find($id);
            $productheader->titleProductHeader = $request->input('titleProductHeader');
            $productheader->textProductHeader = $request->input('textProductHeader');
            $productheader->updated_by = $request->user()->name; 
            $productheader->save();

        } catch(Exception $errors) {
            return redirect('/admin/productheader')->with('failed','Failed update data.');
        }
        return redirect('/admin/productheader')->with('success','Success update data.');
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

            $productheader = productheader::find($id);
            $productheader->delete();

        } catch(Exception $errors) {
            return redirect('/admin/productheader')->with('failed','Failed delete data.');
        }
        return redirect('/admin/productheader')->with('success','Success delete data.');
    }
}
