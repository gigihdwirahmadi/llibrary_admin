<div class="content">
            <div class="top bg-white" style="font-weight:bold;padding-left:20px;display:grid; align-items:center">
                BOOK TRANSACTION
            </div>
            <div class="bottom">
<table class="table">
<a href="<?= base_url('index.php/Booktrx/add')?>" class="btn btn-dark"> tambah</a>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">pricetotal</th>
      <th scope="col">Book quantity</th>
      <th scope="col">note</th>
      <th scope="col">created at</th>
      <th scope="col">option</th>
    </tr>

    <tr>
        <?php 
        $no=1;
        foreach($Booktrx as $key=>$data) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $data->full_name ?></td>
                <td><?= $data->address ?></td>
                <td><?= $data->phone ?></td>
                <td><?= $data->pricetotal ?></td>
                <td><?= $data->bookquantity?></td>
                <td><?= $data->idh ?></td>
                <td><?= $data->tgl ?></td>
                <td><a href="<?= base_url('index.php/Booktrx/edit/'.$data->idh)?>"class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
                <a href="<?= base_url('index.php/Booktrx/delete/'.$data->idh)?>"class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
            </td>
            <td><form method="post" action="<?= base_url('index.php/Borrowdetail/index')?>"><input type="hidden" name="id" value="<?= $data->idh ?>">
            <input type="hidden" name="created_at" value="<?= $data->tgl ?>">
            <input type="submit" value="DETAILS" class="btn btn-dark">
            </form>                
            </td>
            </tr>
        <?php } ?>
   <tr>

   </tr>

</table>
