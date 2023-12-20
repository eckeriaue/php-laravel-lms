<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function __invoke()
    {
        $courses = Course::all(["id","name","description"]);
        return view("learn", ["courses" => $courses]);
    }

    public function find(int $id) {
        $course = Course::find($id);
        return view('learn-page', [
            'id'=> $id,
            "course" => $course
        ]);
    }
}
