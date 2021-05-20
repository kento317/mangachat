<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Room;

class RoomController extends Controller
{
    public function index(){

        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    public function create(){
        return view('rooms.create');
    }

    public function show(Room $room){
        return view('rooms.show', compact('room'));
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
}
