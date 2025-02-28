<?php
require '../config/functions.php';

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

if (isset($_POST['saveSetting'])) {
  $title = validate($_POST['title']);
  $slug = validate($_POST['slug']);
  $small_description = validate($_POST['small_description']);

  $meta_description = validate($_POST['meta_description']);
  $meta_keyword = validate($_POST['meta_keyword']);

  $email1 = validate($_POST['email1']);
  $email2 = validate($_POST['email2']);
  $phone1 = validate($_POST['phone1']);
  $phone2 = validate($_POST['phone2']);
  $address = validate($_POST['address']);

  $settingId = validate($_POST['settingId']);

  if ($settingId == 'insert') {
    $query = "INSERT INTO settings(title,	slug,	small_description,	meta_description,	meta_keyword,	email1,	email2,	phone1,	phone2,	address)
    VALUES ('$title',	'$slug',	'$small_description',	'$meta_description',	'$meta_keyword',	'$email1',	'$email2',	'$phone1',	'$phone2',	'$address')";
    $result = mysqli_query($conn, $query);
  }

  if (is_numeric($settingId)) {
    $query = "UPDATE settings SET
    title='$title',
    slug='$slug',
    small_description='$small_description',
    meta_description='$meta_description',
    meta_keyword='$meta_keyword',
    email1='$email1',
    email2='$email2',
    phone1='$phone1',
    phone2='$phone2',
    address='$address'
    WHERE id='$settingId'
    ";
    $result = mysqli_query($conn, $query);

  }

  if ($result) {
    redirect("settings.php", "Settings saved!");
  } else {
    redirect("settings.php", "Somethings went wrong!");
  }
}
