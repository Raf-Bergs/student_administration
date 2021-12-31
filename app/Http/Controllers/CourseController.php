<?php

namespace App\Http\Controllers;

use App\Course;
use App\Programme;
use Json;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $programme_id = $request->input('programme_id') ?? '%';
        $course_title = '%' . $request->input('course') . '%';

        $courses = Course::with('Programme')
            ->where([
                ['name','like',$course_title],
                ['programme_id','like',$programme_id]
            ])
            ->orWhere([
                ['description','like',$course_title],
                ['programme_id','like',$programme_id]
            ])
            ->get();  //get courses


        $programmes = Programme::orderBy('name')
            ->orderBy('name')
            ->get()
            ->transform(function ($item,$key){
                //set first letter uppercase
                $item->name = strtoupper($item->name);
                return $item;
            });
        $result = compact('courses','programmes');


        Json::dump($result);  //student_administration.test/course?json
        return view('courses.home',$result); // add $result as parameter
    }


    public function show($id)
    {
        $courses = Course::with("programme")->with('student_course')->with('student_course.student')->findOrFail($id);

        $students = $courses->student_course = $courses->student_course[0];
        $students = collect($students)
            ->transform(function ($item,$key){
            unset($item['id'],$item['student_course'],$item['id']);
            return $item;
        });

        $result = compact('courses','students');
        Json::dump($result);
        return view('courses.show',$result); // sends id to the view
    }
}
