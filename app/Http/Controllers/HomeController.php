<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AppointmentProposalRequest;
use App\Models\Appointment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function home()
    {
        $questions = Question::all();
        return view('home', compact('questions'));
    }
    public function search(Request $request)
    {
        //search by field or profession or hobby
        $users = DB::table('users')
        ->where('is_admin', 0)
        ->where('user_details.field', 'like', '%'.$request->search.'%')
        ->orWhere('user_details.profession', 'like', '%'.$request->search.'%')
        ->orWhere('user_details.hobby', 'like', '%'.$request->search.'%')
        ->join('user_details', 'users.id', '=', 'user_details.user_id')
        ->get();


        if ($users) {
            return view('counsellorsList', compact('users'));
        }
    }
    public function answerQuestions(Request $request)
    {
        //answer question and search by answer
        $users = DB::table('users')
        ->where('is_admin', 0)
        ->where('user_details.field', 'like', '%'.$request->field.'%')
        ->where('user_details.profession', 'like', '%'.$request->profession.'%')
        ->join('user_details', 'users.id', '=', 'user_details.user_id')
        ->get();
        
        if ($users) {
            return view('counsellorsList', compact('users'));
        }
    }
  
    public function appointmentProposal(User $user)
    {
        return view('appointmentProposal', compact('user'));
    }
    public function submitAppointmentProposal(User $user, AppointmentProposalRequest $request)
    {
        $appointment = Appointment::create([
            'user_id' =>  $user->id,
            'name' =>  $request->name,
            'email' => $request->email,
            'field' => $request->field,
            'description' => $request->description,
            'dtOfAppointment' => $request->dtOfAppointment,
            'status' => 'pending'
        ]);
        
        return redirect()->route('appointmentProposal', $user->id)->with('status', 'Appointment Submitted Successfully.');
    }
}
