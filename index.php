<?php
$userErr = $passErr = "";
$username = $password = "";

// Fungsi membersihkan input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Validasi server-side
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Username
    if (empty($_POST["username"])) {
        $userErr = "Username harus diisi.";
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9_]{3,15}$/", $username)) {
            $userErr = "Username hanya huruf, angka, dan underscore (3-15 karakter).";
        }
    }

    // Validasi Password
    if (empty($_POST["password"])) {
        $passErr = "Password harus diisi.";
    } else {
        $password = test_input($_POST["password"]);
        // if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{6,}$/", $password)) {
        //     $passErr = "Password minimal 6 karakter, kombinasi huruf besar, kecil, dan angka.";
        // }
    }

    // Jika validasi berhasil
    if (empty($userErr) && empty($passErr)) {
      // Query untuk memeriksa username dan password
      $query = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) > 0) {
          // Jika data ditemukan, login berhasil
          $_SESSION['username'] = $username;
          header("Location: Dasboard.php"); // Redirect ke halaman berikutnya
          exit;
      } else {
          // Jika data tidak ditemukan
          $loginErr = "Username atau Password salah.";
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Login</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="loginForm">
                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                    <span id="usernameError" class="error"><?php echo $userErr; ?></span>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <span id="passwordError" class="error"><?php echo $passErr; ?></span>
                </div>
                <!-- Submit -->
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="text-center mt-3">
              <p>Belum punya akun? <a href="registrasi.php">Registrasi di sini</a></p>
            </div>
            <div class="text-center mt-3">
              <p>Minjam Buku? <a href="MinjamBuku.php">Minjam di sini</a></p>
            </div>
            <div class="text-center mt-3">
              <p>Tambah Buku? <a href="tambahBuku.php">Tambah di sini</a></p>
            </div>

        </div>
    </div>
</div>

<script>
    // Validasi Real-Time untuk Username
    document.getElementById("username").addEventListener("input", function () {
        let username = this.value;
        let usernameError = document.getElementById("usernameError");
        let regex = /^[a-zA-Z0-9_]{3,15}$/;

        if (username === "") {
            usernameError.textContent = "Username harus diisi.";
        } else if (!regex.test(username)) {
            usernameError.textContent = "Username hanya huruf, angka, dan underscore (3-15 karakter).";
        } else {
            usernameError.textContent = "";
        }
    });

    // Validasi Real-Time untuk Password
    document.getElementById("password").addEventListener("input", function () {
        let password = this.value;
        let passwordError = document.getElementById("passwordError");
        let regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{6,}$/;

        if (password === "") {
            passwordError.textContent = "Password harus diisi.";
        } else if (!regex.test(password)) {
            passwordError.textContent = "Password minimal 6 karakter, kombinasi huruf besar, kecil, dan angka.";
        } else {
            passwordError.textContent = "";
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
