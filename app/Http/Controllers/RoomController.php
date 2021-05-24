<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Room;
use App\Chat;

class RoomController extends Controller
{
    public function index(){

        $rooms = Room::paginate(5);

        return view('rooms.index', compact('rooms'));
    }

    public function create(){
        return view('rooms.create');
    }

    public function show($id){

        $room = Room::find($id);

        $chats = Chat::where('room_id', $id)->get();

        return view('rooms.show', compact('room', 'chats'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:20',
        ]);

        $room = new Room;

        $room->title = $request->title;
        $room->user_id = Auth::id();

        $room->save();

        return redirect()->route('rooms.index');
    }

    public function search(Request $request)
{
        $rooms = Room::where('title', 'like', "%{$request->search}%")->paginate(5);

        $search_result = $request->search.'の検索結果'.$rooms->total().'件';

        return view('rooms.index', compact('rooms', 'search_result'));
    }
}
