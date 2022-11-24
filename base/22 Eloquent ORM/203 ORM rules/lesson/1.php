<?php 

// php artisan make:model Course

class Course extends Model
{
    protected $table = 'Course';
}

/*--------*/

use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        $dd = Course::all();
        
        dd($dd);
    }
}
