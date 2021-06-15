<?php 
class Usuario
{
	private $pdo;

	public $us_id;
	public $us_nombre;
	public $us_apellidos;
	public $us_nickname;
	public $us_password;
	public $us_fecha_registro;
	public $us_estado;

	public function __construct()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM usuarios");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
    
    public function Obtener($an_id)
	{
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE us_id = ? ");
            $stm->bindParam(1, $an_id, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ChangePassword($new_pass, $us_id)
	{
		try {
			$result = array();
			$stm = $this->pdo->prepare("UPDATE usuarios SET us_password = ? WHERE us_id = ?");
            $stm->bindParam(1, $new_pass, PDO::PARAM_STR);
            $stm->bindParam(2, $us_id, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	public function logout()
	{
		try {
			session_destroy();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}




}

?>