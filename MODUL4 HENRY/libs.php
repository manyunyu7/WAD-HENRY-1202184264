<?php
class database
{

	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "wad_modul4";
	var $connect = "";
	var $time = "";

	var $user_id = "";
	function __construct()
	{
		$this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		if (mysqli_connect_errno()) {
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}

		if (strpos($_SERVER['REQUEST_URI'], "out_") !== false) {
			$this->msgSuccess("Berhasil Logout");
		}

		if (isset($_POST['logout'])) {
			$_SESSION['logged'] = 0;
			session_unset();
			session_destroy();
			$this->movePage("login.php?out_");
		}
	}

	function show_data()
	{
		$id = $_SESSION['user-id'];
		$data = mysqli_query($this->connect, "select * from cart where user_id=$id");

		if (mysqli_num_rows($data) == 0) {
			$hasil = null;
		} else if (mysqli_num_rows($data) > 0) {
			while ($row = mysqli_fetch_array($data)) {
				$hasil[] = $row;
			}
			return $hasil;
		}
	}

	function show_data_admin()
	{
		$id = $_SESSION['user-id'];
		$data = mysqli_query($this->connect, "select * from cart where id<>0");

		if (mysqli_num_rows($data) == 0) {
			$hasil = null;
		} else if (mysqli_num_rows($data) > 0) {
			while ($row = mysqli_fetch_array($data)) {
				$hasil[] = $row;
			}
			return $hasil;
		}
	}

	function getColor()
	{
		$uid = $_SESSION['user-id'];
		$colorCookieKey = "color-" . $uid;
		$colorNav = "";
		if (isset($_COOKIE[$colorCookieKey])) {
			$colorNav = $_COOKIE[$colorCookieKey];
		} else {
			$colorNav = "navbar-light bg-light";
		}
		return $colorNav;
	}

	

	function update_profile($name, $email, $contact, $password, $repassword, $color)
	{
		// yellow  navbar-dark bg-warning text-light
		// red  navbar-dark bg-danger text-light
		// blue  navbar-dark bg-primary text-light

		if ($password != $repassword) {
			$this->msgFailed("Password Tidak Sama" . mysqli_error($this->connect));
		} else {
			$uid = $_SESSION['user-id'];
			setcookie('color-' . "$uid", $color, time() + (10 * 365 * 24 * 60 * 60), '/');
			$data = mysqli_query(
				$this->connect,
				"UPDATE user SET 
		 nama ='$name',
		 email = '$email',
		 no_hp='$contact',
		 password = '$password'
		 WHERE id = $uid"
			);

			if ($data) {
				$_SESSION['user-id'] =  $uid;
				$_SESSION['user-name'] =  $name;
				$_SESSION['user-email'] =  $email;
				$this->UserData();
				$this->msgSuccess("Berhasil Mengupdate Data , <a href='profile.php'>Refresh Halaman</a>");
			} else {
				$this->msgFailed("Gagal Mengupdate Data" . mysqli_error($this->connect));
			}
		}
	}

	
	// DELETE CART ITEM
	function change_status($item_id,$status)
	{
		$data = mysqli_query($this->connect, "UPDATE `cart` SET `status`='$status' WHERE id=$item_id");
		if ($data) {
			$this->msgSuccess("Berhasil Mengupdate Status , <a href='admin_landing.php'>Refresh Halaman</a>");
		} else {
			$this->msgFailed("Gagal Mengupdate Data" . mysqli_error($this->connect));
		}
	}


	// DELETE CART ITEM
	function delete_data($item_id)
	{
		$data = mysqli_query($this->connect, "delete from cart where id=$item_id");
		if ($data) {
			$this->msgSuccess("Berhasil Menghapus Produk , <a href='cart.php'>Refresh Halaman</a>");
		} else {
			$this->msgFailed("Gagal Menghapus Produk " . mysqli_error($this->connect));
		}
	}
	// ADD CART ITEM
	function addToCart($item_name, $item_price)
	{
		$id = $_SESSION['user-id'];
		$name = $_SESSION['user-name'];
		$data = mysqli_query($this->connect, "INSERT INTO cart (user_id,nama_barang,harga,status,current_user_name) 
		VALUES ($id,'$item_name','$item_price','Dalam Antrian Masak',  '$name'  )       ");
		if ($data) {
			$this->msgSuccess("Berhasil Ditambahkan");
		} else {
			echo "User ID = $this->user_id";
			$this->msgFailed("Gagal Menambah Produk " . mysqli_error($this->connect));
		}
	}

	// LOGIN
	function login($email, $password, $rememberMe)
	{
		$data = mysqli_query($this->connect, "SELECT * FROM USER WHERE email='$email' AND password='$password'");
		if (mysqli_num_rows($data) != 0) {
			$row = mysqli_fetch_array($data);
		
			$_SESSION['logged'] = 1;
			$_SESSION['user-id'] =  $row['id'];
			$_SESSION['user-name'] =  $row['nama'];
			$_SESSION['user-email'] =  $row['email']; 
			$this->user_id = $row['id'];
			if ($rememberMe) {
				setcookie('saved', 1, time() + (10 * 365 * 24 * 60 * 60), '/');
				setcookie('user-email', $row['email'], time() + (10 * 365 * 24 * 60 * 60), '/');
				setcookie('user-password',  $row['password'],  time() + (10 * 365 * 24 * 60 * 60), '/');
			} else {
				setcookie('saved', 0, time() + (10 * 365 * 24 * 60 * 60), '/');
			}

			$this->msgSuccess("Login Berhasil");
			$role = $row['role'];
			if($role=='admin'){
				$this->movePage("admin_landing.php");
			}else{
				$this->movePage("index.php?in_");
			}
		
		} else {

			$_SESSION['logged'] = 0;
			$_SESSION['saved'] = 0;
			$this->msgFailed("Login Gagal, Username atau Password Tidak Ditemukan");
		}
	}

	function UserData()
	{
		$id = $_SESSION['user-id'];
		$data = mysqli_query($this->connect, "SELECT * FROM user where id=$id");

		while ($r = mysqli_fetch_assoc($data)) {
			$hasil[] = $r;
		}
		return $hasil;
	}


	//REGISTER
	function register($name, $email, $phone, $password, $confPassword)
	{
		if ($password != $confPassword) {
			$this->msgFailed("Registrasi Gagal, Password Tidak Sesuai");
		} else {
			$data = mysqli_query(
				$this->connect,
				"INSERT INTO user (nama,email,no_hp,password) 
        values ('$name','$email','$phone','$password') "
			);
			if ($data) {
				$this->msgSuccess("<strong>Registrasi Berhasil!</strong> <a href='login.php'>Silakan Login Disini</a> .");
			} else {
				$this->msgFailed("Registrasi Gagal, ' . mysqli_error($data) . '");
			}
		}
	}

	function movePage($url)
	{
		echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
	}

	function msgSuccess($message)
	{
		echo '<br>';
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	' . $message . '.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>';
	}

	function msgFailed($message)
	{
		echo '<br>';
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
	' . $message . '.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>';
	}
}
