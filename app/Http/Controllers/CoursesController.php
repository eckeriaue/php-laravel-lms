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
}
