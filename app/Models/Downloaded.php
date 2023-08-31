<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Downloaded extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';
    
    protected $fillable = [
        'file_id' , 'ip' , 'user_agent' , 'time' , 'download_count' , 'country_name'
        ,'country_code' , 'created_at'
     ];

    public function getUpdatedAtColumn()
    {
        
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
