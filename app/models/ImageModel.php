<?php
class ImageModel extends Model
{
    public function fileUpload($method)
    {
        if (isset($method['uploadfile'])) {
            $filename = $method['filename'];
            $base64code = $method['base64'];
            $keterangan = $method['keterangan'];
            // new name
            $newfilename = str_replace(' ', '-', $filename);
            $newfilename = uniqid() . "-" . time() . "-" . $newfilename . ".png";

            // uploading & put file content
            $this->movefile($base64code, $newfilename);

            // insert data
            $query = "INSERT INTO file_upload VALUES 
            ( :id, '', :namafile, :keterangan )";
            $this->db->query($query);
            $this->db->bind(':id', $_SESSION['UID']);
            $this->db->bind(':namafile', $newfilename);
            if (!empty($keterangan)) {
                $this->db->bind(':keterangan', $keterangan);
            } else {
                $this->db->bind(':keterangan', 'Tidak ada keterangan dari User');
            }
            return $this->db->getAffectedRow();
        }
    }

    public function movefile($base64, $filename)
    {
        // base64code 
        $base64code = $base64; // $_POST['base64']; //data in base64 'data:image/png....';
        // remove the "data:image/png;base64,"
        $base_to_php = explode(',', $base64code);
        // di array ke 2 (1) terdapat konten dari gambarnya
        $data = base64_decode($base_to_php[1]);
        // tentukan filepath... pakai document_root untuk sementara
        $filepath = docroot . "assets/upload/" . $filename; // or image.jpg

        // Save the image in a defined path
        file_put_contents($filepath, $data);
    }

    public function getAllImage()
    {
        if (isset($_SESSION['login'])) {
            $query = "SELECT * FROM file_upload WHERE id = :id";
            $this->db->query($query);
            $this->db->bind(':id', $_SESSION['UID']);
            return $this->db->getResultSet();
        }
    }

    public function deleteImage($id)
    {
        if (isset($_SESSION['login'])) {
            if (!is_null($id)) {
                $file = "SELECT file_name FROM file_upload WHERE file_id = :fileid";
                $this->db->query($file);
                $this->db->bind(':fileid', $id);
                $fn = $this->db->getResult();
                if (file_exists('assets/upload/' . $fn['file_name'])) {
                    unlink('assets/upload/' . $fn['file_name']);
                    $query = "DELETE FROM file_upload WHERE file_id = :fileid";
                    $this->db->query($query);
                    $this->db->bind(':fileid', $id);
                    return $this->db->getAffectedRow();
                } else {
                    echo '<script> 
                        alert("File tidak dapat dihaputs");
                        document.location.href = "' . BASEURL . 'gallery"
                    </script>';
                    return false;
                }
            }
        }
    }

    public function Preview($id)
    {
        $query = "SELECT * FROM file_upload WHERE file_id = :fileid";
        $this->db->query($query);
        $this->db->bind(':fileid', $id);
        return $this->db->getResultSet();
    }
}
