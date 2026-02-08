<?php
session_start();
include "conn.php";

$errors = [];
$show_verify_form = false;

// ------------------- SIGN UP -------------------
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['number']);

    // Validation
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }
    if (empty($phone) || strlen($phone) < 10) {
        $errors[] = "Valid phone number is required";
    }

    // Check if email or phone already exists
    $check = "SELECT * FROM manager WHERE email='$email' OR number='$phone'";
    $result = $con->query($check);
    if ($result->num_rows > 0) {
        $errors[] = "Email or phone already exists";
    }

    // If no errors, register user
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(100000, 999999);

        $insert = "INSERT INTO manager (full_name, email, password, number, code, status) 
                   VALUES ('$name', '$email', '$hashedPassword', '$phone', '$code', 'pending')";

        if ($con->query($insert)) {

            $show_verify_form = true;

        } else {
            $errors[] = "Registration failed. Please try again.";
        }
    }
}

// ------------------- VERIFY CODE -------------------
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify'])) {
    // get email from session
    $code = $_POST['code'];

    $sql = "SELECT * FROM manager WHERE code='$code' AND status='pending'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $update = "UPDATE manager SET status='confirmed'";
        $con->query($update);
        echo "<div style='text-align:center; top='50;'>WELCOME YOUR PAGE ! 💕💕💕💕💕💕💕💕💕💕👍!</div>";
        
        exit;
    } else {
        $errors[] = "Invalid code!";
        $show_verify_form = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign Up & Verify</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; }
    .container { width: 400px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 8px; }
    input { width: 100%; padding: 10px; margin: 5px 0; }
    button { padding: 10px; width: 100%; background: #007BFF; color: #fff; border: none; }
    .error { color: red; }
    .title { text-align: center; color: #333; }
  </style>
</head>
<body>

<div class="container">

  <?php if (!empty($errors)) : ?>
      <div class="error">
          <?php foreach ($errors as $err) echo $err . "<br>"; ?>
      </div>
  <?php endif; ?>

  <!-- SIGN UP FORM -->
  <?php if (!$show_verify_form) : ?>
  <h2 class="title">Sign Up</h2>
  <form method="POST">
    <label>FULL NAME</label>
    <input type="text" name="name" required>

    <label>EMAIL</label>
    <input type="email" name="email" required>

    <label>PASSWORD</label>
    <input type="password" name="password" required>

    <label>NUMBER PHONE</label>
    <input type="number" name="number" required>

    <button type="submit" name="signup">Sign Up</button>
  </form>

  <?php else: ?>

  <h2 class="title">Verify Code</h2>
  <form method="POST">
    <label>Enter Code</label>
    <input type="text" name="code" required>

    <button type="submit" name="verify">Verify</button>
  </form>

  <?php endif; ?>

</div>

</body>
</html>
