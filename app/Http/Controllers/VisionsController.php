<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\vision;

class VisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $visions = vision::all();
        $title = "Vision";
        return view('visions.index')
                    ->with('visions', $visions)
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
        $title = "Vision";
        return view('visions.create')->with('title',$title);
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
            'titleVision' => 'required',
            'textVision' => 'required',
        ]);

        try{

            $vision = new vision;
            $vision->titleVision = $request->input('titleVision');
            $vision->textVision = $request->input('textVision');
            $vision->created_by = $request->user()->name; 
            $vision->updated_by = $request->user()->name; 
            $vision->save();

        } catch(Exception $errors) {
            return redirect('/admin/vision')->with('failed','Failed insert data.');
        }
        return redirect('/admin/vision')->with('success','Success insert data.');
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
        $vision = vision::find($id);
        $title = "Vision";
        return view('visions.show')
                    ->with('vision', $vision)
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
        $vision = vision::find($id);
        $title = "Vision";
        return view('visions.edit')
                    ->with('vision', $vision)
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
            'titleVision' => 'required',
            'textVision' => 'required',
        ]);

        try{

            $vision = vision::find($id);
            $vision->titleVision = $request->input('titleVision');
            $vision->textVision = $request->input('textVision');
            $vision->updated_by = $request->user()->name; 
            $vision->save();

        } catch(Exception $errors) {
            return redirect('/admin/vision')->with('failed','Failed update data.');
        }
        return redirect('/admin/vision')->with('success','Success update data.');
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

            $vision = vision::find($id);
            $vision->delete();

        } catch(Exception $errors) {
            return redirect('/admin/vision')->with('failed','Failed delete data.');
        }
        return redirect('/admin/vision')->with('success','Success delete data.');
    }
}
