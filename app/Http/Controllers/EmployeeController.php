<?php

namespace App\Http\Controllers;


use App\Helper\JWTToken;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employeeRegistration(Request $request)
    {
         Employee::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'departmant' => $request->input('departmant')
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Request successfull'
            ], 200);
    }

    public function employeeLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $count = Employee::where('email', $email)
            ->where("password", $password)
            ->select('id', 'role')->first();

        $id = $count->id;
        $role = $count->role;

        if ($count !== null) {
            $managerToken = JWTToken::createToken($email, $id, $role);
            return response()->json([
            'status'=>'success',
            'message'=>'Request successfull',
            'id'=>$id,
            'role'=>$role,
            'employeeToken'=>$managerToken

            ], 200)->cookie('employeeToken',$managerToken, 60 * 1);

        }
    }
    public function employeeLogout(){
        return redirect('/login')->cookie('token', "", -1);
    }

    function employeeRegistrationPage()
    {
        return view('pages.auth.employee-registration-page');
    }

    public function totalEmployee(Request $request)
    {

        return Employee::get()->count();
    }
}
