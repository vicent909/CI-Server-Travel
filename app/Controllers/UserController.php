<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\UserProfileModel;
use Config\Services;
use PSpell\Config;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    public function create()
    {
        // get json
        $json = $this->request->getJSON(true);
        $userModel = new UserModel();

        if ($json) {
            // check is email used
            if ($userModel->where('email', $json['email'])->first()) {
                return $this->respond(['message' => 'Email is taken!'], 400);
            };

            // check password
            if (strlen($json['password']) < 5) {
                return $this->respond(['message' => 'Password must more than 5!'], 400);
            };

            // hash password
            $json['password'] = password_hash($json['password'], PASSWORD_BCRYPT);

            // insert data
            if ($this->model->insert($json)) {
                return $this->respond(['message' => 'Data inserted successfully!'], 201);
            } else {
                // Send failure response
                return $this->respond(['message' => 'Failed to insert data'], 500);
            }
        } else {
            // Invalid JSON data
            return $this->respond(['message' => 'Invalid JSON format'], 500);
        }
    }

    public function login()
    {
        // get json
        $json = $this->request->getJSON(true);
        $userModel = new UserModel();

        if ($json) {
            // check email and password
            if (!$json['email'] || !$json['password']) {
                return $this->respond(['message' => 'Email and password is required!'], 400);
            };

            // get user
            $user = $userModel->where('email', $json['email'])->first();

            // check user is valid
            if (!$user) {
                return $this->respond(['message' => 'User not found'], 404);
            };

            // check password
            if (!password_verify($json['password'], $user['password'])) {
                return $this->respond(['message' => 'Invalid password'], 400);
            };

            $access_token = createJWT([
                'email' => $user['email'],
                'role' => $user['role']
            ]);

            return $this->respond(['access_token' => $access_token], 200);
        } else {
            // Invalid JSON data
            return $this->respond(['message' => 'Invalid JSON format'], 500);
        }
    }

    public function addUserProfile()
    {
        $json = $this->request->getJSON(true);
        $userModel = new UserModel();
        $profile_model = new UserProfileModel();
        $validation = \Config\Services::validation();

        $req_data = $this->request->user_data ?? null;

        if ($json) {
            //validate 
            $rules = [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ];

            $validation->setRules($rules);

            if (!$validation->run((array)$json)) {
                return $this->fail($validation->getErrors(), 400);
            }

            // get user
            $user = $userModel->where('email', $req_data['email'])->first();
            
            if (!$user) {
                return $this->respond(['message' => 'User not found'], 404);
            }
            
            //validate is profile already exists
            $is_exists = $profile_model->where('user_id', $user['id']);
            
            if($is_exists){
                return $this->respond(['message' => 'user profile already exists'], 400);
            }

            //set user id
            $json['user_id'] = $user['id'];

            $user_profile = $profile_model->insert($json);

            if (!$user_profile) {
                return $this->respond(['message' => 'failed insert user profile'], 404);
            }

            return $this->respond(['message' => 'success add profile'], 201);
        } else {
            return $this->respond(['message' => 'Invalid JSON format'], 500);
        }
    }

    public function getUserProfile()
    {
        $json = $this->request->getJSON(true);
        $userModel = new UserModel();
        $profile_model = new UserProfileModel();

        $req_data = $this->request->user_data ?? null;

        if ($json) {
            // get user
            $user = $userModel->where('email', $req_data['email'])->first();
            
            if (!$user) {
                return $this->respond(['message' => 'User not found'], 404);
            }

            // get profile
            $profile = $profile_model->where('user_id', $user['id'])->first();

            if(!$profile){
                return $this->respond(['message' => 'Profile not found'], 404);
            }

            return $this->respond(['data' => $profile], 200);
        } else {
            return $this->respond(['message' => 'Invalid JSON format'], 500);
        }
    }

    public function editUserProfile()
    {
        $json = $this->request->getJSON(true);
        $userModel = new UserModel();
        $validation = \Config\Services::validation();
        $profile_model = new UserProfileModel();

        $req_data = $this->request->user_data ?? null;

        if ($json) {
            //valdiate 
            $rules = [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ];

            $validation->setRules($rules);

            if (!$validation->run((array)$json)) {
                return $this->fail($validation->getErrors(), 400);
            }

            // get user
            $user = $userModel->where('email', $req_data['email'])->first();
            
            if (!$user) {
                return $this->respond(['message' => 'User not found'], 404);
            }

            // get profile
            $profile = $profile_model->update($user['id'], $json);

            if(!$profile){
                return $this->respond(['message' => 'Failde update profile'], 404);
            }

            return $this->respond(['data' => 'Profile updated'], 200);
        } else {
            return $this->respond(['message' => 'Invalid JSON format'], 500);
        }
    }
}
