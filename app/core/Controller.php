<?php

class Controller {

	/**
	 * @param view = view yang akan ditampilkan
	 * @param data = array data yang akan di kirim ke view
	 */
	public function view($view, $data = []) {
		require_once 'app/views/'.$view.'.php';
	}

	/**
	 * Panggil model
	 * @param model yang akan dipanggil
	 * @return objek model yang dipanggil
	 */
	public function model($model) {
        require_once 'app/models/'. $model. '.php';
		return new $model;
	}
}
