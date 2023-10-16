<?php 
require 'functions.php';


// kondisi tombol submit sudah ditekan
if (isset($_POST['register'])) {
	if (register($_POST) > 0 ) {
		echo "<script>
		alert('user berhasil ditambahkan');
        document.location.href = 'login.php';
		</script>";
	}else {
		echo mysqli_error($conn);
	}
	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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

#register .container {
    position: relative;
}

#register h1 {
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

#register .btn-register {
    position: absolute;
    top: 85%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.btn-register button {
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

#register form input {
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

#register form input::placeholder {
    color: #0D1282;
    opacity: 50%;
}

.input .inputname {
    position: absolute;
    top: 250px;
    left: 50%;
    transform: translate(-50%, -50%);

}

.input .inputpass {
    position: absolute;
    top: 302.03px;
    left: 50%;
    transform: translate(-50%, -50%);

}

.input .inputrpass {
    position: absolute;
    top: 354px;
    left: 50%;
    transform: translate(-50%, -50%);

}
</style>

<body>
    <section id="register">
        <div class="container">
            <h1>SAFETORAGE.ID</h1>
        </div>

        <form action="" method="post" class="d-flex flex-column">
            <div class="input d-flex justify-content-center flex-column">
                <div class="inputname input-group input-group-lg justify-content-center">
                    <input type="text" name="username" id="username" placeholder="Enter your Username">
                </div>
                <div class="inputpass input-group input-group-lg justify-content-center">
                    <input type="password" name="password" id="password" placeholder="Enter your Password">
                </div>
                <div class="inputrpass input-group input-group-lg justify-content-center">
                    <input type="password" name="rpassword" id="rpassword" placeholder="Repeat your Password">
                </div>
            </div>
            <div class="btn-register container d-flex justify-content-center align-items-end">
                <div class="text-center">
                    <button type="submit" name="register">register</button>
                </div>
            </div>

        </form>
    </section>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>