<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class UserModel extends Model {
    protected $table = 'user_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email','password','status','user_role','contactno','gender','dob','state','city','pincode','club'];
    protected $returnType = 'array';
    function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    function userProfile($id)
    {
        //$this->where('id', $id);
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
    function getTodayUsers($ids)
    {
        $this->where('id', 4);
        $result = $this->get()->getResult();
        if(count($result)>0){
            return $result;
        } else {
            return false;
        }

    }
}