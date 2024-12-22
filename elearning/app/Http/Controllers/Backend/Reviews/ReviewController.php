<?php

namespace App\Http\Controllers\Backend\Reviews;

use App\Models\Enrollment;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review=Review::paginate(10);
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.review.index', compact('review', 'enrollment'));
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
        //dd($request->all());

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
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Review::findOrFail(encryptor('decrypt', $id));
//        dd($data);
        if ($data->delete()) {
            $this->notice::error('Data Deleted!');
            return redirect()->back();
        }
    }
}
