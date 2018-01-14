<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Students;
use App\Models\Course;
use App\Models\StudentAddresses;

class ExportController extends Controller
{
    public function __construct()
    {

    }

    public function welcome()
    {
        return view('hello');
    }

    /**
     * View all students found in the database
     */
    public function viewStudents()
    {
        $students = Students::with('course')->get();
        return view('view_students', compact(['students']));
    }

    public function export(Request $request)
    {
        if($request->has('studentId')){
            foreach($request->input('studentId') as $key=>$value){
                $this->findStudents($value);
            }
        }
        die;
    }

    /**
     * Exports all student data to a CSV file
     */
    private function exportStudentsToCSV(studentId=0)
    {
        
    }

    private function findStudents(studentId=0)
    {
        if($studentId > 0){
            return Students::with('course')
                            ->with('address')
                            ->where('id', $studentId)
                            ->first();
        }else{
            return Students::with('course')
                            ->with('address')
                            ->get();
        }
        
    }

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */
    private function exporttCourseAttendenceToCSV()
    {
        //
    }
}
