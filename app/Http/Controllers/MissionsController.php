<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\mission;

class MissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $missions = mission::all();
        $title = "Mission";
        return view('missions.index')
                    ->with('missions', $missions)
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
        $title = "Mission";
        return view('missions.create')->with('title',$title);
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
            'titleMission' => 'required',
            'textMission' => 'required',
        ]);

        try{

            $mission = new mission;
            $mission->titleMission = $request->input('titleMission');
            $mission->textMission = $request->input('textMission');
            $mission->created_by = $request->user()->name; 
            $mission->updated_by = $request->user()->name; 
            $mission->save();

        } catch(Exception $errors) {
            return redirect('/admin/mission')->with('failed','Failed insert data.');
        }
        return redirect('/admin/mission')->with('success','Success insert data.');
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
        $mission = mission::find($id);
        $title = "Mission";
        return view('missions.show')
                    ->with('mission', $mission)
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
        $mission = mission::find($id);
        $title = "Mission";
        return view('missions.edit')
                    ->with('mission', $mission)
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
            'titleMission' => 'required',
            'textMission' => 'required',
        ]);

        try{

            $mission = mission::find($id);
            $mission->titleMission = $request->input('titleMission');
            $mission->textMission = $request->input('textMission');
            $mission->updated_by = $request->user()->name; 
            $mission->save();

        } catch(Exception $errors) {
            return redirect('/admin/mission')->with('failed','Failed update data.');
        }
        return redirect('/admin/mission')->with('success','Success update data.');
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

            $mission = mission::find($id);
            $mission->delete();

        } catch(Exception $errors) {
            return redirect('/admin/mission')->with('failed','Failed delete data.');
        }
        return redirect('/admin/mission')->with('success','Success delete data.');
    }
}
