<?php
require '../config/functions.php';

$paraResult = checkParamId('id');
if (is_numeric($paraResult)) {
  $socialMediaId = validate($paraResult);

  $socialMedia = getById('social_media', $socialMediaId);
  if ($socialMedia['status'] == 200) {
    $socialMediaDeleteRes = deleteQuery('social_media', $socialMediaId);
    if ($socialMediaDeleteRes) {
      redirect('social-media.php', 'Social Media Deleted Successfully!');
    } else {
      redirect('social-media.php', 'Something Went Wrong!');
    }
    
  } else {
    redirect('social-media.php', $socialMedia['message']);
  }
  
} else {
  redirect('social-media.php', $paraResult);
}
