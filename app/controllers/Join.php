<?php
class Join extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'join/login');
    }
    public function login()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL);
        }
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        } else {
            $data['guest'] = '';
        }
        $this->model('UserModel')->login($_POST);
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('join/login');
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
    public function signup()
    {
        if ($this->model('UserModel')->signup($_POST) > 0) {
            echo '<script>
            alert("Signup berhasil, sekarang kamu bisa login... (maap ya, males buat abis signup langsung auto login... sesekali user ribet gamasalah :v) UwU");
            document.location.href = "' . BASEURL . 'join/login";
            </script>';
        }
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL);
        }
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        } else {
            $data['guest'] = '';
        }
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('join/signup');
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
}
