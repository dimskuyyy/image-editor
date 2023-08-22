<?php
class Account extends Controller
{
    public function index()
    {
        $this->model('UserModel')->statefullCheck();
        if (isset($_SESSION['login'])) {
            $data['user'] = $this->model('UserModel')->getDataUser();
            if (isset($_SESSION['login'])) {
                $data['vip'] = $this->model('UserModel')->getDataUser();
            } else {
                $data['guest'] = '';
            }
            $this->view('template/header');
            $this->view('template/navigation', $data);
            $this->view('account/index', $data);
            $this->view('template/rightnav', $data);
            $this->view('template/footer');
        } else {
            echo '<script>
                alert("ANDA BELUM LOGIN... Login dulu gih... :3");
                document.location.href = "' . BASEURL . 'join/login"
            </script>';
        }
    }

    public function edit()
    {
        echo json_encode($this->model('UserModel')->getDataUser());
    }

    public function update()
    {
        if ($this->model('UserModel')->updateProfil($_POST, $_FILES)) {
            echo '<script>
                alert("Berhasil update yeay");
                document.location.href = "' . BASEURL . 'account"
            </script>';
        } else {
            echo '<script>
                alert("Gagal update... yah T_T");
                document.location.href = "' . BASEURL . 'account"
            </script>';
        }
    }
}
