<?php
if (validation_errors() != false) {
?>
  <div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
  </div>
<?php
}

?>

<form action="<?= base_url('index.php/book/add') ?>" method="post" enctype="multipart/form-data" class="needa-validation">
  <div class="mb-3">

    <label for="exampleFormControlInput1" class="form-label">ISBN</label>
    <input type="text" class="form-control" name="isbn" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" class="form-control"  name="title" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">synopsis</label>
    <input type="text" class="form-control"  name="synopsis" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Author</label>
    <input type="text" class="form-control"  name="author" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Publisher</label>
    <input type="text" class="form-control" name="publisher" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Category</label>
    <input type="text" class="form-control"  name="category" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Language</label>
    <input type="text" class="form-control"  name="language" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>

  <input type="submit" value="submit">
</form>