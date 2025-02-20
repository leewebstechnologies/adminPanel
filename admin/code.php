<?php
require './config/functions.php';

if (isset($_POST['saveUser'])) {
  $name = validate($_POST['name']);
  $phone = validate($_POST['phone']);
  $email = validate($_POST['email']);
  $password = validate($_POST['password']);
  $role = validate($_POST['role']);
  $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

  if ($name != '' || $phone != '' || $email != '' || $password != '') {
    $query = "INSERT INTO users (name, phone, email, password, role, is_ban) 
    VALUES ('$name', '$phone', '$email', '$password', '$role', '$is_ban')";
    $result = mysqli_query($conn, $query);

    if ($result) {
      redirect('users.php', 'User/Admin Added Successfully!');
    } else {
      redirect('users-create.php', 'Something Went Wrong!');
    }
  } else {
    redirect('users-create.php', 'Please fill all the input fields!');
  }
}

// Update Code
if (isset($_POST['updateUser'])) {
  $name = validate($_POST['name']);
  $phone = validate($_POST['phone']);
  $email = validate($_POST['email']);
  $password = validate($_POST['password']);
  $role = validate($_POST['role']);
  $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

  $userId = validate($_POST['userId']);
  $user = getById('users', $userId);
  if ($user['status'] != 200) {
    redirect('users-edit.php?id=' . $userId, 'No such Id found!');
  }

  if (
    $name != '' || $phone != '' || $email != '' || $password != ''
  ) {
    $query = "UPDATE users SET
    name = '$name',
    phone = '$phone',
    email = '$email',
    password = '$password',
    role = '$role',
    is_ban = '$is_ban'
    WHERE id = '$userId' ";
    echo $query;
    $result = mysqli_query($conn, $query);

    if ($result) {
      redirect('users-edit.php?id=' . $userId, 'User/Admin Updated Successfully!');
    } else {
      redirect('users-create.php', 'Something Went Wrong!');
    }
  } else {
    redirect('users-create.php', 'Please fill all the input fields!');
  }
}
