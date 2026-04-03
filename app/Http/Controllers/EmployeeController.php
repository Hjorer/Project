<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
{
    $employees2 = Employee::select('name', 'salary')->get();
    $employees3 = Employee::where('salary', 500)->get();
    $employees4 = Employee::where('salary', '>', 450)->get();
    $employees5 = Employee::where('salary', '!=', 500)->get();
    $employees6 = Employee::where('salary', 400)
    ->orWhere('id', '>', 4)
    ->get();
    $employees7 = Employee::find(3);
    $employees8 = Employee::where('id', 5)->value('name');
    $employees9 = Employee::pluck('name');
    $employees10 = Employee::whereBetween('salary', [450, 1100])->get();
    $employees11 = Employee::whereNotBetween('salary', [300, 600])->get();
    $employees12 = Employee::whereIn('id', [1, 2, 3, 5])->get();
    $employees13 = Employee::whereNotIn('id', [1, 2, 3])->get();
    $employees14 = Employee::whereBetween('id', [1, 3])
    ->orWhereBetween('salary', [400, 800])
    ->get();
    $employees15 = Employee::where('salary', 500)
    ->orWhere('position', 'программист')
    ->get();
    $employees16 = Employee::where('salary', 500)
    ->where('position', 'программист')
    ->get();
    $employees17 = Employee::orderBy('salary')->get();
    $employees18 = Employee::orderBy('birthday', 'desc')->get();
    $employees19 = Employee::max('salary'); 
    $employees20 = Employee::sum('salary'); 
    $employees21 = Employee::selectRaw('position, MIN(salary) as min_salary')
    ->groupBy('position')
    ->get();
    $employees22 = Employee::selectRaw('position, SUM(salary) as total_salary')
    ->groupBy('position')
    ->get();
    $employees23 = Employee::whereDate('birthday', '1988-03-25')->get();
    $employees24 = Employee::whereDay('birthday', '25')->get();
    $employees25 = Employee::whereMonth('birthday', '3')->get();
    $employees26 = Employee::whereYear('birthday', '1990')->get();
    $employees27 = Employee::whereMonth('birthday', now()->month)
    ->whereDay('birthday', now()->day)
    ->get();

    $employees1 = Employee::all();
    return view('employee.index', ['employees1' =>$employees1,'employees2' =>$employees2,'employees3' =>$employees3,'employees4' =>$employees4,'employees5' =>$employees5,'employees6' =>$employees6,'employees7' =>$employees7,'employees8' =>$employees8,'employees9' =>$employees9,'employees10' =>$employees10,'employees11' =>$employees11,'employees12' =>$employees12,'employees13' =>$employees13,'employees14' =>$employees14,'employees15' =>$employees15,'employees16' =>$employees16,'employees17' =>$employees17,'employees18' =>$employees18,'employees19' =>$employees19,'employees20' =>$employees20,'employees21' =>$employees21,'employees22' =>$employees22,'employees23' =>$employees23,'employees24' =>$employees24,'employees25' =>$employees25,'employees26' =>$employees26,'employees27' =>$employees27]);
}
}
