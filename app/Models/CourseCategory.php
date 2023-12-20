<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "course_categories";


    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, "category_id", "id");
    }

    public function getContent()
    {
        return [];
    }
}
