<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class NoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function getNote()
    {
        $notes = DB::table('notes')->get();
        return response()->json(['results' => $notes,'message' => 'success'],200);
    }

    public function addNote(Request $request)
    {
        $insert = DB::table('notes')->insert([
            'title' => $request->input('title'),
            'desc'  => $request->input('desc'),
        ]);

        if($insert){
            return response()->json(['message' => 'Insert Data Success'],200);
        }else{
            return response()->json(['message' => 'Insert Data Failed']);
        }

    }

    public function updateNote($id,Request $request)
    {
        $update = DB::table('notes')
            ->where('id',$id)
            ->update([
            'title' => $request->input('title'),
            'desc'  => $request->input('desc'),
        ]);

        if($update){
            return response()->json(['message' => 'update Data Success'],200);
        }else{
            return response()->json(['message' => 'update Data Failed']);
        }
    }

    public function deleteNote($id)
    {
        $delete = DB::table('notes')
            ->where('id',$id)
            ->delete();

        if($delete){
            return response()->json(['message' => 'delete Data Success'],200);
        }else{
            return response()->json(['message' => 'delete Data Failed']);
        }
    }
}
