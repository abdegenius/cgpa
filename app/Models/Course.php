<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function course_reg() {
        return $this->hasMany(CourseReg::class);
    }
    public function result() {
        return $this->hasMany(Result::class);
    }
}
