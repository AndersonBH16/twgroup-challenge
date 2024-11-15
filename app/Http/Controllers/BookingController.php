<?php

namespace App\Http\Controllers;

use App\DataTables\BookingsDataTable;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderBy('id', 'desc')->get();
        return view('reservas.index', compact('rooms'));
    }

    public function showAll(BookingsDataTable $dataTable){
        return $dataTable->render('reservas.show');
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
            'fecha' => 'required|date_format:d - m - Y',
            'hora' => 'required|date_format:g:i A',
            'room_id' => 'required|exists:rooms,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $fecha = Carbon::createFromFormat('d - m - Y', $request->fecha)->format('Y-m-d');
        $horaInicio = Carbon::createFromFormat('g:i A', $request->hora)->format('H:i:s');
        $horaFin = Carbon::createFromFormat('H:i:s', $horaInicio)->addHour()->format('H:i:s');

        $exists = Booking::where('date', $fecha)
            ->where('room_id', $request->room_id)
            ->where(function ($query) use ($horaInicio, $horaFin) {
                $query->whereBetween('time', [$horaInicio, $horaFin])
                ->orWhereBetween(DB::raw("DATE_ADD(time, INTERVAL 1 HOUR)"), [$horaInicio, $horaFin]);
            })
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'Ya existe una reserva para esa sala en el mismo horario'], 409);
        }

        $booking = Booking::create([
            'date' => $fecha,
            'time' => $horaInicio,
            'state' => 'pendiente',
            'user_id' => $request->user()->id,
            'room_id' => $request->room_id,
        ]);

        return response()->json([
            'booking' => $booking,
            'room_id' => $request->room_id,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return response()->json($booking->load(['user', 'room']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'fecha' => 'date',
            'hora' => 'date_format:H:i',
            'estado' => 'in:pendiente,confirmado,cancelado',
            'user_id' => 'exists:users,id',
            'room_id' => 'exists:rooms,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $booking->update($request->all());
        return response()->json($booking);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json(null, 204);
    }
}
