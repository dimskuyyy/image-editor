<?php
class Page extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL);
    }
    public function filter()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        } else {
            $data['guest'] = '';
        }
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('page/filter');
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
    public function masking()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        } else {
            $data['guest'] = '';
        }
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('page/masking');
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
    public function others()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        } else {
            $data['guest'] = '';
        }
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('page/others');
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
    public function painting()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        } else {
            $data['guest'] = '';
        }
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('page/painting');
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
    public function text()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        } else {
            $data['guest'] = '';
        }
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('page/text');
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
    public function transform()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        } else {
            $data['guest'] = '';
        }
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('page/transform');
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
    public function tutorial()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            $data['vip'] = $this->model('UserModel')->getDataUser();
        } else {
            $data['guest'] = '';
        }
        $this->view('template/header');
        $this->view('template/navigation', $data);
        $this->view('page/tutorial');
        $this->view('template/rightnav', $data);
        $this->view('template/footer');
    }
}
