<div class="py-5 bg-light border-top">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h4 class="footer-heading"><?php echo webSetting('title') ?? 'Meta Description'; ?></h4>
        <hr />
        <p><?php echo webSetting('small_description') ?? 'Meta Description'; ?></p>
      </div>
      <div class="col-md-4">
        <h4 class="footer-heading">Follow us at</h4>
        <hr />
        <ul>
          <?php
          $socialMedia = getAll('social_media');
          if ($socialMedia) {
            if (mysqli_num_rows($socialMedia) > 0) {
              foreach($socialMedia as $socialItem) {
                ?>
                <li>
                  <a href=" <?php echo $socialItem['url'] ?>">
                    <?php echo $socialItem['name'] ?>
                  </a>                
                </li>
                <?php
              }
            } else {
              echo "<li>No social media added!</li>";
            }
            
          } else {
            echo "<li>Something went wrong!</li>";
          }
          ?>
        </ul>
      </div>
      <div class="col-md-4">
        <h4 class="footer-heading">Contact Information</h4>
        <hr />
        <p>Address: <?php echo webSetting('address') ?? '';?></p>
        <p>Email: <?php echo webSetting('email1') ?? '';  ?>, <?php echo webSetting('email2') ?? '';  ?></p>      
        <p>Phone No.: <?php echo webSetting('phone1') ?? '';  ?>, <?php echo webSetting('phone2') ?? '';  ?></p>      
      </div>
    </div>
  </div>

</div>