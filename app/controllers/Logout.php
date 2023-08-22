<?php
class Logout extends Controller
{
    public function index()
    {
        $this->model('UserModel')->logout();
        header('Location: ' . BASEURL . 'login');
    }
}
