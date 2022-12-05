<?php
if (validation_errors() != false) {
?>
  <div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
  </div>
<?php
}

?>

<form action="<?= base_url('index.php/member/add')?>" method="post" enctype="multipart/form-data" class="needa-validation">
  <div class="mb-3">
  <input type="hidden" name="id" >
    <label for="exampleFormControlInput1" class="form-label">NIK</label>
    <input type="text" class="form-control"  name="nik" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
    <input type="text" class="form-control" name="full_name" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Phone</label>
    <input type="text" class="form-control"  name="phone" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Born Place</label>
    <input type="text" class="form-control" name="born_place" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Born Date</label>
    <input type="date" class="form-control" name="born_date" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Gender</label>
    <select class="form-select" aria-label="Default select example" name="gender">
  <option selected>Open this select menu</option>
  <option value="L" >Men</option>
  <option value="P"  >Girl</option>
</select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">country</label>
    <input type="text" class="form-control"  name="country" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nationality</label>
    <select class="form-select" aria-label="Default select example" name="nationality">
  <option selected>Open this select menu</option>
  <option value="WNI" >WNI</option>
  <option value="WNA">others</option>
</select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Is Active</label>
    <select class="form-select" aria-label="Default select example" name="is_active">
  <option selected>Open this select menu</option>
  <option value="1" >Active</option>
  <option value="0">Nonactive</option>
</select>
  </div>

  <input type="submit" value="submit">
</form>