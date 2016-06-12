<!--
+====================================================================================================+
+  _ _ _ _ _     __     __    _ _ _ _ _     __ _ _ _ __    _ _ _ _      __    __ _ _ _    __         +
+ |_ _    _ _|  |  |   |  |  |_ _    _ _|  /     _     \  |   __   \   |  |  /   __   \  |  |        +
+     |  |      |  |   |  |      |  |      |   /   \   |  |  |_ |  |   |  |  |  |__|  |  |  |        +
+     |  |      |  |   |  |      |  |      |   |   |   |  |   _   _/   |  |  |   __   |  |  |        +
+     |  |      |  \_ _/  |      |  |      |   \ _ /   |  |  | \  \    |  |  |  |  |  |  |  |_ _ __  +
+     |__|      \__ _ _ _ /      |__|      \_ _ _ _ _ _/  |__|  \__\   |__|  |__|  |__|  |_ _ _ _ _| +  
+   __    __    _ _ _ _ _ _    _ _ _ _     __    _ _ _     __    _ _ _ _ _                           +
+  |  | /   /  /     _     \  |   __  \   |  |  |     \   |  |  /   _ _ __\                          +
+  |  |/   /   |   /   \   |  |  /  \  |  |  |  |  |\  \  |  |  |  /  _ __                           +
+  |      /    |   |   |   |  |  |  |  |  |  |  |  | \  \ |  |  |  | |_   \                          +
+  |  |\  \    |   \ _ /   |  |  \ _/  |  |  |  |  |  \  \|  |  |  |__ |  |                          +
+  |__| \__\   \_ _ _ _ _ _/  |_ _ _ _/   |__|  |__|   \_ _ _|  \ _ _ _ _ /                          +
+====================================================================================================+

+ Uploaded By Dwi Randy Herdinanto http://dwirandyherdinanto.blogspot.com/,
+ Email dwirandyherdinanto@gmail.com
+ Find us on Facebook http://www.facebook.com/tutorial.koding
-->
<?php
$server="localhost"; //lokasi server
$username="root";  // username mysql
$password="root"; // jika mysql anda tidak diberi password silahkan dikosongkan
$namadb="latihan"; // Nama database

// Mengkoneksikan file index.php ke server
$conn=mysql_connect($server,$username,$password);

// Memilih database
$db=mysql_select_db($namadb);

// mendapakan value dari url ?lihat.php?idgambar=
$id=$_GET['idgambar'];
// Query untuk menampilkan data dari table upload
$query=mysql_query("select * from upload where id_gambar='".$id."'");
$data=mysql_fetch_array($query)
?>
<html>
<head>
<title>[Tutorial_Koding] Uplaod Gambar dengan PHP dan MySQL</title>
</head>
<body>
<!-- menampilkan gambar -->
<img src="./image/<?=$data['nama_gambar'];?>" width="500" height="500">
</body>
</html>