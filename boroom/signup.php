<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/sign.css">
  <title> Signup Page </title>
</head>

<body>
<div class="form-container">
<div class="title"> Daftar Akun </div>
    <div class="left-column">
      <form>
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="telepon">No. Telepon</label>
        <input type="tel" id="telepon" name="telepon" required>
      </form>
      <div class="checkbox-container">
        <input type="checkbox" id="syarat" name="syarat">
        <label for="syarat">Saya menyetujui <a href="#" class="link-active">Syarat &amp; Ketentuan</a> yang berlaku</label>
      </div>
      <button type="submit" class="daftar-button"><a href="index.php"> Daftar </button></a>
      <p class="sdh"> Sudah memiliki akun ?<a href="signin.php" class="sdh"> Masuk disini </a></p>
    </div>
    <div class="right-column">
      <form>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="repeat_password">Ulangi Password</label>
        <input type="password" id="ulangi_password" name="ulangi_password" required>

        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" required>
    </form>
    <button type="button" class="hapus-button">Hapus Data</button>
    </div>
</div>
</body>
</html>
