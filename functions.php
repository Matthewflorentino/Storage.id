<?php 
// ada 4 parameter untuk mengconnectkan ke database yaitu
// nama host, username, password, nama database
// ditaruh sebagai variabel agar mudah untuk mengambil data
$conn = mysqli_connect("localhost", "root", "", "tugas_magang");


// menyimpan query di sebuah function
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function create($data) {
	global $conn;
	// htmlspecialchars berfungsi untuk mengelolah inputan agar tidak mengeksekusi html artibute yang diinputkan oleh users
	$nama = htmlspecialchars($data['nama']) ;
	$type = htmlspecialchars($data['type']);
	$jumlah = htmlspecialchars($data['jumlah']);
	$deskripsi = htmlspecialchars($data['deskripsi']);

	$gambar = upload();
	if( !$gambar ){
		return false;
	}
	$query = "INSERT INTO crud 
	VALUES
	('', '$nama', '$type', '$jumlah', '$deskripsi', '$gambar')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); // mengembalikan data 
}

function deleted($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM crud WHERE id =$id");

	return mysqli_affected_rows($conn); // mengembalikan data 
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	//$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gamabr yang di upload
	if ($error === 4) { // tidak ada gamabar yang diupload
		echo "<script>
		alert('pilih gamabr terlebih dahulu');
		</script>";

		return false;
	}

	// yang boleh di upload hanya gambar
	$ExValidImages = ['jpg', 'jpeg', 'png'];

	// mengambil ekstensi gamabr di $namaFile 
	// jadikan variabel agar mudah diambil

	$ExImages = explode(".", $namaFile); // explode berfungsi untuk memecah string menjadi sebuah array
	// . yang berufngsi sebagai pemecah string

	$ExImages = strtolower(end($ExImages));
	// end yang berfungsi untuk menggambil array terakhir 
	// strtolower yang berfungsi untuk membuat seluruh ekstensi ke convert menjadi lowercase agar bisa terdeteksi oleh $ExValidImages

	if ( !in_array($ExImages, $ExValidImages)) { // mencari ekstensi file dari variabel $ExValidImages dari $ExImages
		echo "<script>
		alert('ekstensi anda tidak valid');
		</script>";
		
		return false;
	}


	// // cek ukuran gambar
	// if ($ukuranFile > 900000) {
	// 	echo "<script>
	// 	alert('ukuran gambar terlalu besar');
	// 	</script>";
		
	// 	return false;
	// }



	// GENERATED NAMA FILE BARU AGAR MENGHINDARI TROUBLE SAME NAME AND DIFF PHOTO
	$namaFileBaru = uniqid();
	$namaFileBaru .= ".";
	$namaFileBaru .= $ExImages;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
		// jika lolos semua pengecekan gambar siap di upload
	 // untuk mengcopy semua image ke file img/ di folder 13_Upload

	return $namaFileBaru;

}

function updates($data) {
	global $conn;

	$id = $data["id"];

	// htmlspecialchars berfungsi untuk mengelolah inputan agar tidak mengeksekusi html artibute yang diinputkan oleh users
	$nama = htmlspecialchars($data['nama']) ;
	$type = htmlspecialchars($data['type']);
	$jumlah = htmlspecialchars($data['jumlah']);
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$gambarLama = htmlspecialchars($data['gambarLama']);

	if ($_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	}else{
		$gambar = upload() ;
	}

	$query = "UPDATE crud SET gambar = '$gambar',
	nama = '$nama',
	type =  '$type',
	jumlah = '$jumlah',
	deskripsi = '$deskripsi'	

	
	WHERE id =$id

	";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); // mengembalikan data 
}

function search($keyword) {
	$query = "SELECT * FROM crud WHERE 
	-- nama = '$keyword' (ini harus sama persis untuk mengembalikan data)
	nama LIKE '%$keyword%' -- %befungsi untuk mencari secara flexibel
	";

	return query($query); 
}

function register($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"])); // setting agar lowercase dan menghilangka simbol slash
	$password = mysqli_real_escape_string($conn, $data["password"]); // berfungsi untuk menyimpan password secara aman
	$rpassword = mysqli_real_escape_string($conn, $data["rpassword"]); // berfungsi untuk menyimpan password secara aman

	// cek username sudah ada atau belom
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result) ) {
		echo "<script>
		alert('username sudah terdaftar');
		</script>";
		return false;
	};

	// cek confirm password
	if ($password !== $rpassword) { // jika password tidak sama dengan confirm password
		echo "<script>
		alert('password tidak sama');
		</script>";

		return false;
	};

	// // enkripsi password
	$password = password_hash($password, PASSWORD_BCRYPT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '', '', '', '')");

	return mysqli_affected_rows($conn);

}

?>