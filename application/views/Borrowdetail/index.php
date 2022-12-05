
  <div class="content">
            <div class="top bg-white" style="padding: 30px;">
            <div style="font-weight:bold">DETAIL BORROWED BOOK</div>
            <table class="table" style="margin-top:10px">
    <tr>
        <td>Name</td>
        <td><?= $data->full_name ?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?= $data->address ?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><?= $data->phone ?></td>
    </tr>
    <tr>
        <td>Quantity</td>
        <td><?= $data->bookquantity ?></td>
    </tr>
</table>
            </div>
            <div class="bottom">
<a href="<?= base_url('index.php/Booktrx/add')?>" class="btn btn-dark" style="margin-bottom:10px"> add</a>


<table class="table table-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">title</th>
      <th scope="col">isbn</th>
      <th scope="col">author</th>
      <th scope="col">publisher</th>
      <th scope="col">deadline_at</th>
      <th scope="col">note</th>
      <th scope="col">created at</th>
   
    
        
        <?php 
        $no=1;
        foreach($borrowdetail as $key=>$data) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $data->title ?></td>
                <td><?= $data->isbn ?></td>
                <td><?= $data->author ?></td>
                <td><?= $data->publisher ?></td>
                <td><?= $data->deadline_at?></td>
                <td><?= $data->note ?></td>
                <td><?= $data->created_at ?></td>
                <td><a href="<?= base_url('index.php/Borrowdetail/edit/'.$data->id)?>"class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
                <a href="<?= base_url('index.php/Borrowdetail/delete/'.$data->id)?>"class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>
        <?php } ?>
        </table>
 
