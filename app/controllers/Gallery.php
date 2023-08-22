<?php
class Gallery extends Controller
{
    public function index()
    {
        if (isset($_SESSION['login']) && isset($_SESSION['UID'])) {
            $this->model('UserModel')->statefullCheck();
            $data['image'] = $this->model('ImageModel')->getAllImage();
            if (isset($_SESSION['login'])) {
                $data['vip'] = $this->model('UserModel')->getDataUser();
            } else {
                $data['guest'] = '';
            }
            $this->view('template/header');
            $this->view('template/navigation', $data);
            $this->view('gallery/index', $data);
            $this->view('template/rightnav', $data);
            $this->view('template/footer');
        } else {
            echo '<script>
                alert("ANDA BELUM LOGIN...  Silahkan login dulu :3 enak lho kalo dah login XD");
                document.location.href="' . BASEURL . 'join/login";
            </script>';
        }
    }
    public function delete($id)
    {
        if ($this->model('ImageModel')->deleteImage($id)) {
            echo '<script>
                alert("Gambar berhasil dihapus :D ... tapi kenapa dihapus? :( kan bagus T_T");
                document.location.href="' . BASEURL . 'gallery";
            </script>';
        }
    }
    /* public function preview()
    {
        header('Content-Type: application/json');
        $data = $this->model('ImageModel')->Preview($_POST['id']);
        $data = json_encode($data);
        $data = explode('[', $data);
        $data = '[' . $data[1];
        echo $data;
    } */
}
