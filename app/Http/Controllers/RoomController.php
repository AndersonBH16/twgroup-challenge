<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = [''];
        return view('salas.index');
    }

    public function getAll(){
        $rooms = Room::all();
        return response()->json($rooms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $room = Room::create([
            'number' => Room::max('number') + 1,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'capacity' => $request->input('capacity'),
            'state' => 'disponible',
        ]);
        return response()->json($room, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return response()->json($room);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validator = Validator::make($request->all(), [
//            'number' => 'integer|unique:rooms,numero,' . $room->id,
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'integer|min:1',
            'state' => 'in:disponible,ocupado,reservado,mantenimiento',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $room->update($request->all());
        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json(null, 204);
    }
}
