<?php 

function connection() {
   // membuat konekesi ke database system
   $dbServer = 'localhost:3307';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "boroom";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

   if(! $conn) {
	die('Koneksi gagal: ' . mysqli_error());
   }
   //memilih database yang akan dipakai
   mysqli_select_db($conn,$dbName);
	
   return $conn;
}