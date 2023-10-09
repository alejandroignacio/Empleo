<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Empleo;
use Illuminate\Http\Request;

class EmpleoController extends Controller
{
    public function index()
    {
        $empleos = Empleo::all();
        return response()->json($empleos);
    }
}
