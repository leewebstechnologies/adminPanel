<?php
require '../config/functions.php';

$paraResult = checkParamId('id');
if (is_numeric($paraResult)) {
  $serviceId = validate($paraResult);

  $service = getById('services', $serviceId);
  if ($service['status'] == 200) {

    $serviceDeleteRes = deleteQuery('services', $serviceId);
    if ($serviceDeleteRes) {

      $deleteImage = "../".$service['data']['image'];
    if (file_exists($deleteImage)) {
      unlink($deleteImage);
    }
    
      redirect('services.php', 'Services Deleted Successfully!');
    } else {
      redirect('services.php', 'Something Went Wrong!');
    }
    
  } else {
    redirect('services.php', $service['message']);
  }
  
} else {
  redirect('services.php', $paraResult);
}
