<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimetableImage extends Model
{
    use HasFactory;
    protected $fillable = ['timetable_id', 'file_path'];

    public function timetable()
    {
        return $this->belongsTo(Timetable::class);
    }
}
