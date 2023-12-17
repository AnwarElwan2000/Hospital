<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Add_Doctor()
    {
        if(Auth::id()){

        if(Auth::User()->user_type == 1)

          {

            return view('Admin.add_doctor');

        }else{

            return redirect()->back();
          }

        }else{

          return redirect('login');

        }
       
    }

    public function upload_doctor(Request $request)
    { 
        $Doctor = new Doctor();
       
        if($request->hasfile('doctor_img'))
        {

          $img = $request->file('doctor_img');
          $image_name = time() . '.' . $img->getClientOriginalExtension();
          $request->file('doctor_img')->move('Doctor_Image',$image_name);
          $Doctor->Image = $image_name;

        }

        $Doctor->name = $request->name;
        $Doctor->Phone = $request->phone;
        $Doctor->Speciality	 = $request->speciality;
        $Doctor->Room = $request->room;

        $Doctor->save();
        return redirect()->back()->with('message','The doctor has been added successfully');

    }

    public function show_appointment()
    {
      if(Auth::id())
      {
        if(Auth::User()->user_type == 1)
        {
           $appointment = Appointment::all();
           return view('Admin.show_appointment',compact('appointment'));
        }
        else{

          return redirect()->back();
        }

      }
      else{

        return redirect('login');

      }
       
    }

    public function approved($id)
    {
       $approved = Appointment::find($id);
       $approved->status = 'Approved';
       $approved->save();
       return redirect()->back()->with('message','Your reservation has been approved successfully');
    }

    public function canceled($id)
    {
       $canceled = Appointment::find($id);
       $canceled->status = 'Canceled';
       $canceled->save();
       return redirect()->back()->with('message','Your reservation has been cancelled');
    }

    public function show_doctors()
    {
      if(Auth::id())
      {
        if(Auth::User()->user_type == 1)
        {
          $doctors = Doctor::all(); 
          return view('Admin.show_doctors',compact('doctors'));
        }
        else{

          return redirect()->back();

        }

      }
      else{

        return redirect('login');

      }
        
    }

    public function delete_doctor($id)
    {
        $delete_doctor = Doctor::find($id);
        $delete_doctor->delete();
        return redirect()->back()->with('message','The doctor has been successfully deleted');
    }

    public function update_doctor($id)
    {
         $doctors = Doctor::find($id);
         return view('Admin.update_doctors',compact('doctors'));
      
    }

    public function edit_doctor(Request $request , $id)
    {
      $edit_doctor = Doctor::find($id);
      $edit_doctor->name = $request->name;
      $edit_doctor->Phone = $request->phone;
      $edit_doctor->Speciality = $request->speciality;
      $edit_doctor->Room = $request->room;

      if($request->hasfile('doctor_img'))
      {
        $img = $request->file('doctor_img');
        $image_name = time() . '.' . $img->getClientOriginalExtension();
        $request->file('doctor_img')->move('Doctor_Image',$image_name);
        $edit_doctor->Image = $image_name;
      }

      $edit_doctor->save();
      return redirect()->back()->with('message','The doctor`s information has been successfully modified');
    }

    public function email_view($id)
    {
      $appointment = Appointment::find($id);
      return view('Admin.email_view',compact('appointment'));
    
    }

    public function SendEmail(Request $request , $id)
    {
      $appointment = Appointment::find($id);
    
      $details = [
       "greeting" => $request->greeting,
        "body" => $request->body,
        "action_text" => $request->action_text,
        "action_url" => $request->action_url,
        "end_part" => $request->end_part
      ];
      
      Notification::send($appointment , new SendEmailNotification($details));
      return redirect()->back()->with('message','Email Send Is Successfuly');
      
    }
}
