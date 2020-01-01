<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index() {
        
    }
    public function show() { 
        
    }
    public function store() {
        
        Lesson::create(request()->validate([
            'title' => request('title'),
            'desc' => request('desc'),
            'lesson_file' => request('lesson_file'),
        ]));
    }

}
