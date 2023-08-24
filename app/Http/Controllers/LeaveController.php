<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function listLeaves(Request $request){
        $employe_id= $request->header('id');
        return Leave::where('employee_id', $employe_id)->get();
    }

    public function createLeaves(Request $request){

        $employe_id= $request->header('id');
        $subject= $request->input('subject');
        $message= $request->input('message');
        $reason= $request->input('reason');
        $start_date= $request->input('start_date');
        $end_date= $request->input('end_date');

       return Leave::where('employee_id', $employe_id)->create([
            'subject'=>$subject,
            'message'=>$message,
            'reason'=>$reason,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'employee_id'=>$employe_id
        ]);

    }

    public function TotalAppication(Request $request){
        $employe_id= $request->header('id');
        return Leave::where('employee_id', $employe_id)->count();
    }
    public function pendingAppication(Request $request){
        $employe_id= $request->header('id');
        return Leave::where('employee_id', $employe_id)
        ->where('status', 'pending')
        ->count();
    }
}
