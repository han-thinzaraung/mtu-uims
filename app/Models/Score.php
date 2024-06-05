<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'year_id',
        'gender',
        'highest_score',
        'lowest_score',
    ];
    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
