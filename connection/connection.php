<?php
	class Connection {
		private $conn = null;
		private $user = 'root';
		private $pass = '';

		public function __construct() {
			try
			{
				$this->conn = new PDO('mysql:host=localhost;dbname=mydb', $this->user, $this->pass,array(PDO::ATTR_PERSISTENT => true));
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		
		public function __destruct() {
			$this->conn = null;
		}
		
		public function beginTransaction() {
			$this->conn->beginTransaction();
		}
		
		public function commit() {
			$this->conn->commit();
		}
		
		public function rollBack() {
			$this->conn->rollBack();
		}


		/*User*/
		public function login($user, $pass) {
			$sql='SELECT * FROM userdb WHERE Username=:user AND UserPwd=:pass';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':user',$user);
			$stmt->bindParam(':pass',$pass);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if ($rowCount==1) return $stmt->fetchAll()[0];
			else return null;
		}
		
		public function isExistUser($username) {
			$sql='SELECT * FROM userdb WHERE Username=:username';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':username',$username);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if ($rowCount==1) return $stmt->fetchColumn();
			else return 0;
		}

		public function updateUser($id, $username, $password) {
			$sql='UPDATE userdb SET Username=:username WHERE UserID=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':username',$username);
			$stmt->execute();
			$this->updateUserPassword($id, $password);
		}

		public function updateUserPassword($id, $password) {
			if ($password==sha1('')) return;
			$sql='UPDATE userdb SET UserPwd=:password WHERE UserID=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':password',$password);
			$stmt->execute();
		}

		public function selectUser()
		{
			$sql='SELECT * FROM userdb';
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}


		/*Kategori*/
		public function isExistKategoriGambar($nama) {
			$sql='SELECT * FROM category WHERE CategoryName=:nama';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':nama',$nama);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if ($rowCount==1) return $stmt->fetchColumn();
			else return 0;
		}
		
		public function insertKategoriGambar($nama) {
			$sql='INSERT INTO category(CategoryName) VALUES(:nama)';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':nama',$nama);
			$stmt->execute();
		}
		
		public function updateKategoriGambar($id, $nama) {
			$sql='UPDATE category SET CategoryName=:nama WHERE CategoryId=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':nama',$nama);
			$stmt->execute();
		}
		
		public function updateKategoriGambarCount($id, $count) {
			$sql='UPDATE category SET CategoryCount=:count WHERE CategoryId=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':count',$count);
			$stmt->execute();
		}
		
		public function deleteKategorigambar($id) {
			$sql='DELETE FROM category WHERE CategoryId=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();
		}
		
		public function selectKategoriGambar()
		{
			$sql='SELECT * FROM category';
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
		public function selectKategoriGambarById($id)
		{
			$sql='SELECT * FROM category WHERE CategoryId=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if ($rowCount==1) return $stmt->fetchAll()[0];
		}


		/*Gallery*/
		public function selectGambarAutoIncrement() {
			$databaseName='mydb';
			$tableName='imgtable';
			$sql='SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = :databaseName AND   TABLE_NAME   = :tableName;';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':databaseName',$databaseName);
			$stmt->bindParam(':tableName',$tableName);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if ($rowCount==1) return $stmt->fetchColumn();
			else return 0;
		}
		
		public function insertGambar($judul, $isi, $idKategoriGambar, $directory) {
			$sql='INSERT INTO imgtable(ImgCaption, ImgInfo, CategoryId, ImgDir) VALUES(:judul, :isi, :idKategoriGambar, :directory)';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':judul',$judul);
			$stmt->bindParam(':isi',$isi);
			$stmt->bindParam(':idKategoriGambar',$idKategoriGambar);
			$stmt->bindParam(':directory',$directory);
			$stmt->execute();
		}
		
		public function updateGambar($id, $judul, $isi, $idKategoriGambar, $directory) {
			$sql='UPDATE imgtable SET ImgCaption=:judul, ImgInfo=:isi, CategoryId=:idKategorigambar, ImgDir=:directory WHERE ImgId=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':judul',$judul);
			$stmt->bindParam(':isi',$isi);
			$stmt->bindParam(':idKategoriGambar',$idKategoriGambar);
			$stmt->bindParam(':directory',$directory);
			$stmt->execute();
		}

		public function updateGambarData($id, $judul, $isi, $idKategoriGambar, $directory) {
			$sql='UPDATE imgtable SET ImgCaption=:judul, ImgInfo=:isi, CategoryId=:idKategorigambar, ImgDir=:directory WHERE ImgId=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':judul',$judul);
			$stmt->bindParam(':isi',$isi);
			$stmt->bindParam(':idKategoriGambar',$idKategoriGambar);
			$stmt->bindParam(':directory',$directory);
			$stmt->execute();
		}
		
		public function updateGambarClick($id, $click) {
			$sql='UPDATE imgtable SET ImgClick=:click WHERE ImgId=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':click',$click);
			$stmt->execute();
		}

		public function deleteGambar($id) {
			$this->deleteImageBeritaByIdBerita($id);
			$sql='DELETE FROM imgtable WHERE ImgId=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();
		}
		
		public function selectGambar()
		{
			$sql='SELECT * FROM imgtable';
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
		public function selectGambarById($id)
		{
			$sql='SELECT * FROM imgtable WHERE ImgId=:id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if ($rowCount==1) return $stmt->fetchAll()[0];
		}


		public function setKategoriGambar($nama)  {
			$id=$this->isExistKategoriGambar($nama);
			if ($id==0){
				$this->insertKategoriGambar($nama) ;
				$id=$this->isExistKategoriGambar($nama);
			} else {
				$this->updateKategoriGambar($id, $nama);
			}
			return $id;
		}


		public function selectUserByAll()
		{
			$sql='SELECT * FROM userdb';
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
		public function selectUserByIdUser($idUser)
		{
			$sql='SELECT * FROM User WHERE UserID=:idUser';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':idUser',$idUser);
			$stmt->execute();
			return $stmt->fetchAll()[0];
		}

		public function selectGambarByAll()
		{
			$sql='SELECT * FROM imgtable LEFT JOIN category ON imgtable.idKategoriGambar=category.CategoryId';
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
		public function selectGambarByIdGambar($idGambar)
		{
			$sql='SELECT * FROM imgtable LEFT JOIN category ON imgtable.idKategoriGambar=category.CategoryId WHERE ImgId=:idGambar';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':idGambar',$idGambar);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if ($rowCount==1) return $stmt->fetchAll()[0];
		}

		public function selectGambarByIdKategoriGambar($idKategoriGambar)
		{
			$sql='SELECT * FROM imgtable LEFT JOIN category ON imgtable.idKategoriGambar=category.CategoryId WHERE imgtable.ImgId=:idKategoriGambar';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':idKategoriGambar',$idKategoriGambar);
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}

?>