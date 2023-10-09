<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'user_type',
        'location',       
        'department',    
        'work_time',     
        'requirements',  
        'is_pending',    
        'published_at'   
    ];
    

    protected $casts = [
        'is_pending' => 'boolean',
        'published_at' => 'datetime'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
