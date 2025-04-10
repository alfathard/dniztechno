<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use App\Models\article;
use App\Models\contactinfo;
use App\Models\product;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get article
        $articles = DB::table('articles')
            ->select('idArticle','titleArticle', 'textArticle', 'imgFilepath', 'created_at')
            ->whereNull('deleted_at')
            ->paginate(6);
            // ->get()
            // ->toArray();

        // $articlepage = DB::table('articles')->whereNull('deleted_at')->paginate(6);

        //get contact info
        $contactsinfo = DB::table('contactsinfo')
            ->select('typeContactInfo', 'textContactInfo', 'imgFilepath')
            ->whereNull('deleted_at')
            ->get();

        $idp = DB::table('products')->select('idProduct')->whereNull('deleted_at')->first();
        $idps = $idp->idProduct;

        return view('article')
            ->with(compact('articles'), $articles)
            ->with('idps',$idps)
            // ->with(compact('articlepage'),$articlepage)
            ->with('contactsinfo', $contactsinfo);
            // ->with('colNo', $colNo);
    }

    // Display pagination
    // public function articlepage(){
    //     $articlepage = DB::table('articles')->whereNull('deleted_at')->paginate(9);
    //     return view('article', compact('articlepage'));
    // }

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
        // $articles = DB::table('article')->orderby('idArticle', 'desc')->get();
        // return view('show', ['articles'=>$articles]);
    }

    public function detail($id)
    {
        $article = DB::table('articles')->where('idArticle', $id)->first();
        $createddate = Carbon::parse($article->created_at);
        $dt = $createddate->isoformat('dddd, D MMMM YYYY');

        //get contact info
        $contactsinfo = DB::table('contactsinfo')
            ->select('typeContactInfo', 'textContactInfo', 'imgFilepath')
            ->whereNull('deleted_at')
            ->get();

        $idp = DB::table('products')->select('idProduct')->whereNull('deleted_at')->first();
        $idps = $idp->idProduct;

        return view('articledetail')
            ->with('article', $article)
            ->with('idps',$idps)
            ->with('dt', $dt)
            ->with('contactsinfo', $contactsinfo);
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
