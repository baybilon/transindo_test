<?php

namespace App\Http\Controllers;

use App\Trash;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index(){
        $trash = Trash::orderBy('created_at', 'DESC')->get();
        return view('trash.index', compact('trash'));
    }

    public function create(){
        return view('trash.create');
    }

    public function save(Request $request){
       $data = $request->validate([
        'type' => 'required',
        'price' => 'required|numeric'
       ]);

       $new_trash = Trash::create($data);

    // dd($request);

       return redirect(route('trash.index'));
    }

    public function delete(string $id)
    {
        $trash = Trash::findOrFail($id);
  
        $trash->delete();
  
        return redirect()->route('trash.index')->with('success', 'item deleted successfully');
    }


    public function edit(string $id)
    {
        $trash = Trash::findOrFail($id);
  
        return view('trash.edit', compact('trash'));
    }

    public function update(Request $request, string $id)
    {
        $trash = Trash::findOrFail($id);
  
        $trash->update($request->all());
  
        return redirect()->route('trash.index')->with('success', 'item updated successfully');
    }
  
}
