<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\EventCategory;

class EventsController extends Controller
{
    public function index()
    {

        $event_categorys = EventCategory::all();
        $events = Event::orderBy('id', 'DESC')->get();
        return view('events.list', ['events' => $events, 'event_categorys' => $event_categorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event_category = EventCategory::all();
        return view('events.formCreate', compact('event_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Event::create( $request->all() );

        return redirect()->route('events.index')->with(
            [
                'msg'    => 'Evento adicionado com sucesso',
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
        $event = Event::find($id);

        $event_category_id = EventCategory::find($event->event_category_id);

        return view('events.detalhes', ['event' => $event, 'event_category_id' => $event_category_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $event_category = EventCategory::all();
        return view('events.formEdit', ['event' => $event, 'event_category' => $event_category]);
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
        $event = Event::findOrFail($id);
        $event->fill( $request->all() );
        $event->save();
        return redirect()->route('events.index')->with(
            [
                'msg'    => 'Evento editado com sucesso',
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
/*        $new = News::find($id);
        $new->delete();
        return redirect()->route('news.index')->with(
            [
                'msg'    => 'Notícia deletada com sucesso',
                'status' => 'success'
            ]
        );*/
    }
}
