<?php
if (validation_errors() != false) {
?>
  <div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
  </div>
<?php
}

?>

<form action="<?= base_url('index.php/member/edit/' . $data->id) ?>" method="post" enctype="multipart/form-data" class="needa-validation">
  <div class="mb-3">
  <input type="hidden" name="id" value="<?php echo $data->id; ?>" >
    <label for="exampleFormControlInput1" class="form-label">NIK</label>
    <input type="text" class="form-control" value="<?= $data->nik ?>" name="nik" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
    <input type="text" class="form-control" value="<?= $data->full_name ?>" name="full_name" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Phone</label>
    <input type="text" class="form-control" value="<?= $data->phone ?>" name="phone" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Address</label>
    <input type="text" class="form-control" value="<?= $data->address ?>" name="address" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Born Place</label>
    <input type="text" class="form-control" value="<?= $data->born_place ?>" name="born_place" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Born Date</label>
    <input type="date" class="form-control" value="<?= $data->born_date ?>" name="born_date" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Gender</label>
    <select class="form-select" aria-label="Default select example" name="gender">
  <option selected>Open this select menu</option>
  <option value="L" <?php if( $data->gender== 'L' ){ echo "selected"; } ?>>Men</option>
  <option value="P"  <?php if( $data->gender== 'P' ){ echo "selected"; } ?>>Girl</option>
</select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">country</label>
    <input type="text" class="form-control" value="<?= $data->country ?>" name="country" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nationality</label>
    <input type="text" class="form-control" value="<?= $data->nationality ?>" name="nationality" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Is Active</label>
    <select class="form-select" aria-label="Default select example" name="is_active">
  <option selected>Open this select menu</option>
  <option value="1" <?php if( $data->is_active== '1' ){ echo "selected"; } ?>>ACTIVE</option>
  <option value="0"  <?php if( $data->is_active== '0' ){ echo "selected"; } ?>>NONE</option>
</select>
  </div>

  <input type="submit" value="submit">
</form>