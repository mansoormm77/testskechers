<?php

namespace App\Models;
use CodeIgniter\I18n\Time;

use CodeIgniter\Model;

class AttendanceModel extends Model {
    protected $table = 'members_attendance';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'admin_id','attendance_on','added_by','status'];
    protected $returnType = 'array';
    function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    function userProfile($id)
    {
        $this->where('id', $id);
        $result = $this->get()->getResult();
        if(count($result)>0){
            return $result;
        } else {
            return false;
        }

    }

    function userProfileByPhone($phone)
    {
        $this->where('contactno', $phone);
        $result = $this->get()->getResult();
        if(count($result)>0){
            return $result;
        } else {
            return false;
        }

    }
    function getTodayAttendance()
    {
        $now = Time::now('UTC');

        $this->where('attendance_on', $now->toDateString());
        $result = $this->get()->getResultArray();
        $arr = array_column($result,"user_id");
        if(count($arr)>0){
            return $arr;
        } else {
            return false;
        }

    }
}