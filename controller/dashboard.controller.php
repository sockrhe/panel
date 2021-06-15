<?php

require_once 'model/usuarios.php';

class DashboardController
{
	private $model;

	public function __construct()
	{
		$this->model = new Usuario();
	}

	public function Index()
	{
		require_once 'view/header.php';
		require_once 'view/dashboard/home.php';
		require_once 'view/footer.php';
	}

    public function CambiarPassword()
    {
        require_once 'view/header.php';
		require_once 'view/dashboard/cambiar-password.php';
		require_once 'view/footer.php';
    }

	public function CambiarPasswordU()
	{
		$nueva_pass = $_REQUEST['nueva_pass'];
		$con_pass = $_REQUEST['con_pass'];
		if ($nueva_pass == $con_pass) {
			$nueva_pass = md5($_REQUEST['nueva_pass']);
			$us_id = $_SESSION['id_user'];
			$this->model->ChangePassword($nueva_pass, $us_id);
			$msg = 1;
		} else {
			$msg = 2;
		}
		echo $msg;
	}

    public function CerrarSesion()
	{
		$this->model->logout();
		header('Location: signin.php');
	}



}

?>