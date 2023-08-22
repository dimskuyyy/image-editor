<?php
class Home extends Controller
{
    public function index()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        }else{
            $data['guest'] = '';
        }
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('home/index', $data);
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
}
