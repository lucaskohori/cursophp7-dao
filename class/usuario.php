<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	//GET e SET idusuario
	public function getIdusuario(){
		return $this->idusuario;
	}
	
	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	//GET e SET deslogin
	public function getDeslogin(){
		return $this->deslogin;
	}
	
	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	//GET e SET dessenha
	public function getDessenha(){
		return $this->dessenha;
	}
	
	public function setDessenha($value){
		$this->dessenha = $value;
	}

	//GET e SET dtcadastro
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	
	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(

			":ID"=>$id

		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}

	}

	//MÉTODO PARA LISTAR OS DADOS DO BANCO NA TELA
	public function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%"
		
		));

	}

	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN and dessenha = :PASSWORD", array(

			":LOGIN"=>$login,
			":PASSWORD"=>$password

		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		} else {

			throw new Exception("Login e/ou senha invalidos");
			
		}

	}

	public function setData($data) {

			$this->setIdusuario($data['idusuario']);
			$this->setDeslogin($data['deslogin']);
			$this->setDessenha($data['dessenha']);
			$this->setDtcadastro(new Datetime($data['dtcadastro']));

	}

	//MÉTODO PARA INSERIR DADOS NO BANCO
	public function insert (){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha()
		));

		if(count($results) > 0) {

			$this->setData($results[0]);
		
		}

	}

	//MÉTODO DE UPDATE NO BANCO DE DADOS
	public function update($login, $password) {

		$this->setDeslogin($login);
		$this->setDessenha($password);

		$sql = new Sql();

		$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(

			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha(),
			':ID'=>$this->getIdusuario()

		));

	}

	//MÉTODO DE EXCLUSÃO DE DADOS
	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
			':ID'=>$this->getIdusuario()
		));

		$this->setIdusuario(0);
		$this->setDeslogin("");
		$this->setDessenha("");
		$this->setDtcadastro(new DateTime());

	}

	public function __construct($login = "", $password = ""){

		$this->setDeslogin($login);
		$this->setDessenha($password);

	}

	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}

}

?>