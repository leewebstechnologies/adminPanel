<?php include("./includes/header.php"); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Add Services</h4>
        <a href="services.php" class="btn btn-danger float-end">Back</a>
      </div>
      <div class="card-body">
        <?php echo alertMessage(); ?>
        <form action="code.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="">Service Name</label>
            <input type="text" name="name" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="">Small Description</label>
            <textarea name="small_description" class="form-control" rows="3" required ></textarea>
          </div>
          <div class="mb-3">
            <label for="">Long Description</label>
            <textarea name="long_description" class="form-control" rows="3" required ></textarea>
          </div>
          <div class="mb-3">
            <label for="">Upload Service Image</label>
            <input type="file" name="image" class="form-control" />
          </div>

          <h5>SEO Tags</h5>
          <div class="mb-3">
            <label for="">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="">Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="3" required ></textarea>
          </div>
          <div class="mb-3">
            <label for="">Meta Keyword</label>
            <textarea name="meta_keyword" class="form-control" rows="3" required ></textarea>
          </div>
          <div class="mb-3">
            <label for="">Status (checked=hidden, un-checked=visible)</label>
            <br />
            <input type="checkbox" name="status" style="width: 30px; height: 30px;" />
          </div>

          <div class="mb-3 text-end">
            <button type="submit" name="saveService" class="btn btn-primary">Save Service</button>
          </div>

        </form>
      </div>
    </div>

  </div>
</div>

<?php include("./includes/footer.php"); ?>