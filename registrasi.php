<?php
include_once("koneksi.php");

$usernameErr = $passwordErr = $emailErr = "";
$username = $password = $email = "";

// Fungsi untuk membersihkan input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Username
    if (empty($_POST["username"])) {
        $usernameErr = "Username harus diisi.";
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9_]{3,15}$/", $username)) {
            $usernameErr = "Username hanya boleh huruf, angka, dan underscore (3-15 karakter).";
        }
    }

    // Validasi Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password harus diisi.";
    } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{6,}$/", $password)) {
            $passwordErr = "Password minimal 6 karakter, kombinasi huruf besar, kecil, dan angka.";
        }
    }

    // Validasi Email
    if (empty($_POST["email"])) {
        $emailErr = "Email harus diisi.";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid.";
        }
    }

    // Jika semua input valid, lakukan query
    if (empty($usernameErr) && empty($passwordErr) && empty($emailErr)) {
        $query = "INSERT INTO Users (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menambahkan data: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Registrasi</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                    <span class="error"><?php echo $usernameErr; ?></span>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="error"><?php echo $passwordErr; ?></span>
                </div>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
                <!-- Submit -->
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
