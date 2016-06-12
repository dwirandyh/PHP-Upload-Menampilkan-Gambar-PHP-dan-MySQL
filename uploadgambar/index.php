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


if (isset($_POST['upload'])) // Jika tombol upload di tekan
{
	$nama_gambar=$_FILES['gambar'] ['name']; // Mendapatkan nama gambar
	$lokasi=$_FILES['gambar'] ['tmp_name']; 
	
	// Menyiapkan tempat nemapung gambar yang diupload
	$lokasitujuan="./image";
	// Menguplaod gambar kedalam folder ./image
	$upload=move_uploaded_file($lokasi,$lokasitujuan."/".$nama_gambar);
	
	$query=mysql_query("insert into upload (nama_gambar) values ('".$nama_gambar."')");
	echo "Gambar berhasil diuplaod";
	// Merefresh halaman
	echo "<meta http-equiv='refresh' content=3;url='./'>";
}
?>
<html>
<head>
<title>[Tutorial_Koding] Uplaod Gambar dengan PHP dan MySQL</title>
</head>
<body>
<!-- Membuat form untuk mengupload gambar -->
<form method="post" action="" enctype="multipart/form-data">
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="36" colspan="3" align="center"><h3>Form Upload Gambar</h3></td>
    </tr>
  <tr>
    <td height="37">Pilih Gambar</td>
    <td>:</td>
    <td><input type="file" accept="image/*" name="gambar"> <!-- image/* digunakan untuk memfilter file gambar saja yang bisa diupload --></td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td colspan="2"><input type="submit" name="upload" value="Upload Gambar"></td>
    </tr>
</table>
</form>

<!-- membuat table untuk menampilkan data gambar yang diupload -->
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center"><h3>List Gambar yang telah diupload</h3></td>
  </tr>
  <tr>
    <td>No.</td>
    <td>Nama Gambar</td>
    <td>Aksi</td>
  </tr>
<?php 
$querygambar=mysql_query("select * from upload");
// Perulangan untuk menampilkan data gambar
while ($data=mysql_fetch_array($querygambar))
{ $a++;
?>
  <tr>
  	<!-- Untuk menampilkan nomor urut -->
    <td><?=$a;?></td>
    <!-- untuk menampilkan nama gambar -->
    <td><?=$data['nama_gambar'];?></td>
    <!-- membuat link yang mengarah pada lihat.php untuk melihat gambar yang diupload -->
    <td><a href="lihat.php?idgambar=<?=$data['id_gambar'];?>">Lihat Gambar</a></td>
  </tr>
<?php } ?>
</table>

</body>
</html>