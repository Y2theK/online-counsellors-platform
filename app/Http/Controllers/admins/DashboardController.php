<?php


namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $questionCount = Question::count();
        $userCount = User::where('is_admin', 0)->count();
        $adminCount = User::where('is_admin', 1)->count();
        $appointmentCount = Appointment::count();
        return view('admin.dashboard', compact('questionCount', 'userCount', 'adminCount', 'appointmentCount'));
       
    }
}
