
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

<form action="<?= base_url('index.php/librarian/edit/'.$data->id)?>" method="post" enctype="multipart/form-data" class="needa-validation"> 
<div class="mb-3">

  <label for="exampleFormControlInput1" class="form-label">username</label>
  <input type="text" class="form-control" value="<?= $data->username ?>" name="username" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">name</label>
  <input type="text" class="form-control" value="<?= $data->name ?>" name="name" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">email</label>
  <input type="text" class="form-control" value="<?= $data->email ?>" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">password</label>
  <input type="text" class="form-control" value="<?= $data->password ?>" name="password" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Avatar</label>
  <input type="file" class="form-control" value="<?= $data->avatar ?>"name="avatar" id="exampleFormControlInput1" placeholder="name@example.com">
</div>

<input type="submit" value="submit" >
</form>