<?php include("./includes/header.php"); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Add Social Media</h4>
        <a href="social-media.php" class="btn btn-danger float-end">Back</a>
      </div>
      <div class="card-body">
        <?php echo alertMessage(); ?>
        <form action="code.php" method="POST">
          <div class="mb-3">
            <label for="social-media">Social Media Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="social-media">Social Media URL/Link</label>
            <input type="text" name="url" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="social-media">Status</label>
            <br />
            <input type="checkbox" name="status" class="form-control" style="width: 30px; height: 30px;">
          </div>
          <div class="mb-3 text-end">
            <button type="submit" name="saveSocialMedia" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<?php include("./includes/footer.php"); ?>