<?php 
class Route {
	// Controller yang akan digunakan default 'user'
	private $controller = 'Home';
	// methos yang akan dipanggil default 'index'
	private $method = 'index'; 
	// parameter yang akan digunakan
	private $params = [];

	/**
	 * Jalankan controller dan method yang diinginkan
	 * @return none
	 */
	public function __construct() {
		$url = $this->parseUrl();

		$url[0] = ucfirst($url[0]);
		// Cek apakah controller ada
		if(file_exists('app/controllers/'.$url[0].'.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}

		// Instansiasi object
		require_once 'app/controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;

		// Tentukan method yang akan dipakai
		if(isset($url[1])) {
			$method = $this->sanitizeMethodName($url[1]);
			if(method_exists($this->controller, $method)) {
				$this->method = $method;
				unset($url[1]);
			}
		}

		// Kelola parameter
		if(!empty($url)) {
			$this->params = array_values($url);
		}
		
		// Panggil controller dan method
		call_user_func_array([$this->controller, $this->method], $this->params);
	}
	
	/**
	 * Olah url yang dikirim user
	 * @return array dari url atau array kosong
	 */
	private function parseUrl() {
		if(isset($_GET['url'])) {
			$url = $_GET['url'];
			// Hilangkan karakter / pada akhir url
			$url = rtrim($url, '/');
			// Filter url
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// Pisahkan url ke dalam array
			$url = explode('/', $url);
			// Kembalikan array
			return $url;
		}
	}

	/**
	 * Olah nama method yang menggunakan karakter '-'
	 * @param method yang akan di olah
	 * @return nama method yg telah di olah
	 */
	private function sanitizeMethodName($method) {
		$method = explode('-', $method);
		for($i = 1; $i < count($method); $i++) {
			$method[$i] = ucfirst($method[$i]);
		}
		return implode($method);
	}
}

 ?>