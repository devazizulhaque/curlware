<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public static function createOrUpdate($request, $id = null)
    {
        Roomtype::updateorcreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'status' => 1,
            ]
        );
    }

    public function hostels()
    {
        return $this->belongsToMany(Hostels::class, 'hostels_rooms', 'roomtype_id', 'hostel_id')->withPivot('totalroom');
    }

    public function hostelrooms()
    {
        return $this->hasMany(Hostelsroom::class, 'roomtype_id');
    }
    
}
