<div class="content">
            <div class="top bg-white" style="font-weight:bold;padding-left:20px;display:grid; align-items:center">
                MEMBER TRANSACTION
            </div>
            <div class="bottom">
<table class="table">
<a href="<?= base_url('index.php/membertrx/add')?>" class="btn btn-primary"> tambah</a>
    <tr>
      <th scope="col">No</th>
      <th scope="col">fullname</th>
      <th scope="col">Adress</th>
      <th scope="col">title</th>
      <th scope="col">price</th>
      <th scope="col">trx date</th>
      <th scope="col">active at</th>
      <th scope="col">expire at</th>
      <th scope="col">note</th>
      <th scope="col">status</th>
      <th scope="col">options</th>
    </tr>

    <tr>
        <?php 
        $no=1;
        foreach($membertrx as $key=>$data) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $data->full_name ?></td>
                <td><?= $data->address ?></td>
                <td><?= $data->title?></td>
                <td><?= $data->price ?></td>
                <td><?= $data->trx_date?></td>
                <td><?= $data->active_at ?></td>
                <td><?= $data->expire_at ?></td>
                <td><?= $data->statustrx ?></td>
                <td><?= $data->note ?></td>
                
                <td><a href="<?= base_url('index.php/membertrx/edit/'.$data->idtrx)?>" class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
                <a href="<?= base_url('index.php/membertrx/delete/'.$data->idtrx)?>"class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>
        <?php } ?>
   <tr>

   </tr>

</table>
