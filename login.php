<?php 
session_start(); // mulai session untuk membuat atau meset session yang akn dibuat

// jika ada session login pindahkan ke index.php
if (isset($_SESSION['login'])) {
	header('Location: index.php');
	exit;
}

require 'functions.php';


// kondisi tombol submit sudah ditekan
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	$profile = $_POST['profile'];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

		// pertama tam cek username
	if (mysqli_num_rows($result) === 1 ) {
		// jika benar lanjut cek password

		$row = mysqli_fetch_assoc($result); 
		if (password_verify($password, $row["password"] ) ) { // UNTUK MEVERIFY password APAKAH SAMA DENGAN password HASH

			// SET SESSION
			$_SESSION['login'] = true;

			header("Location: index.php");
			exit;
		}else {
            
        }
	}
	$error = true;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
@font-face {
    font-family: 'urban';
    src: url('crud/font/urbanist.ttf') format('ttf');
}

@font-face {
    font-family: 'pop';
    src: url('crud/font/poppins.ttf') format('ttf');
}

body {
    background-color: #EEEDED;
    width: 100%;
    height: 100vh;
}

#login .container {
    position: relative;
}

#login h1 {
    color: #0D1282;
    font-weight: 500;
    font-size: 16px;
    font-family: 'urban', sans-serif;
    letter-spacing: 6px;
    text-align: center;
    position: absolute;
    top: 117px;
    left: 50%;
    transform: translate(-50%, -50%);
}

#login .btn-login {
    position: absolute;
    top: 85%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.btn-login button {
    width: 269px;
    height: 45px;
    background-color: #0D1282;
    color: white;
    border-radius: 8px;
    border: none;
    font-size: 15px;
    text-transform: uppercase;
    font-family: 'pop', sans-serif;
}

#login form input {
    margin: 4px;
    width: 269px;
    height: 45px;
    padding: 8px 8px;
    background-color: #EEEDED;
    color: #0D1282;
    border-radius: 8px;
    border-width: 2px;
    border-color: #0D1282;
}

#login form input::placeholder {
    color: #0D1282;
    opacity: 50%;
}

.input .inputname {
    position: absolute;
    top: 271px;
    left: 50%;
    transform: translate(-50%, -50%);

}

.input .inputpass {
    position: absolute;
    top: 323.03px;
    left: 50%;
    transform: translate(-50%, -50%);

}

p {
    color: #D71313;
    text-align: center;
    position: absolute;
    top: 370px;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    margin: 0;
    font-family: 'urban', sans-serif;
}
</style>

<body>
    <section id="login">
        <div class="container">
            <h1>SAFETORAGE.ID</h1>
        </div>

        <?php if (isset($error) ) :?>
        <p>username atau password salah</p>
        <?php endif; ?>

        <form action="" method="post" class="d-flex flex-column">
            <div class="input d-flex justify-content-center flex-column">
                <div class="inputname input-group input-group-lg justify-content-center">
                    <input type="text" name="username" id="username" placeholder="Enter your Username">
                </div>
                <div class="inputpass input-group input-group-lg justify-content-center">
                    <input type="password" name="password" id="password" placeholder="Enter your password">
                </div>
            </div>
            <div class="btn-login container d-flex justify-content-center align-items-end">
                <div class="text-center">
                    <button type="submit" name="login">Login</button>
                </div>
            </div>

        </form>
    </section>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>