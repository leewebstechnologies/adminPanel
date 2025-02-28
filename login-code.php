<?php
require "config/functions.php";


if (isset($_POST['loginBtn'])) {
  $emailInput  = validate($_POST['email']);
  $passwordInput  = validate($_POST['password']);

  $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
  $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);

  if ($email != "" && $password != "") {
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row['role'] == "admin") {
          if ($row['is_ban'] == 1) {
            redirect("login.php", "Your account has been banned. Please contact the admin.");
          }

          $_SESSION['auth'] = true;
          $_SESSION['loggedInUserRole'] = $row['role'];
          $_SESSION['loggedInUser'] = [
            'name' => $row['name'],
            'email' => $row['email']
          ];

          redirect("admin/index.php", "Logged in successfully");
        } else {
          if ($row['is_ban'] == 1) {
            redirect("login.php", "Your account has been banned. Please contact the admin.");
          }
          $_SESSION['auth'] = true;
          $_SESSION['loggedInUserRole'] = $row['role'];
          $_SESSION['loggedInUser'] = [
            'name' => $row['name'],
            'email' => $row['email']
          ];
          redirect("index.php", "Logged in successfully!");
        }
      } else {
        redirect("login.php", "Invalid email or password");
      }
    } else {
      redirect("login.php", "Something went wrong!");
    }
  }
} else {
  redirect("login.php", "Please fill in all fields");
}
