<?php
class UserModel extends Model
{
    // Signup Section
    public function signup($method)
    {
        if (isset($method['signup'])) {
            $username = $method['username'];
            $pass = $method['password'];
            $repass = $method['repassword'];
            $data = $this->usernameCheck($username);
            /* var_dump($data['username']);
            die; */
            if ($data > 0) {
                echo '<script>
                        alert("Username sudah terpakai... mohon pakai yang lain aja... UwU");
                        document.location.href = "' . BASEURL . 'join/signup";
                    </script>';
                return false;
            } else if ($pass != $repass) {
                echo '<script>
                        alert("Password sama Repeat Passwordnya ga sama.. Yang teliti ya... Harus samaUwU");
                        document.location.href = "' . BASEURL . 'join/signup";
                    </script>';
                return false;
            } else {
                $username = stripslashes($username);
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $query = "INSERT INTO user VALUES 
                    (
                        '', :username, :pass
                    )";
                $this->db->query($query);
                $this->db->bind(':username', $username);
                $this->db->bind(':pass', $pass);
                return $this->db->getAffectedRow();
            }
        }
    }

    // Login Section
    public function login($method)
    {
        if (isset($method['login'])) {
            $username = $method['username'];
            $pass = $method['password'];
            // user Validation
            $check['user'] = $this->usernameCheck($username);
            if ($check['user'] > 0) {
                $row = $this->fetchdata($username);
                foreach ($row as $data) {
                    if (password_verify($pass, $data['password'])) {
                        // check remember
                        $_SESSION['login'] = true;
                        $_SESSION['UID'] = $data['id'];
                        $_SESSION['UN'] = $data['username'];
                        // var_dump($_SESSION);
                        // die;
                        if (isset($method['remember'])) {
                            // set cookie
                            setcookie('OL', hash('sha256', 'true'), time() + (24 * 60 * 60), "/");
                            setcookie('UN', hash('sha256', $data['username']), time() + (24 * 60 * 60), "/");
                            setcookie('UID', $data['id'], time() + (24 * 60 * 60), "/");
                        }
                        // set session
                        header('Location: ' . BASEURL . '/home');
                    } else {
                        // var_dump(password_verify($pass, $data['password']));
                        // die;
                        echo '<script>
                        alert("Password sama Username ga sinkron... hayo.. ingat ingat lagi... UwU");
                        document.location.href = "' . BASEURL . 'join/login";
                    </script>';
                    }
                }
            }
        }
    }

    // get user data
    public function getDataUser()
    {
        if (isset($_SESSION['login'])) {
            $data = $this->checkAvatar();
            if ($data > 0) {
                $query = "SELECT user.*, avatar_user.* FROM user JOIN avatar_user ON user.id = avatar_user.id WHERE user.id = :id";
            } else {
                $query = "SELECT * FROM user WHERE id = :id";
            }
            $this->db->query($query);
            $this->db->bind(':id', $_SESSION['UID']);
            return $this->db->getResultSet();
        } else {
            return false;
        }
    }

    public function updateProfil($method, $method2)
    {
        $username = $method['username'];
        $avatar = $method2['avatar'];

        $filename = $avatar['name'];
        if (!empty($filename)) {
            $image_name = explode(".", $filename);
            $ext = end($image_name);
            $tmp = $avatar['tmp_name'];
            $loc = docroot . "assets/avatar/";
            $new_file_name = uniqid() . "-avatar-user-" . $_SESSION['UID'] . "." . $ext;
            $newPath = $loc . $new_file_name;
            move_uploaded_file($tmp, $newPath);
        }
        $query_check = "SELECT * FROM user WHERE username = :username AND id = :id";
        $this->db->query($query_check);
        $this->db->bind(':username', $username);
        $this->db->bind(':id', $_SESSION['UID']);
        $row = $this->db->rowCount();

        if ($row > 0) {
            echo '<script>
                alert("Username sudah dipake... cari yang lain aja.. kan masih banyak -_-");
                document.location.href = "' . BASEURL . 'account";
            </script>';
            return false;
        } else {

            $query1 = "UPDATE user SET username = :username WHERE id = :id";
            $this->db->query($query1);
            $this->db->bind(':username', $username);
            $this->db->bind(':id', $_SESSION['UID']);
            if (empty($filename)) {
                return $this->db->getAffectedRow();
            } elseif (!empty($filename)) {
                $this->db->execute();

                $c = $this->checkAvatar();
                if ($c > 0) {
                    if (file_exists('assets/avatar/' . $c['file_avatar'])) {
                        unlink('assets/avatar/' . $c['file_avatar']);
                    }
                    $query2 = "UPDATE avatar_user SET file_avatar = :avatar WHERE id = :id";
                    $this->db->query($query2);
                    $this->db->bind(':avatar', $new_file_name);
                    $this->db->bind(':id', $_SESSION['UID']);
                    return $this->db->getAffectedRow();
                } else {
                    $query2 = 'INSERT INTO avatar_user VALUES 
                ( :id, :avatar ) ';
                    $this->db->query($query2);
                    $this->db->bind(':id', $_SESSION['UID']);
                    $this->db->bind(':avatar', $new_file_name);
                    return $this->db->getAffectedRow();
                }
            }
        }
    }








    // Function
    // check
    public function usernameCheck($username)
    {
        $query = "SELECT username FROM user WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        return $this->db->getResult();
    }

    // fetch data user
    public function fetchdata($username)
    {
        $query = "SELECT * FROM user WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        return $this->db->getResultSet();
    }

    // Stateful check
    public function statefullCheck()
    {
        if (isset($_COOKIE['UID']) && isset($_COOKIE['OL']) && isset($_COOKIE['UN'])) {
            $id = $_COOKIE['UID'];
            $username = $_COOKIE['UN'];
            $query = "SELECT * FROM user WHERE id = :id";
            $this->db->query($query);
            $this->db->bind(':id', $id);
            $result = $this->db->getResultSet();

            foreach ($result as $row) {
                if ($username === hash('sha256', $row['username'])) {
                    $_SESSION['login'] = 'true';
                    $_SESSION['UID'] = $row['id'];
                    $_SESSION['UN'] = $row['username'];
                }
            }
        }
    }

    // Logout
    public function logout()
    {
        if (isset($_COOKIE['UID']) || isset($_COOKIE['OL'])) {
            setcookie('UID', "", time() - 3600, "/");
            setcookie('OL', "", time() - 3600, "/");
        }
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();
    }

    // check avatar 
    public function checkAvatar()
    {
        $query = "SELECT file_avatar FROM avatar_user WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $_SESSION['UID']);
        return $this->db->getResult();
    }
}
