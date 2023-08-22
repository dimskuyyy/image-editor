<?php
class Upload extends Controller
{
    public function data()
    {

        $this->model('UserModel')->statefullCheck();
        if ($this->model('ImageModel')->fileUpload($_POST)) {
            echo '<script>
                alert("Berhasil nyaann~");
                document.location.href= "' . BASEURL . 'gallery";
            </script>';
        } else {
            echo '<script>
                alert("Kyaaa~ Gagal T_T");
                document.location.href= "' . BASEURL . 'gallery";
            </script>';
        }
    }
}
