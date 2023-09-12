<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    protected $table = 'aplicaciones'; // Definimos el nombre de la tabla si no sigue la convención plural del nombre de la clase

    protected $fillable = [
        'empleo_id', 
        'user_id', 
        'mensaje', 
        'cv_path'
    ]; // Estos son los campos que se pueden llenar de manera masiva.

    public function empleo()
    {
        return $this->belongsTo(Empleo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
