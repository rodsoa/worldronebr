<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;


class NewsController extends Controller
{
    public function index()
    {

/*        $news = News::all();
        return view('news.list',['news' => $news]);*/

        $news = News::orderBy('id', 'DESC')->get();
        return view('news.list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.formCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        News::create( $request->all() );
        return redirect()->route('news.index')->with(
            [
                'msg'    => 'Notícia adicionada com sucesso',
                'status' => 'success'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::find($id);
        return view('news.detalhes', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::find($id);
        return view('news.formEdit', compact('new'));
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
        $new = News::findOrFail($id);
        $new->fill( $request->all() );
        $new->save();
        return redirect()->route('news.index')->with(
            [
                'msg'    => 'notícia editada com sucesso',
                'status' => 'success'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);
        $new->delete();
        return redirect()->route('news.index')->with(
            [
                'msg'    => 'Notícia deletada com sucesso',
                'status' => 'success'
            ]
        );
    }
}
