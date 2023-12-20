<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\CourseCategory;
use Illuminate\Http\Request;


class CoursesController extends Controller
{
    public function __invoke()
    {
        return view("learn", [
            "courses" => Course::all(),
            "categories" => CourseCategory::all(),
        ]);
    }

    public function find(int $id) {
        $course = Course::find($id);
        return view('learn-page', [
            'id'=> $id,
            "course" => $course
        ]);
    }
}
