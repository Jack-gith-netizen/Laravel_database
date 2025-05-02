<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                Session::flash('infoMessage', 'Please log in to access the Database.');
                return redirect()->route('login');
            }

            if (time() - Session::get('last_activity', 0) > Session::get('timeout', 3600)) {
                return redirect()->route('logout', ['reason' => 'timeout']);
            }

            Session::put('last_activity', time());
            return $next($request);
        });
    }

    public function index()
    {
        $students = Student::orderBy('primary_key')->get();
        $total = $students->count();

        return view('students.index', [
            'students' => $students,
            'total' => $total,
            'messages' => Session::get('messages', []),
        ]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_number' => ['required', 'regex:/^A0[0-9]{7}$/', 'unique:students,id'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);

        Student::create([
            'id' => $validated['student_number'],
            'firstname' => $validated['first_name'],
            'lastname' => $validated['last_name'],
        ]);

        Session::flash('messages', ["The record for {$validated['student_number']} {$validated['first_name']} {$validated['last_name']} was successfully added."]);

        return redirect()->route('main');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_number' => ['required', 'regex:/^A0[0-9]{7}$/', 'unique:students,id,' . $student->primary_key . ',primary_key'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);

        if (
            $student->id === $validated['student_number'] &&
            $student->firstname === $validated['first_name'] &&
            $student->lastname === $validated['last_name']
        ) {
            Session::flash('messages', ["No changes were made to {$student->id} {$student->firstname} {$student->lastname}, so the record was not updated."]);
            return redirect()->route('main');
        }

        $student->update([
            'id' => $validated['student_number'],
            'firstname' => $validated['first_name'],
            'lastname' => $validated['last_name'],
        ]);

        Session::flash('messages', ["The record {$validated['student_number']} {$validated['first_name']} {$validated['last_name']} was successfully updated."]);

        return redirect()->route('main');
    }

    public function confirmDelete(Student $student)
    {
        return view('students.delete', compact('student'));
    }

    public function destroy(Request $request, Student $student)
    {
        if ($request->input('confirm') === 'no') {
            Session::flash('messages', ["You cancelled the record {$student->id} {$student->firstname} {$student->lastname} deletion."]);
            return redirect()->route('main');
        }

        $student->delete();
        Session::flash('messages', ["Record {$student->id} {$student->firstname} {$student->lastname} was successfully deleted."]);

        return redirect()->route('main');
    }
}