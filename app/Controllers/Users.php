<?php


namespace App\Controllers;

use App\Models\UserModel;
class Users extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function auth()
    {
        
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
    
            $userModel = new UserModel();
            $user = $userModel->verifica('user', $email, md5($password));
            if($user){
                $session = session();
                $session->set('loggedInUser', $user[0]->id);
                return redirect()->to(base_url('/home/'));
            }else{
                return redirect()->to(base_url());
            }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}