<?php

namespace App\Http\Controllers\Employee;

use App\DataTables\EmployeeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Services\Employee\EmployeeServices;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    protected $redirectTo = '/employee/task';

    protected $redirectAfterLogout = '/login';

      public function showLoginForm()
    {
        return view('pages.employee.auth.login');
    }
    protected function guard()
    {
        return Auth::guard("employee");
    }
    protected function logout()
    {
        Auth::logout();
       return \redirect()->route('login');
    }

}
