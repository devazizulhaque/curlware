<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostelsroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostel_id',
        'roomtype_id',
        'totalroom',
    ];

    public function hostel()
    {
        return $this->belongsTo(Hostels::class, 'hostel_id');
    }

    public function roomtype()
    {
        return $this->belongsTo(Roomtype::class, 'roomtype_id');
    }
}
