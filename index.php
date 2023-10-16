<!-- KONEKSI INDEX.PHP KE DATABASE MENGGUNAKAN MYSQLI -->
<?php 
session_start();


if ( !isset($_SESSION['login'])) {
	header('Location: login.php');
	exit;
}

require 'functions.php'; // memanggil data di functions.php
$cruds = query("SELECT * FROM crud ORDER BY id ASC"); 

if (isset($_POST['search'])) {
	$cruds = search($_POST['keyword']);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    justify-content: space-between;
    padding: 0px 27px;
}

svg.svg-inline--fa.fa-user {
    color: #EEEDED;
}

svg.svg-inline--fa.fa-right-from-bracket {
    color: #EEEDED;
}

.search {
    position: absolute;
    top: 70px;
}

.search input {
    width: 316px;
    height: 30px;
    left: 12px;
    border-radius: 7px;
    border: 1px solid #0D1282;
}

.search input::placeholder {
    font-size: 10px;
    font-weight: 500;
    font-family: 'pop', sans-serif;
    color: #0D1282;

}


.content {
    /* position: absolute;
    top: 126px; */
    margin-top: 131px;
    margin-bottom: -107px;
    padding: 0px 12px;
    background-color: #D9D9D9;
    border-radius: 7px;
    height: 39px;
}

.text-content {
    display: flex;
    align-items: center;
}

.text-content h5 {
    color: white;
    font-weight: 500;
    font-size: 13px;
    font-family: 'urban', sans-serif;
    margin: 0;
    background-color: #0D1282;
    height: 30px;
    border-radius: 8px;
    text-align: center;
    display: flex;
    align-items: center;
    width: 228px;
    padding: 0px 12px;
}

.container {
    width: 335px;
}

.edit {
    background-color: #F0DE36;
    width: 30px;
    height: 30px;
    border-radius: 8px;
}

svg.svg-inline--fa.fa-pencil {
    color: white;
    width: 14px;
    height: 14px;
    text-align: center;
}

svg.svg-inline--fa.fa-trash {
    color: white;
    width: 14px;
    height: 14px;
    text-align: center;
}

.hapus {
    background-color: #D71313;
    width: 30px;
    height: 30px;
    border-radius: 8px;
}

.add {
    width: 45px;
    height: 45px;
    background-color: #0D1282;
    border-radius: 8px;
}

svg.svg-inline--fa.fa-plus {
    color: white;
    width: 18px;
    height: 18px;
    text-align: center;
}

button#search {
    display: none;
}
</style>

<body>
    <section id="menu">
        <div class="top fixed-top">
            <div class="head">
                <div class="exit">
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </div>
                <div class="text-head">
                    <h1>Inventory</h1>
                </div>
                <div class="person">
                    <a href="profile.php">
                        <i class="fa-regular fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <div class="search d-flex justify-content-center w-100 gap-3">
                <input class="form-control" name="keyword" id="searchbar" placeholder="Type to search...">
                <button id="search" name="search" type="submit"></button>
            </div>
        </form>

        <table class="container">
            <?php $i = 1; ?>
            <?php foreach($cruds as $row): ?>
            <tr class="content d-flex justify-content-between w-100">
                <td class="d-flex">
                    <div class="text-content">
                        <h5><?= $row["nama"]; ?></h5>
                    </div>
                </td>
                <td class="d-flex align-items-center">
                    <div class="aksi d-flex gap-3">
                        <a href="update.php?id=<?= $row["id"];?>"
                            class="edit d-flex justify-content-center align-items-center"><i
                                class="fa-solid fa-pencil"></i></a>
                        <a href="deleted.php?id=<?= $row["id"];?>"
                            onclick="return confirm('You will deleted this data are you sure ?');"
                            class="hapus d-flex justify-content-center align-items-center"><i
                                class="fa-solid fa-trash"></i></a>
                    </div>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach ?>
        </table>

        <div class="add d-flex justify-content-center align-items-center position-fixed bottom-0 m-3 end-0 bottom-0 ">
            <a href="create.php"><i class="fa-solid fa-plus"></i></a>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>