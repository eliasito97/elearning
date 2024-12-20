<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            $reviews = new Review;
            $reviews->student_id = $request->student_id;
            $reviews->rating = '5';
            $reviews->course_id = $request->course_id;
            $reviews->comment = $request->comment;


            if ($reviews->save())
                return redirect()->back()->withInput()->with('success', 'Data Saved');
            else
                return redirect()->back()->withInput()->with('error', 'Please try again');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Watchlist $watchlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Watchlist $watchlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            // Validación de los datos recibidos
            $validated = $request->validate([
                'student_id' => 'required|integer',
                'course_id' => 'required|integer',
                'lesson_id' => 'required|integer',
                'material_id' => 'required|integer',
                'is_checked' => 'required|boolean',
            ]);

            // Buscar el registro en la tabla Watchlist
            $watchlist = Watchlist::where('student_id', $validated['student_id'])
                ->where('course_id', $validated['course_id'])
                ->where('lesson_id', $validated['lesson_id'])
                ->where('material_id', $validated['material_id'])
                ->first();

            // Si existe, actualiza
            if ($watchlist) {
                $watchlist->is_checked = $validated['is_checked'];
                $watchlist->save();
            } else {
                // Si no existe, crea uno nuevo
                Watchlist::create([
                    'student_id' => $validated['student_id'],
                    'course_id' => $validated['course_id'],
                    'lesson_id' => $validated['lesson_id'],
                    'material_id' => $validated['material_id'],
                    'is_checked' => $validated['is_checked'],
                ]);
            }

            // Respuesta exitosa
            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // En caso de error, captura y muestra el mensaje
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Watchlist $watchlist)
    {
        //
    }
}
