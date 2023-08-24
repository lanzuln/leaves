<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Leave;
use App\Models\Manager;
use App\Helper\JWTToken;
use App\Models\Employee;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function managerRegistration(Request $request)
    {
        return Manager::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
    }

    function Login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $manager = Manager::where('email', '=', $email)
            ->where('password', '=', $password)
            ->select('id', 'role')
            ->first();

        $employee = Employee::where('email', '=', $email)
            ->where('password', '=', $password)
            ->select('id', 'role')
            ->first();

        if ($manager !== null) {
            $Managertoken = JWTToken::createToken($email, $manager->id, $manager->role);
            return response()->json([
                'status' => 'success',
                'message' => 'Manager login successfully',
                'token' => $Managertoken,
                'id' => $manager->id,
                'role' => $manager->role
            ], 200)->cookie('token', $Managertoken, 60 * 24 * 30);
        } elseif ($employee !== null) {
            // Employee login -> JWT Token issue
            $Employeetoken = JWTToken::createToken($email, $employee->id, $employee->role);
            return response()->json([
                'status' => 'success',
                'message' => 'Employee login successfully',
                'token' => $Employeetoken,
                'id' => $employee->id,
                'role' => $employee->role
            ], 200)->cookie('token', $Employeetoken, 60 * 24 * 30);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorize'
            ], 200);
        }
    }
    public function managerLogout()
    {
        return redirect('/login')->cookie('token', "", -1);
    }


    function LoginPage()
    {
        return view('pages.auth.login-page');
    }
    function managerRegistrationPage()
    {
        return view('pages.auth.manager-registration-page');
    }

    public function managerAppicationTotal(Request $request)
    {
        $employe_id = $request->header('id');
        return Leave::get()->count();
    }
    public function managerAppicationpending(Request $request)
    {
        $employe_id = $request->header('id');
        return Leave::where('status', 'pending')
            ->count();
    }


    public function employeeLeavesList(Request $request)
    {
        $employe_id = $request->header('id');
        return Leave::with('employee')->get();
    }
    public function employeeLeavesListById(Request $request)
    {

            $leave_id = $request->input('leave_id');
            return Leave::with('employee')->where('id', $leave_id)->first();

    }
}
