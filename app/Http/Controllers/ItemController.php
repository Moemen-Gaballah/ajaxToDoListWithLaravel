<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('list',compact('items'));
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
        $item = new Item();
        $item->name = $request->text;
        $item->save();

        return 'Done';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item = Item::find($request->id);
        $item->name = $request->value;
        $item->save();
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $item = Item::where('id', $request->id)->delete();
        return $request->all();
    }

    public function search(Request $request, Item $item)
    {
//        $item = Item::find($request->id);
//        $item->name = $request->value;
//        $item->save();
        $term = $request->term;
        $items = Item::where('item', 'LIKE','%'.$term.'%')->get();
//        return $item;

        if (count($items) == 0) {
            $searchResult[] = 'no item found';
        }else{
            foreach ($items as $key => $value){
                $searchResult[] = $value->item;
            }
        }

        return $searchResult;
//        return $availableTags = [
//        "ActionScript",
//        "AppleScript",
//        "Asp",
//        "BASIC",
//        "C",
//        "C++",
//        "Clojure",
//        "COBOL",
//        "ColdFusion",
//        "Erlang",
//        "Fortran",
//        "Groovy",
//        "Haskell",
//        "Java",
//        "JavaScript",
//        "Lisp",
//        "Perl",
//        "PHP",
//        "Python",
//        "Ruby",
//        "Scala",
//        "Scheme"
//    ];
//        return $request->all();
    }
}
