<?php include("./includes/header.php"); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Services</h4>
        <a href="services.php" class="btn btn-danger float-end">Back</a>
      </div>
      <div class="card-body">
        <?php echo alertMessage(); ?>
        <form action="code.php" method="POST" enctype="multipart/form-data">
          <?php
           $paramResult = checkParamId('id');
          if (!is_numeric($paramResult)) {
            echo "<h5>" . $paramResult . "</h5>";
            return false;
          }

          $service = getById('services', $paramResult);
          if ($service) {
              if ($service['status'] == 200) {
                ?>
          <input type="hidden" name="serviceId" value="<?php echo $service['data']['id']; ?>">
          <div class="mb-3">
            <label for="">Service Name</label>
            <input type="text" name="name" value="<?php echo $service['data']['name']; ?>" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="">Small Description</label>
            <textarea name="small_description" class="form-control" rows="3" required ><?php echo $service['data']['small_description']; ?></textarea>
          </div>
          <div class="mb-3">
            <label for="">Long Description</label>
            <textarea name="long_description" class="form-control" rows="3" required ><?php echo $service['data']['long_description']; ?></textarea>
          </div>
          <div class="mb-3">
            <label for="">Upload Service Image</label>
            <input type="file" name="image" class="form-control" />
            <img style="width: 70px; height: 70px" src="<?php echo '../'.$service['data']['image']; ?>" alt="Img">
          </div>

          <h5>SEO Tags</h5>
          <div class="mb-3">
            <label for="">Meta Title</label>
            <input type="text" name="meta_title" value="<?php echo $service['data']['meta_title']; ?>" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="">Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="3" required ><?php echo $service['data']['meta_description']; ?></textarea>
          </div>
          <div class="mb-3">
            <label for="">Meta Keyword</label>
            <textarea name="meta_keyword" class="form-control" rows="3" required ><?php echo $service['data']['meta_keyword']; ?></textarea>
          </div>
          <div class="mb-3">
            <label for="">Status (checked=hidden, un-checked=visible)</label>
            <br />
            <input type="checkbox" name="status" <?php echo $service['data']['status'] == 1 ? 'checked': ''; ?> style="width: 30px; height: 30px;" />
          </div>

          <div class="mb-3 text-end">
            <button type="submit" name="updateService" class="btn btn-primary">Update Service</button>
          </div>

            <?php
              }
              else {
            echo "<h5>No such data found!</h5>";
          }
              
          } else {
            echo "<h5>Something went wrong!</h5>";
          }
          ?>

        </form>
      </div>
    </div>

  </div>
</div>

<?php include("./includes/footer.php"); ?>