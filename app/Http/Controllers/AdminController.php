<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index() {
        
    	return view('admin_login');
    }


    public function show_drashboard() {
         $this->AuthLogin();
   	    return view('admin.dashboard');
    }


     public function dashboard(Request $request){
      	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
    	$result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where ('admin_password',$admin_password)->first();
    	if($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return view('admin.dashboard');
    	}else{
    		Session::put('message','mat khau hoac email khong dung, nhap lai nhe');
    		return Redirect::to('/admin');
    	}
    	
    }

    public function logout(){
		Session::put('admin_name',null);
    		Session::put('admin_id',null);
    		return Redirect::to('/admin');
    	
    }

    //thống kê theo ngày
   public function show_order_day(Request $request){
 
       $day   = str_pad($request->day, 2, '0', STR_PAD_LEFT);
       $month = str_pad($request->month, 2, '0', STR_PAD_LEFT);
       $year  = $request->year;

    if($day && $month && $year)
    {
         $all_order = DB::table('tbl_order')->where(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"),"$day-$month-$year")->get();
        return view('admin.day_order')->with('all_order',$all_order);
        
    }

        return view('admin.day_order');
   }

   public function show_multi_email(){
 
         return view('admin.multi_email');
   }
   public function send_mail(Request $request){
         //send mail
                $to_name = "ngolequanit";
               $email1 = $request->email_account1;
                $email2 = $request->email_account2;
          
                   $to_email= [];
  
                   $to_email[] = $email1;
                   $to_email[] =  $email2;
          
                //$to_email = ['ngolequanit@gmail.com','lequan007@gmail.com'];
             
                $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php
                
                Mail::send('admin.multi_email',$data,function($message) use ($to_name,$to_email){

                    $message->to($to_email)->subject('kiểm tra thử gửi mail google');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail

                });
                 return view('admin.multi_email')->with('name',$to_name);
                //--send mail
    }


}
