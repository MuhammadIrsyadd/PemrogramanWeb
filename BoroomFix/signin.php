<?php
  session_start();
  include ('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/sign.css">
  <title> Signup Page </title>
</head>

<body>
<div class="in-container">
<div class="title"> Masuk </div>
    <form action="signin.php" method="POST">
        <label for="email">Alamat Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <a href="" class="a1"> Lupa password? </a>
        <button type="submit" name="loginbtn" class="masuk-button"> Masuk </button>
    </form>

    <p class="p1"> Belum punya akun ?<a href="signup.php" class="a2"> Daftar </a></p>

    <?php
      if(isset($_POST['loginbtn'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $query = mysqli_query(connection(),"SELECT * FROM user WHERE email='$email'");
        $rows = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);


        if($rows > 0){
          if  ($password != $data["password"]){
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Mengimpor SweetAlert2 -->
            <script>
              Swal.fire('Password Tidak Sesuai'); // Menampilkan pesan SweetAlert2
            </script>
            <?php
          } else{
            echo "BENAR";
            $_SESSION['email'] = $data['email'];
            $_SESSION['id_admin'] = $data['id_admin'];
            $_SESSION['login'] = true;
            header('location: index.php');
          }
      }      
      else{
          ?>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Mengimpor SweetAlert2 -->
          <script>
            Swal.fire('Email Tidak Terdaftar'); // Menampilkan pesan SweetAlert2
          </script>
          <?php
        }
    }
    ?>

</div>
</body>
</html>