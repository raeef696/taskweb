<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tasks;

class TaskController extends Controller
{
    public function index(Request $request){
        $tasks = DB::table('tasks')->get();
        //$tasks = new tasks;
        return view('task',compact('tasks'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addusers(Request $request){
        $validate = $request->validate([
            'name' =>'required|max:10'
        ]);
        DB::table('tasks')->insert([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('done','Done Add Users!');
    }

    public function deleteUsers($id){
        DB::table('tasks')->where('id','=',$id)->delete();
        return redirect()->back()->with('done-delete','Done Delete User!');
    }

    public function Edit($id){

        $task = DB::table('tasks')->where('id',$id)->first();
        return view('add',compact('task'));
    }

    public function Update(Request $request,$id){
        $update =DB::table('tasks')
        ->where('id', $id)
        ->update(['name' => $request->name]);
        return redirect('/')->with('done-update','Done Update User!');
    }
}
