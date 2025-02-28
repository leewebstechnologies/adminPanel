<?php
$pageTitle = "Contact Us";
include("./includes/header.php");
?>

<div class="py-5 bg-secondary">
  <div class="container">
    <h4 class="text-white text-center">Contact Us</h4>
  </div>
</div>
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        Contact Form
      </div>
      <div class="col-md-6">
        <h4 class="footer-heading">Contact Information</h4>
        <hr />
        <p>Address: <?php echo webSetting('address') ?? ''; ?></p>
        <p>Email: <?php echo webSetting('email1') ?? '';  ?>, <?php echo webSetting('email2') ?? '';  ?></p>
        <p>Phone No.: <?php echo webSetting('phone1') ?? '';  ?>, <?php echo webSetting('phone2') ?? '';  ?></p>
      </div>
    </div>
  </div>
</div>

<?php include("./includes/footer.php"); ?>