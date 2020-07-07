<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentController extends Controller
{
    public function index()
    {
        // $studentModel = Student::all();
        $studentModel = Student::paginate(5);

        return view('welcome', compact('studentModel'))->withData($studentModel);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $isStudentValid = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];

        $request->validate($isStudentValid);

        $studentModel = new Student;

        $studentModel->first_name = $request->input('firstname');
        $studentModel->last_name = $request->input('lastname');
        $studentModel->email = $request->input('email');
        $studentModel->phone = $request->input('phone');
        // check the form [method]
        $method = $request->method();

        if ($request->isMethod('post')) {
            // Save record(s)
            $studentModel->save();
        }
        // Redirect page after saving record(s)
        return redirect(route('home'))->with('success_message', 'Student record was successfully saved!!!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $studentModel = Student::findOrFail($id);

        return view('edit', compact('studentModel'))->withData($studentModel);

    }

    public function update(Request $request, $id)
    {
        $isStudentValid = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];

        $request->validate($isStudentValid);

        $studentModel = Student::findOrFail($id);

        $studentModel->first_name = $request->input('firstname');
        $studentModel->last_name = $request->input('lastname');
        $studentModel->email = $request->input('email');
        $studentModel->phone = $request->input('phone');
        // check the form [method]
        $method = $request->method();

        if ($request->isMethod('post')) {
            // Save record(s)
            $studentModel->save();
        }
        // Redirect page after saving record(s)
        return redirect(route('home'))->with('success_message', 'Student record was successfully updated!!!');
    }

    public function delete($id)
    {
        $studentModel = Student::findOrFail($id)->delete();
        return redirect(route('home'))->with('success_message', 'Student record was successfully deleted!!!');
    }

    public function destroy($id)
    {
        //
    }
}
