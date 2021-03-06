<?php

namespace App\Controllers;
use App\Models\User;
use App\validation\Validator;

class UserController extends Controller{

    public function login(){

        return $this->view('auth.login');

    }
    public function loginPost(){ 


            $validator = new Validator($_POST);

            $errors = $validator->validate([

                'username' => ['required',  'min:3'],
                'password' => ['required']
            ]);

            if ($errors) {

                $_SESSION['errors'][] = $errors;

                header('Location:  /login');
                exit;
            }

        $user = (new User($this->getDB()))->getByUsername($_POST['username']);

      
            if (password_verify($_POST['pass'], $user->pass)) {
              
               
                $_SESSION['auth'] =  (int) $user->admin;

                return header('location: /admin/posts?success=true');

            } else {
                return header('location: /login');
            }
    }


            public function logout()
            {

                session_destroy();

                return header('location: /');
            }

}