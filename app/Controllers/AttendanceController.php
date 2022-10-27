<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AttendanceModel;
use CodeIgniter\API\ResponseTrait;
use Zxing\QrReader;
use CodeIgniter\I18n\Time;

class AttendanceController extends BaseController
{
    use ResponseTrait;
    
    public function index()
    {
        $data = array();
        if($_GET['phone']){
            $userModel = new UserModel();
            $data['user_profile'] = $userModel->userProfileByPhone($_GET['phone']);
            $attendance_data = new AttendanceModel();
            $today = $attendance_data->getTodayAttendance();
            
            if($today){
            if(in_array($data['user_profile'][0]->id,$today)){
                $data['attendace_mark'] = 1;
            }else{
                $data['attendace_mark'] = 0;
            }
        }else{
            $data['attendace_mark'] = 0;
        }
        }else{
            $data['user_profile'] = null;
        }
        //print_r($data);
       return view('attendance_landing',$data);
    }

    public function addAttendance()
    {
        $data = array();
        $session = session();
        $now = Time::now('Asia/Kolkata');
        if($_GET['id']){
            $attendance_data = new AttendanceModel();
            $data1 = array(
                "user_id" => $_GET['id'],
                "admin_id" => 1,
                "status" => 1,  
                "attendance_on" => $now->toDateTimeString()
            );
            $result = $attendance_data->insert($data1);
        }
        return $this->respond('successful');
    }

    public function removeAttendance()
    {
        $data = array();
        $session = session();
        $now = Time::now('Asia/Kolkata');
        if($_GET['id']){
            $attendance_data = new AttendanceModel();
           
            $result = $attendance_data->where('attendance_on',$now->toDateString())->where('user_id', $_GET['id'])->delete();
        }
        return $this->respond($now);
    }

    public function listing()
    {
        $data = array();
        $session = session();
        $now = Time::now('Asia/Kolkata');
        $attendance_data = new AttendanceModel();
        $today = $attendance_data->getTodayAttendance();
        if($today){
            $userModel = new UserModel();
            $user_list = $userModel->getTodayUsers($today);
            $data['users'] = $user_list;
        }
       
            return view('attandance_listing',$data);
        print_r($today);
    }

    public function qrCode()
    {
        //$qrcode = new QrReader('images/Example-QR-code.png');
    }
    
}