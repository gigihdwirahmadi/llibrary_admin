<?php
if (validation_errors() != false) {
?>
  <div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
  </div>
<?php
}

?>

<form action="<?= base_url('index.php/booktrx/add') ?>" method="post" id="form" enctype="multipart/form-data" class="needa-validation">
  <div class="mb-3">

    <label for="exampleFormControlInput1" class="form-label">Member</label>
    <select name="member_id" class="form-control">
      <?php foreach ($members as $v) { ?>
        <option value=<?php echo ($v->id) ?>  <?php if($v->id==$booktrx->member_id){ echo "selected ";}?>><?php echo ($v->full_name)  ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="mb-3">
    <?php foreach($data as $key=>$value) { ?>
      <label for="exampleFormControlInput1" class="form-label">Book</label>
      <select name='book'.$n class="form-control">
        <option selected>Select menu</option> 
        <?php foreach ($book as $v) { ?>
          <option value=<?php echo ($v->id) ?>  <?php if($v->id==$value->id_book){ echo "selected ";}?>class="form-control"><?php echo ($v->title)  ?></option>
        <?php } ?>
      </select>
  </div>
<?php } ?>
<div id="formbook"></div>

<input type="submit" value="submit">
</form>
<script>
  function addbook() {
    let par = document.getElementById("formbook");
    let num = document.getElementById("number").value;
    let text;
    console.log(num)
    for (let n = 1; n <= num; n++) {
      text += `<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Member</label>
<select  name="book${n}"  class="form-control">
<option  selected>Select menu</option>
  <?php foreach ($book as $v) { ?>
    <option value=<?php echo ($v->id) ?>  class="form-control"><?php echo ($v->title)  ?></option>
  <?php } ?>
</select>
</div>`
    }
    par.innerHTML = text;
  }
</script>