<?php include("./includes/header.php"); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Social Media</h4>
        <a href="social-media.php" class="btn btn-danger float-end">Back</a>
      </div>
      <div class="card-body">
        <?php echo alertMessage(); ?>
        <form action="code.php" method="POST">
          <?php
          $paramResult = checkParamId('id');
          if (!is_numeric($paramResult)) {
            echo "<h5>" . $paramResult . "</h5>";
            return false;
          }

          $socialMedia = getById('social_media', $paramResult);
          if ($socialMedia) {
            if ($socialMedia['status'] == 200) {
          ?>
              <input type="hidden" name="socialMediaId" value="<?php echo $socialMedia['data']['id'] ?>" >
              <div class="mb-3">
                <label for="social-media">Social Media Name</label>
                <input type="text" name="name" value="<?php echo $socialMedia['data']['name'] ?>" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="social-media">Social Media URL/Link</label>
                <input type="text" name="url" value="<?php echo $socialMedia['data']['url'] ?>" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="social-media">Status</label>
                <br />
                <input type="checkbox" name="status" 
                <?php echo $socialMedia['data']['status'] == 1 ? 'checked':''; ?>  
                style="width: 30px; height: 30px;" 
                />
              </div>
              <div class="mb-3 text-end">
                <button type="submit" name="updateSocialMedia" class="btn btn-primary">Update</button>
              </div>
          <?php
            } else {
              echo "<h5>" . $socialMedia['message'] . "</h5>";
            }
          } else {
            echo "<h5>Something Went Wrong!</h5>";
          }
          ?>
        </form>
      </div>
    </div>

  </div>
</div>

<?php include("./includes/footer.php"); ?>