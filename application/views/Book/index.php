<div class="content">
            <div class="top bg-white" style="font-weight:bold;padding-left:20px;display:grid; align-items:center">
                BOOK
            </div>
            <div class="bottom">
<table class="table">
<a href="<?= base_url('index.php/book/add')?>" class="btn btn-primary"> tambah</a>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Isbn</th>
      <th scope="col">Title</th>
      <th scope="col">Synopsis</th>
      <th scope="col">Author</th>
      <th scope="col">Publisher</th>
      <th scope="col">Category</th>
      <th scope="col">Language</th>
      <th scope="col">options</th>
    </tr>

    <tr>
        <?php 
        $no=1;
        foreach($book as $key=>$data) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $data->isbn ?></td>
                <td><?= $data->title ?></td>
                <td><?= $data->synopsis ?></td>
                <td><?= $data->author ?></td>
                <td><?= $data->publisher?></td>
                <td><?= $data->category ?></td>
                <td><?= $data->language ?></td>
                <td><a href="<?= base_url('index.php/book/edit/'.$data->id)?>"class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
                <a href="<?= base_url('index.php/book/delete/'.$data->id)?>"class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>
        <?php } ?>
   <tr>

   </tr>

</table>
