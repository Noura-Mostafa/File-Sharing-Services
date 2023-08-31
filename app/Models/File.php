<?php

namespace App\Models;

use App\Models\Downloaded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
       'filepath' , 'title' , 'message' , 'unique_link'
    ];

    public function downloads()
    {
        return $this->hasMany(Downloaded::class);
    }
}
