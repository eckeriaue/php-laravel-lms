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

    public function pages(int $id)
    {
        $course = Course::findOrFail($id);
        return view("course-pages", [
            'course' => $course,
            'category' => $course->category,
        ]);
    }
}
