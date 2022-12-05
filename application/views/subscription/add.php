<?php
if (validation_errors() != false) {
?>
  <div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
  </div>
<?php
}

?>

<form action="<?= base_url('index.php/subscription/add') ?>" method="post" enctype="multipart/form-data" class="needa-validation">
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Month</label>
    <input type="text" class="form-control" name="month" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Price</label>
    <input type="text" class="form-control" name="price" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Is Active</label>
    <select class="form-select" aria-label="Default select example" name="is_active">
  <option selected>Open this select menu</option>
  <option value="1" >ACTIVE</option>
  <option value="0" >NONE</option>
</select>
  </div>
<input type="hidden" name="created_at" >
  <input type="submit" value="submit">
</form>