<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Hostels;
use App\Models\Hostelsroom;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.book.index', [
            'bookings' => Book::latest()->get(),
        ]);
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
        $request->validate([
            'hostel_id' => 'required',
            'roomtype_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'totalperson' => 'required',
            'totalroom' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Book::createOrUpdate($request);

        $recipientEmail = $request->email;
        $subject = 'Booking successful';
        $messageContent = 'Booking successful';
    
        Mail::raw($messageContent, function (Message $mail) use ($recipientEmail, $subject) {
            $mail->to($recipientEmail)
                 ->subject($subject);
        });

        return redirect()->route('home')->with('success', 'Booking successful check your email');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('front.book.show', [
            'hostel' => Hostels::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        if ($request->status == 'approved') {
            $book->status = 'rejected';
            $book->save();

            $hostelroom = Hostelsroom::where('hostel_id', $book->hostel_id)
                ->where('roomtype_id', $book->roomtype_id)
                ->first();
            $hostelroom->totalroom = $hostelroom->totalroom + $book->totalroom;
            $hostelroom->bookroom = $hostelroom->bookroom - $book->totalroom;
            $hostelroom->save();
            
            return redirect()->back()->with('success', 'Booking rejected');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
