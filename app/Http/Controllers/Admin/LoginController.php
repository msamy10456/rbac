<?php

namespace App\Http\Controllers\Admin;

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


    protected $redirectTo = '/admin/dashboard';

    protected $redirectAfterLogout = '/admin/login';

      public function showLoginForm()
    {
        return view('pages.admin.auth.login');
    }
    protected function guard()
    {
        return Auth::guard("admin");
    }
    protected function logout()
    {
        Auth::logout();
       return \redirect()->route('admin.login');
    }

}
