<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\contactinfo;

class ContactsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contactsinfo = contactinfo::all();
        $title = "Contact Info";
        return view('contactsinfo.index')
                    ->with('contactsinfo', $contactsinfo)
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
        $title = "Contact Info";
        return view('contactsinfo.create')->with('title',$title);
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
            'typeContactInfo' => 'required',
            'textContactInfo' => 'required',
        ]);

        if($request->hasFile('imgFilepath')){
            $request->validate([
                'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
              ]);
            
            $filee = $request->file('imgFilepath');
            $fileName = $filee->getClientOriginalName();
            $filee->get('public/images',$fileName);
            $image = $fileName;
        }

        try{
            $contactinfo = new contactinfo;
            $contactinfo->typeContactInfo = $request->input('typeContactInfo');
            $contactinfo->textContactInfo = $request->input('textContactInfo');
            $contactinfo->imgFilepath = $image;
            $contactinfo->created_by = $request->user()->name; 
            $contactinfo->updated_by = $request->user()->name; 
            $contactinfo->save();

        } catch(Exception $errors) {
            return redirect('/admin/contactinfo')->with('failed','Failed insert data.');
        }
        return redirect('/admin/contactinfo')->with('success','Success insert data.');
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
        $contactinfo = contactinfo::find($id);
        $title = "Contact Info";
        return view('contactsinfo.show')
                    ->with('contactinfo', $contactinfo)
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
        $contactinfo = contactinfo::find($id);
        $title = "Contact Info";
        return view('contactsinfo.edit')
                    ->with('contactinfo', $contactinfo)
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
            'typeContactInfo' => 'required',
            'textContactInfo' => 'required',
        ]);

        try{
            $contactinfo = contactinfo::find($id);
            if($request->hasFile('imgFilepath')){
                $request->validate([
                    'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                  ]);
                
                $filee = $request->file('imgFilepath');
                $fileName = $filee->getClientOriginalName();
                $filee->move('public/images',$fileName);
                $image = $fileName;

                $contactinfo->imgFilepath = $image;
            }

            $contactinfo->typeContactInfo = $request->input('typeContactInfo');
            $contactinfo->textContactInfo = $request->input('textContactInfo');
            $contactinfo->updated_by = $request->user()->name; 
            $contactinfo->save();

        } catch(Exception $errors) {
            return redirect('/admin/contactinfo')->with('failed','Failed update data.');
        }
        return redirect('/admin/contactinfo')->with('success','Success update data.');
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

            $contactinfo = contactinfo::find($id);
            $contactinfo->delete();

        } catch(Exception $errors) {
            return redirect('/admin/contactinfo')->with('failed','Failed delete data.');
        }
        return redirect('/admin/contactinfo')->with('success','Success delete data.');
    }
}
