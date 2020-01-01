<?php

namespace App\Http\Controllers;
use App\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class authController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

public function download ($id) {
    $tutor = Tutor::where('id', $id)->first();
    $file = $tutor->qualifications;

    return Storage::download("public/qualifications/".$file);
}

}
