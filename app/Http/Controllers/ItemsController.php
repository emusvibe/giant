<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $items = Item::orderBy('created_at', 'desc')->paginate(10);          
       return view('shop.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('shop.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'description' => 'required',
            'color' => 'required',
            'print_text' => 'required'
        ]);

        $items = $request->all();
        $items['description'] = json_encode($items['description']);
        $items['color'] = json_encode($items['color']);
        Item::create($items);
        return redirect('/items')->with('success', 'Order Created');
   
  
    
    }

    public function storage(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('shop.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('shop.edit')->with('item', $item); 
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
        $this->validate($request, [
            'description' => 'required',
            'color' => 'required',
            'print_text' => 'required'
        ]);

       $items = Item::find($id);
       $items->description = $request->get('description');
       $items->color = $request->get('color');
       $items->print_text = $request->get('print_text');
       $items['description'] = json_encode($items['description']);
        $items['color'] = json_encode($items['color']);

        $items->save();
        return redirect('/items')->with('success', 'Order updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/items')->with('success', 'Order Deleted');
    }
}
