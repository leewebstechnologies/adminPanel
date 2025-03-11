<?php include("./includes/header.php"); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Social Media Lists</h4>
        <a href="social-media-create.php" class="btn btn-primary float-end">Add Social Media</a>
      </div>
      <div class="card-body">
        <?php echo alertMessage(); ?>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>URL</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $socialMedia = getAll('social_media');

            if ($socialMedia) {

              if (mysqli_num_rows($socialMedia) > 0) {
                foreach ($socialMedia as $item) {
            ?>
                  <tr>
                    <td><?= $item['id']; ?></td>
                    <td><?= $item['name']; ?></td>
                    <td><?= $item['url']; ?></td>
                    <td><?= $item['status'] == 1 ? 'Hidden' : 'Shown'; ?></td>
                    <td>
                      <a href="social-media-edit.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                      <a href="social-media-delete.php?id=<?= $item['id']; ?>"
                        class=" btn btn-danger btn-sm mx-2"
                        onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                    </td>
                  </tr>
                <?php
                }
              } else {
                ?>
                <tr>
                  <td colspan="5">No Record Found!</td>
                </tr>
              <?php

              }
            } else {
              ?>
              <tr>
                <td colspan="5">Something went wrong!</td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<?php include("./includes/footer.php"); ?>