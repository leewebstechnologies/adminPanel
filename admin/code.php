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



if (isset($_POST['saveSocialMedia'])) {
  $name = validate($_POST['name']);
  $url = validate($_POST['url']);
  $status = validate($_POST['status']) == true ? 1 : 0;

  if ($name != '' || $url != '') {
    $query = "INSERT INTO social_media (name, url, status) 
    VALUES ('$name', '$url', '$status')";
    $result = mysqli_query($conn, $query);

    if ($result) {
      redirect('social-media.php', 'Social Media Added Successfully!');
    } else {
      redirect('social-media-create.php', 'Something Went Wrong!');
    }
  } else {
    redirect('social-media-create.php', 'Please fill all the input fields!');
  }
}

if (isset($_POST['updateSocialMedia'])) {
  $name = validate($_POST['name']);
  $url = validate($_POST['url']);
  $status = validate($_POST['status']) == true ? 1 : 0;

  $socialMediaId = validate($_POST['socialMediaId']);

  if ($name != '' || $url != '') {
    $query = "UPDATE social_media SET
    name='$name',
    url='$url', 
    status='$status' 
    WHERE id='$socialMediaId' 
    LIMIT 1";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
      redirect('social-media.php', 'Social Media Updated Successfully!');
    } else {
      redirect('social-media-edit.php?='.$socialMediaId, 'Something Went Wrong!');
    }
  } else {
    redirect('social-media-edit.php?='.$socialMediaId, 'Please fill all the input fields!');
  }
}

if (isset($_POST['saveService'])) {
  $name = validate($_POST['name']);

  $slug = str_replace(' ', '-', strtolower($name));


  $small_description = validate($_POST['small_description']);
  $long_description = validate($_POST['long_description']);

  if ($_FILES['image']['size'] > 0) {
    $image = $_FILES['image']['name'];

    $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    if ($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes != 'png') {
     redirect("services.php", "Sorry, JPG, JPEG and PNG only!");
    } 
  
    $path = "../assets/uploads/services/";
    $imgExt = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$imgExt;

    $finalImage = 'assets/uploads/services/'.$filename;
  } else {
    $finalImage = NULL;
  }
  

  $image = validate($_POST['image']);

  $meta_title = validate($_POST['meta_title']);
  $meta_description = validate($_POST['meta_description']);
  $meta_keyword = validate($_POST['meta_keyword']);

  $status = validate($_POST['status']) == true ? '1': '0';

  $query = "INSERT INTO services (
  name, 
  slug,	
  small_description, 
  long_description,	
  image,	
  meta_title,	
  meta_description,	
  meta_keyword, 
  status
  ) 
  VALUES (
  '$name', 
  '$slug',	
  '$small_description', 
  '$long_description',	
  '$finalImage',	
  '$meta_title',	
  '$meta_description',	
  '$meta_keyword', 
  '$status'
  )";

  $result = mysqli_query($conn, $query);
  if ($result) {
    if ($_FILES['image']['size'] > 0) {
       move_uploaded_file($_FILES['image']['tmp_name'], $path.$filename);
    } 
    redirect("services.php", "Services Added Successfully!");
  } else {
     redirect("services.php", "Something went wrong!");
  }
  
}

if (isset($_POST['updateService'])) {
   $serviceId = validate($_POST['serviceId']);
   $name = validate($_POST['name']);

  $slug = str_replace(' ', '-', strtolower($name));


  $small_description = validate($_POST['small_description']);
  $long_description = validate($_POST['long_description']);

  $service = getById('services', $serviceId);
  

  if ($_FILES['image']['size'] > 0) {
    $image = $_FILES['image']['name'];

    $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    if ($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes != 'png') {
     redirect("services.php", "Sorry, JPG, JPEG and PNG only!");
    } 
  
    $path = "../assets/uploads/services/";
    
    $deleteImage = "../".$service['data']['image'];
    if (file_exists($deleteImage)) {
      unlink($deleteImage);
    }
    $imgExt = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$imgExt;

    $finalImage = 'assets/uploads/services/'.$filename;
  } else {
    $finalImage = $service['data']['image'];
  }
  

  $image = validate($_POST['image']);

  $meta_title = validate($_POST['meta_title']);
  $meta_description = validate($_POST['meta_description']);
  $meta_keyword = validate($_POST['meta_keyword']);

  $status = validate($_POST['status']) == true ? '1': '0';

  $query = "UPDATE services SET 
  name='$name', 
  slug='$slug',	
  small_description='$small_description', 
  long_description='$long_description',	
  image='$finalImage',	
  meta_title='$meta_title',	
  meta_description='$meta_description',	
  meta_keyword='$meta_keyword', 
  status='$status'
  WHERE id='$serviceId' ";
  $result = mysqli_query($conn, $query);

   if ($result) {
    if ($_FILES['image']['size'] > 0) {
       move_uploaded_file($_FILES['image']['tmp_name'], $path.$filename);
    } 
    redirect("services-edit.php?id=".$serviceId, "Services Updated Successfully!");
  } else {
     redirect("services-edit.php?id=".$serviceId, "Something went wrong!");
  }
  

} 


