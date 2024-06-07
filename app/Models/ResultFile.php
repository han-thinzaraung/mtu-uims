<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultFile extends Model
{
    use HasFactory;
    protected $fillable = ['result_id', 'file_path', 'file_name'];

    public function result()
    {
        return $this->belongsTo(Result::class);
    }
}
