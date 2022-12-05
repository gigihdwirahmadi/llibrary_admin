<?php
if (validation_errors() != false) {
?>
  <div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
  </div>
<?php
}

?>

<form action="<?= base_url('index.php/membertrx/add')?>" method="post" enctype="multipart/form-data" class="needa-validation">
  <div class="mb-3">
  <input type="hidden" name="id" >
    <label for="exampleFormControlInput1" class="form-label">Member</label>
    <select name="member_id" class="form-control">
      <?php foreach ($member as $v) { ?>
        <option value=<?php echo ($v->id) ?>><?php echo ($v->full_name)  ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Subscription</label>
    <select name="subs_id" class="form-control">
    <option value="selected" selected>Select menu</option>
      <?php foreach ($subscription as $v) { ?>
        <option value=<?php echo ($v->id) ?>><?php echo ($v->title)  ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Note</label>
    <input type="text" class="form-control" name="note" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">active at</label>
    <input type="date" class="form-control"  name="active_at" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Status</label>
    <select class="form-select" aria-label="Default select example" name="status">
  <option selected>Open this select menu</option>
  <option value="paid"  >paid</option>
  <option value="unpaid" >unpaid</option>
</select>
  </div>

  <input type="submit" value="submit">
</form>