<?php 
session_start();


if ( !isset($_SESSION['login'])) {
	header('Location: login.php');
	exit;
}

require 'functions.php';
if(isset($_POST['add']) ) { 
	
	if (create($_POST) > 0) {
		echo "<script>
		alert('data berhasil ditambahkan');
		document.location.href = 'index.php';
		</script>";
	}else {
		echo "<script>
		alert('data gagal ditambahkan');
		document.location.href = 'index.php';
		</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
* {
    margin: 0;
    padding: 0;
}

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

.top {
    width: 100%;
    height: 44px;
    background-color: #0D1282;
}

.top h1 {
    color: white;
    font-weight: 500;
    font-size: 12px;
    font-family: 'urban', sans-serif;
    letter-spacing: 3px;
    margin: 0;
}

.top .head {
    display: flex;
    width: 100%;
    height: 44px;
    align-items: center;
    justify-content: center;
    padding: 0px 27px;
}

.container h1 {
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


#create form input {
    margin: 4px;
    width: 269px;
    height: 30px;
    padding: 8px 8px;
    background-color: #EEEDED;
    color: #0D1282;
    border-radius: 8px;
    border-width: 2px;
    border-color: #0D1282;
}

#create form input#gambar {
    margin: 4px;
    width: 269px;
    height: 30px;
    padding: 1px 8px;
    background-color: #EEEDED;
    color: #0D1282;
    border-radius: 8px;
    border-width: 2px;
    border-color: #0D1282;
}

#create form input::placeholder {
    color: #0D1282;
    opacity: 50%;
    text-align: center;
}

.input .input-nama {
    position: absolute;
    top: 217px;
    left: 50%;
    transform: translate(-50%, -50%);

}

.input .input-type {
    position: absolute;
    top: 261px;
    left: 50%;
    transform: translate(-50%, -50%);

}

.input .input-count {
    position: absolute;
    top: 305px;
    left: 50%;
    transform: translate(-50%, -50%);

}

.input .input-desc {
    position: absolute;
    top: 349px;
    left: 50%;
    transform: translate(-50%, -50%);

}

.input-gambar {
    position: absolute;
    top: 393px;
    width: 100%;
    display: flex;
    justify-content: center;
    height: 30px;
}

.input-gambar::placeholder {
    display: flex;
}


.btn-add {
    position: absolute;
    top: 85%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.btn-add button {
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
</style>

<body>
    <section id="create">
        <div class="top fixed-top">
            <div class="head">
                <div class="text-head">
                    <h1>create</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <h1>SAFETORAGE.ID</h1>
        </div>
        <form action="" method="post" class="d-flex flex-column" enctype="multipart/form-data">
            <div class="input d-flex justify-content-center flex-column">
                <div class="input-nama input-group input-group-lg justify-content-center">
                    <input type="text" name="nama" id="nama" placeholder="Name Item" required>
                </div>
                <div class="input-type input-group input-group-lg justify-content-center">
                    <input type="text" name="type" id="type" placeholder="Type Item" required>
                </div>
                <div class="input-count input-group input-group-lg justify-content-center">
                    <input type="text" name="jumlah" id="count" placeholder="count Item" required>
                </div>
                <div class="input-desc input-group input-group-lg justify-content-center">
                    <input type="text" name="deskripsi" id="deskripsi" placeholder="Desc Item" required>
                </div>
                <div class="input-gambar">
                    <input class="form-control" type="file" name="gambar" id="gambar">
                </div>
                <div class="btn-add container d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <button type="submit" name="add">ADD</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>