<div class="py-5 bg-light border-top">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4 class="footer-heading"><?php echo webSetting('title') ?? 'Meta Description'; ?></h4>
        <hr />
        <p><?php echo webSetting('small_description') ?? 'Meta Description'; ?></p>
      </div>
      <div class="col-md-6">
        <h4 class="footer-heading">Contact Information</h4>
        <hr />
        <p>Address: <?php echo webSetting('address') ?? '';?></p>
        <p>Email: <?php echo webSetting('email1') ?? '';  ?>, <?php echo webSetting('email2') ?? '';  ?></p>      
        <p>Phone No.: <?php echo webSetting('phone1') ?? '';  ?>, <?php echo webSetting('phone2') ?? '';  ?></p>      
      </div>
    </div>
  </div>

</div>