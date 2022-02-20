<?php

namespace App\Http\Controllers\users;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('user_id', auth()->id())->get();
        return view('users.index', [
            'appointments' => $appointments
        ]);
    }
}
