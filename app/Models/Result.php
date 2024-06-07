<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id', 'year_id', 'file'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    public function resultFiles()
    {
        return $this->hasMany(ResultFile::class);
    }
}
