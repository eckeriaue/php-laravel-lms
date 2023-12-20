<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = "courses";

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, "category_id", "id");
    }

    public function getContent()
    {
        return [];
    }
}
