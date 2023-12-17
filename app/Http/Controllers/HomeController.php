<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    {

     if(Auth::id())
     {
        $user_type = Auth::User()->user_type;

        if($user_type == '1')
        {
           return view('Admin.home');
        }
        else{

         $doctor = Doctor::all();
         return view('Users.home',compact('doctor'));

        }
     }else{

        return redirect()->back();

     }
     
    }

    public function index()
    {
      if(Auth::id()){

         return redirect('home');

      }
      else{

         $doctor = Doctor::all();
         return view('Users.home',compact('doctor'));

      }
    }

    public function appointment(Request $request)
    {
       $appointment = new Appointment();
       $appointment->name = $request->name;
       $appointment->email = $request->email;
       $appointment->phone = $request->phone;
       $appointment->doctor = $request->doctor;
       $appointment->date = $request->date;
       $appointment->message = $request->message;
       $appointment->status = 'In Progress';

       if(Auth::id())
       {
          $appointment->user_id = Auth::User()->id;
       }
       
       $appointment->save();
       return redirect()->back()->with('message','The appointment has been booked successfully');
       
    }

    public function my_appointment()
    {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 0)

         {

         $user_id = Auth::User()->id;
         $appointment = Appointment::where('user_id',$user_id)->get();
         return view('Users.my_appointment',compact('appointment'));

         }else{

            return redirect()->back();

         }
      }
      else{

         return redirect('login');
         
      }

    }

    public function cancel_appointment($id)
    {
      $appointment = Appointment::find($id);
      $appointment->delete();
      return redirect()->back()->with('message','Your reservation has been successfully deleted');
    }
}
