<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\about;

class AboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = about::all();
        $title = "About Us";
        $user = Auth::user()->name;
        return view('abouts.index')
                    ->with('abouts', $abouts)
                    ->with('title',$title)
                    ->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "About Us";
        $user = Auth::user()->name;
        return view('abouts.create')
                        ->with('title',$title)
                        ->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = "About Us";
        $user = Auth::user()->name;

        $this->validate($request,[
            'titleAbout' => 'required',
            'textAbout' => 'required',
        ]);

        try{

            $about = new about;
            $about->titleAbout = $request->input('titleAbout');
            $about->textAbout = $request->input('textAbout');
            $about->created_by = $request->user()->name; 
            $about->updated_by = $request->user()->name; 
            $about->save();

            // $eventlog = new eventlog;
            // $eventlog->eventLog = $request->input('titleAbout');
            // $eventlog->created_by = $request->user()->name;
            // $eventlog->save();

        } catch(Exception $errors) {
            return redirect('/admin/about')->with('failed','Failed insert data.');
        }
        return redirect('/admin/about')->with('success','Success insert data.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = about::find($id);
        $user = Auth::user()->name;
        return view('abouts.show')
                    ->with('about', $about)
                    ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = about::find($id);
        $user = Auth::user()->name;
        return view('abouts.edit')
                    ->with('about', $about)
                    ->with('user', $user);
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
        
        $this->validate($request,[
            'titleAbout' => 'required',
            'textAbout' => 'required',
        ]);

        try{

            $about = about::find($id);
            $about->titleAbout = $request->input('titleAbout');
            $about->textAbout = $request->input('textAbout');
            $about->updated_by = $request->user()->name; 
            $about->save();

        } catch(Exception $errors) {
            return redirect('/admin/about')->with('failed','Failed update data.');
        }
        return redirect('/admin/about')->with('success','Success update data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $about = about::find($id);
            $about->delete();

        } catch(Exception $errors) {
            return redirect('/admin/about')->with('failed','Failed delete data.');
        }
        return redirect('/admin/about')->with('success','Success delete data.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
