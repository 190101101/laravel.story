<?php 
use App\Course;

/*read*/
Course::find(1);
Course::where('id', 1)->first();
Course::where('course_must', 1)->get();

/*create*/
$course = new Course;
$course->course_title = 'course title 01';
$course->course_content = 'course content 02';
$course->course_must = 3;
$course->save();
