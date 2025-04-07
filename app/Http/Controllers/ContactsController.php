<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = contact::all();
        $title = "Contact Us";
        return view('contacts.index')
                    ->with('contacts', $contacts)
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
        $title = "Contact Us";
        return view('contacts.create')->with('title',$title);
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
            'titleContactUs' => 'required',
            'textContactUs' => 'required',
        ]);

        try{

            $contact = new contact;
            $contact->titleContactUs = $request->input('titleContactUs');
            $contact->textContactUs = $request->input('textContactUs');
            $contact->created_by = $request->user()->name; 
            $contact->updated_by = $request->user()->name; 
            $contact->save();

        } catch(Exception $errors) {
            return redirect('/admin/contact')->with('failed','Failed insert data.');
        }
        return redirect('/admin/contact')->with('success','Success insert data.');
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
        $contact = contact::find($id);
        $title = "Contact Us";
        return view('contacts.show')
                    ->with('contact', $contact)
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
        $contact = contact::find($id);
        $title = "Contact Us";
        return view('contacts.edit')
                    ->with('contact', $contact)
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
            'titleContactUs' => 'required',
            'textContactUs' => 'required',
        ]);

        try{

            $contact = contact::find($id);
            $contact->titleContactUs = $request->input('titleContactUs');
            $contact->textContactUs = $request->input('textContactUs');
            $contact->updated_by = $request->user()->name; 
            $contact->save();

        } catch(Exception $errors) {
            return redirect('/admin/contact')->with('failed','Failed update data.');
        }
        return redirect('/admin/contact')->with('success','Success update data.');
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

            $contact = contact::find($id);
            $contact->delete();

        } catch(Exception $errors) {
            return redirect('/admin/contact')->with('failed','Failed delete data.');
        }
        return redirect('/admin/contact')->with('success','Success delete data.');
    }
}
