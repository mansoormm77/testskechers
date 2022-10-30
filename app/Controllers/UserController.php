<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use App\Models\ClubModel;

class UserController extends BaseController
{

    
    public function index()
    {
        $userModel = new UserModel();
        
        $data['coaches'] = $userModel->getAllUser();
       // print_r($data['coaches']);
        return view('user_listing',$data);
    }

    public function addView()
    {
        $data = array();
        $club_model = new ClubModel();
        $data['clubs'] = $club_model->getAllClubs();
        return view('user_create',$data);
    }

    public function editView()
    {
        $data = array();
        $club_model = new ClubModel();
        $data['clubs'] = $club_model->getAllClubs();
        
        $uri = service('uri');
        $user_id =  $uri->getSegment(3);
        $userModel = new UserModel();
        $data['user_info'] = $userModel->userProfile($user_id);
       //print_r($data);
        return view('user_edit',$data);
    }
    public function store()
    {
        $session = session();
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user_details.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'usertype'      => 'required',
            'phone'      => 'required|is_unique[user_details.phone]|regex_match[/^[6-9]\d{9}$/]',
            'gender'      => 'required',
            'dob'      => 'required',
            'state'      => 'required',
            'city'      => 'required',
            'pincode'      => 'required',
            'club'      => 'required',
        ];
          $data=array();
        if($this->validate($rules)){
            $userModel = new UserModel();
            $now = Time::now('UTC');
            //return view('coach_create');
            $data1 = array(
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
                "status" => 1,
                "user_role" => $_POST['usertype'],
                "contactno" => $_POST['phone'],
                "gender" => $_POST['gender'],
                "dob" => $_POST['dob'],
                "state" =>(int) $_POST['state'],
                "city" => (int)$_POST['city'],
                "pincode" => (int)$_POST['pincode'],
                "club" => (int)$_POST['club'],
                "added_on" => $now->toDateTimeString()
            );
            $result = $userModel->insert($data1);
            $session->setFlashdata('success',"Successfull");
        }else{
            $session->setFlashdata('error',$this->validator->getErrors());
        }
       
       return redirect()->to('/user/create/');
    }
    
    public function update()
    {
        $session = session();
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email',
            'usertype'      => 'required',
            'phone'      => 'required|regex_match[/^[6-9]\d{9}$/]',
            'gender'      => 'required',
            'dob'      => 'required',
            'state'      => 'required',
            'city'      => 'required',
            'pincode'      => 'required',
            'club'      => 'required',
        ];
          $data=array();
        if($this->validate($rules)){
            $userModel = new UserModel();
            $now = Time::now('UTC');
            //return view('coach_create');
            $data1 = array(
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "status" => 1,
                "user_role" => $_POST['usertype'],
                "contactno" => $_POST['phone'],
                "gender" => $_POST['gender'],
                "dob" => $_POST['dob'],
                "state" =>(int) $_POST['state'],
                "city" => (int)$_POST['city'],
                "pincode" => (int)$_POST['pincode'],
                "club" => (int)$_POST['club'],
            );
            print_r($data1);
            $result = $userModel->update($_POST['id'],$data1);
            
            if($_POST['password'] != ''){
                $data2 = array(
                    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
                );
                $result = $userModel->update($_POST['id'],$data2);

            }
            $session->setFlashdata('success',"Successfull");
        }else{
            $session->setFlashdata('error',$this->validator->getErrors());
        }
       
       return redirect()->to('/user/edit/'.$_POST['id']);
    }
}