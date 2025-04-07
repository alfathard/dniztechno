<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = article::all();
        $title = "Article";
        return view('articles.index')
                    ->with('articles', $articles)
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
        $title = "Article";
        return view('articles.create')->with('title',$title);
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
            'titleArticle' => 'required',
            'textArticle' => 'required',
        ]);

        try{
            if($request->hasFile('imgFilepath')){
                $request->validate([
                    'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    'imgFilepath' => 'required'
                ]);

                $filee = $request->file('imgFilepath');
                $fileName = $filee->getClientOriginalName();
                $filee->move('public/images',$fileName);
                $image = $fileName;

                $article = new article;
                $article->imgFilepath = $image;
                $article->titleArticle = $request->input('titleArticle');
                $article->textArticle = $request->input('textArticle');
                $article->created_by = $request->user()->name;
                $article->updated_by = $request->user()->name;
                $article->save();
            }
            else {
                $article = new article;
                $article->titleArticle = $request->input('titleArticle');
                $article->textArticle = $request->input('textArticle');
                $article->created_by = $request->user()->name;
                $article->updated_by = $request->user()->name;
                $article->save();
                // dd('failed');
            }

        } catch(Exception $errors) {
            return redirect('/admin/article')->with('failed','Failed insert data.');
        }
        return redirect('/admin/article')->with('success','Success insert data.');
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
        $article = article::find($id);
        $title = "Article";
        return view('articles.show')
                    ->with('article', $article)
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
        $article = article::find($id);
        $title = "Article";
        return view('articles.edit')
                    ->with('article', $article)
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
            'titleArticle' => 'required',
            'textArticle' => 'required',
        ]);

        try{
            $article = article::find($id);
            if($request->hasFile('imgFilepath')){
                $request->validate([
                    'imgFilepath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                  ]);

                $filee = $request->file('imgFilepath');
                $fileName = $filee->getClientOriginalName();
                $filee->move('public/images',$fileName);
                $image = $fileName;
                $article->imgFilepath = $image;
            }
            $article->titleArticle = $request->input('titleArticle');
            $article->textArticle = $request->input('textArticle');
            $article->updated_by = $request->user()->name;
            $article->save();

        } catch(Exception $errors) {
            return redirect('/admin/article')->with('failed','Failed update data.');
        }
        return redirect('/admin/article')->with('success','Success update data.');
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

            $article = article::find($id);
            $article->delete();

        } catch(Exception $errors) {
            return redirect('/admin/article')->with('failed','Failed delete data.');
        }
        return redirect('/admin/article')->with('success','Success delete data.');
    }
}
