<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostel_id',
        'roomtype_id',
        'name',
        'checkin',
        'checkout',
        'totalperson',
        'totalroom',
        'email',
        'phone',
        'message',
    ];

    public static function createOrUpdate($request)
    {
        $book = new Book();
        $book->hostel_id = $request->hostel_id;
        $book->roomtype_id = $request->roomtype_id;
        $book->name = $request->name;
        $book->checkin = $request->checkin;
        $book->checkout = $request->checkout;
        $book->totalperson = $request->totalperson;
        $book->totalroom = $request->totalroom;
        $book->email = $request->email;
        $book->phone = $request->phone;
        $book->message = $request->message;
        $book->save();

        $hostelroom = Hostelsroom::where('hostel_id', $request->hostel_id)
            ->where('roomtype_id', $request->roomtype_id)
            ->first();
        $hostelroom->totalroom = $hostelroom->totalroom - $request->totalroom;
        $hostelroom->bookroom = $request->totalroom;
        $hostelroom->save();
    }

    public function hostel()
    {
        return $this->belongsTo(Hostels::class);
    }
}
