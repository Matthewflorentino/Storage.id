<?php 
session_start();


if ( !isset($_SESSION['login'])) {
	header('Location: login.php');
	exit;
}

require "functions.php";

$id = $_GET['id'];

if (deleted($id) > 0 ) { // > 0 yang bearti jika id = lebih dari 0 maka data akan dihapus
	echo "<script>
	alert('data berhasil dihapus');
	document.location.href = 'index.php';
	</script>";
}else{
	echo "<script>
	alert('data berhasil dihapus');
	document.location.href = 'index.php';
	</script>";
}

?>