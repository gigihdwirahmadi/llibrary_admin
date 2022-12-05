<div class="content">
            <div class="top bg-white" style="font-weight:bold;padding-left:20px;display:grid; align-items:center">
                LIBRARIAN
            </div>
            <div class="bottom">
<table class="table">
<a href="<?= base_url('index.php/librarian/add')?>" class="btn btn-primary"> tambah</a>
    <tr>
      <th scope="col">no</th>
      <th scope="col">username</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">avatar</th>
      <th scope="col">created_at</th>
      <th scope="col">options</th>
    </tr>

    <tr>
        <?php 
        $no=1;
        foreach($librarians as $key=>$lib) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $lib->username ?></td>
                <td><?= $lib->name ?></td>
                <td><?= $lib->email ?></td>
                <td><img src="<?= base_url("/assets/img/$lib->avatar")?>" width="100px"></td>
                <td><?= $lib->created_at ?></td>
                <td><a href="<?= base_url('index.php/librarian/edit/'.$lib->id)?>" class="btn btn-success"><i class="fa-solid fa-pen"></i>
</a>
                <a href="<?= base_url('index.php/librarian/delete/'.$lib->id)?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>
        <?php } ?>
   <tr>

   </tr>

</table>
