<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\contactlist;

class ContactsListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contactslist = contactlist::all();
        $title = "Contact List";
        return view('contactslist.index')
                    ->with('contactslist', $contactslist)
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
            'nameContact' => 'required',
            'emailContact' => 'required',
            'textContact' => 'required',
        ]);

        try{

            $contactlist = new contactlist;
            $contactlist->nameContact = $request->input('nameContact');
            $contactlist->emailContact = $request->input('emailContact');
            $contactlist->textContact = $request->input('textContact');
            $contactlist->created_by = 'guest'; 
            $contactlist->updated_by = 'guest'; 
            $contactlist->save();

        } catch(Exception $errors) {
            return redirect('/contact')->with('failed','Failed insert data!');
        }
        return redirect('/contact')->with('success','Has been sent!');
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
        $contactlist = contactlist::find($id);
        $title = "Contact List";
        return view('contactslist.show')
                    ->with('contactlist', $contactlist)
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
