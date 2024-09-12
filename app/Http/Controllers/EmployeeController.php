<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Fetching employee's list, searching
     */
    public function getEmployeeList(Request $request)
    {
        $employee_data = User::join('tbl_designation','tbl_designation.id','=','employee_users.fk_designation')
                               ->join('tbl_department','tbl_department.id','=','employee_users.fk_department')
                               ->select('employee_users.name as employee_name','tbl_designation.name as designation_name','tbl_department.name as department_name');
        
        if ($request->has('search')) {
            $search = $request->input('search');
            $employee_data->where(function ($query) use ($search) {
                $query->where('employee_users.name', 'LIKE', "%{$search}%")
                    ->orWhere('tbl_designation.name', 'LIKE', "%{$search}%")
                    ->orWhere('tbl_department.name', 'LIKE', "%{$search}%");
            });
        }
        $employee_data = $employee_data->get();                       
        return response()->json($employee_data);
    }
}
