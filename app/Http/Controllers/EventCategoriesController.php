<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EventCategory;
use App\Http\Requests\StoreEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;

class EventCategoriesController extends Controller
{
    public function index() {
        $categories = EventCategory::orderBy('id', 'DESC')->get();
        return view('event_categories.index', compact('categories'));
    }

    public function create() {
        return view('event_categories.create');
    }

    public function store(StoreEventCategoryRequest $request) {
        EventCategory::create( $request->all() );
        return redirect()->route('event-categories.index')->with(
            [
                'msg'    => 'Categoria de evento adicionada com sucesso',
                'status' => 'success'
            ]
        );
    }

    public function edit($category) {
        $category = EventCategory::find($category);
        return view('event_categories.edit', compact('category'));
    }

    public function update(UpdateEventCategoryRequest $request, $category) {
        $category = EventCategory::findOrFail($category);
        $category->fill( $request->all() );
        $category->save();
        return redirect()->route('event-categories.index')->with(
            [
                'msg'    => 'Categoria de evento editada com sucesso',
                'status' => 'success'
            ]
        );
    }

    public function destroy($category) {
        $category = EventCategory::find($category);
        $category->delete();
        return redirect()->route('event-categories.index')->with(
            [
                'msg'    => 'Categoria de evento deletada com sucesso',
                'status' => 'success'
            ]
        );
    }
}
