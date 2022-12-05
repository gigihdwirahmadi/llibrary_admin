
<?php 
    if(validation_errors() != false)
    {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
        </div>
        <?php
    }
    ?>
<div class="container"><form action="<?= base_url('index.php/librarian/add') ?>" method="post" enctype="multipart/form-data" class="needa-validation"> 
<div class="mb-3">

  <label for="exampleFormControlInput1" class="form-label">username</label>
  <input type="text" class="form-control" name="username" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">name</label>
  <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">email</label>
  <input type="text" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">password</label>
  <input type="text" class="form-control" name="password" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Avatar</label>
  <input type="file" class="form-control" name="avatar" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<input type="submit" value="submit" >
</form>
</div>