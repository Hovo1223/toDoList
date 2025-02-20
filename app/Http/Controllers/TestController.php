<?php

namespace App\Http\Controllers;

use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use App\Models\surnames;
class TestController extends Controller
{
    public function create(Request $request ) {
        $create = Tests::all();

        if ($request->isMethod('post')) {
            if ($request->has('name')) {
                $create = Tests::create([
                    'name' => $request->input('name'),
                    'status' => $request->input('status'),
       
                ]);
                if ($create) {
                    return redirect()->route('create'); 
                }
            }

        }   
        $update = Tests::first();

        return view('test', [
            'create' => $create, 
            'update' => $update
        ]);
    }

    public function update(Request $request, $id) {
        $update = Tests::find($id);
        $update->name = $request->input('tasknameUpdate');
        $update->status = $request->input('status');
        $update->save();

        $create = Tests::all();     
        return view('test', [
            'create' => $create,
             'update' => $update
        ]);
    }
    
    public function delete($id)
    {
        $delete = Tests::find($id);
        if ($delete) {
            $delete->delete();
        }
    
        $create = Tests::all();
        $update = Tests::first();
    
        return view('test', [
            'create' => $create, 
            'update' => $update, 
            'delete' => $delete
        ]);
    }
    
}