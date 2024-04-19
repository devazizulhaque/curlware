<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostels extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'roomtype_id',
        'totalroom',
    ];

    public static function createOrupdate($request, $id = null)
    {
        $hostel = Hostels::updateorcreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'address' => $request->address,
            ]
        );
        Hostelsroom::where('hostel_id', $id)->delete();
        if ($request->roomtype_id) {
            foreach ($request->roomtype_id as $key => $roomtypeid) {
                Hostelsroom::updateorcreate(
                    ['hostel_id' =>  $hostel->id, 'roomtype_id' => $roomtypeid],
                    ['totalroom' => $request->totalroom[$key]]
                );
            }
        }

    }

    public function roomtypes()
    {
        return $this->belongsToMany(Roomtype::class, 'hostels_rooms', 'hostel_id', 'roomtype_id')->withPivot('totalroom');
    }

    public function hostelrooms()
    {
        return $this->hasMany(Hostelsroom::class, 'hostel_id');
    }
    
}
