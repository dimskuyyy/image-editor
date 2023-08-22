<?php
// constant URL
define('BASEURL', 'http://localhost/image_editor/'); //akhiri dengan slash contoh : http://localhost/image_editor/ 
define('docroot', $_SERVER['DOCUMENT_ROOT'] . "/image_editor/"); //$_SERVER['DOCUMENT_ROOT'] sama dengan lokasi file htdocs seperti "C:/xammpp/htdocs" oleh karena itu disambung dengan tempal lokasi dari image editor dengan menambahkan / (slash) sebelum mulai menentukan direktori dari image editor, contoh punya saya, di dalam htdocs saya meletakkan image_editor dan saya cukup menambahkan "/image_editor/", harus diakhiri dengan / (slash) kembali.

// Database constant decl :
define('DB_HOST', 'localhost'); //host
define('DB_USER', 'root'); //database username
define('DB_PASS', ''); //database password default XAMPP = ''
define('DB_NAME', 'image_editor'); //name of database

?>
<script>
	const baseurl = "http://localhost/image_editor/"; // Ini sama dengan BASEURL di PHP hanya saja ini di javascript, anda cukup mengganti yang ada di dalam string, dan akhiri dengan slash & sesuaikan direktorinya
</script>