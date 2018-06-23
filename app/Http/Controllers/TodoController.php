<?php


namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Todos;

class TodoController extends Controller{

    public function create(Request $request){
        $validated_data = $request->validate([
            'content' => 'required|max:255',
            'user_id' => 'required',
        ]);
        $user_id = $request->input('user_id');
        $todo = new Todos;
        $todo->user_id = $user_id;
        $todo->content = $request->input('content');
        $todo->save();
        return redirect("todo_index\\$user_id");
    }

    public function index(Request $request, $user_id){
        $todosFromDB = Todos::where("user_id", "=" , $user_id)
                    ->orderBy('created_at','desc')
                    ->get();
        return view('todos', [
            'user_id'=>$user_id,
            'todosFromDB' => $todosFromDB
        ]);
    }

    public function update(Request $request){
        $validated_data = $request->validate([
            'content' => 'required|max:255',
            'user_id' => 'required',
            'item_id' => 'required',
        ]);
        $user_id = $request->input('user_id');
        $todo = Todos::where("id", "=", $request->item_id)
                    ->update(['content' => "$request->content"]);
        return redirect("todo_index\\$user_id");
    }

    public function delete(Request $request){
        $validated_data = $request->validate([
            'item_id' => 'required',
        ]);
        $user_id = $request->input('user_id');
        $todo = Todos::where("id", "=", $request->item_id)
                    ->delete();
        return redirect("todo_index\\$user_id");
    }
 
}


?>