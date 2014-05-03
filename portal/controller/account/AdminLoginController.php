<?php
class AdminLoginController extends ViewController {

	protected function control() {

		$this->render( array(
			'view' => 'account/login.php'
		));
	}

	protected function checkLogin() {
		return false;
	}
}
?>