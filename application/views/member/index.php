<div class="content">
            <div class="top bg-white" style="font-weight:bold;padding-left:20px;display:grid; align-items:center">
                MEMBER
            </div>
            <div class="bottom">
<table class="table">
<a href="<?= base_url('index.php/member/add')?>" class="btn btn-primary"> tambah</a>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIK</th>
      <th scope="col">Full Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Born Place</th>
      <th scope="col">Born Date</th>
      <th scope="col">Gender</th>
      <th scope="col">Country</th>
      <th scope="col">Nationality</th>
      <th scope="col">Status</th>
      <th scope="col">options</th>
    </tr>

    <tr>
        <?php 
        $no=1;
        foreach($member as $key=>$data) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $data->nik ?></td>
                <td><?= $data->full_name ?></td>
                <td><?= $data->phone?></td>
                <td><?= $data->address ?></td>
                <td><?= $data->born_place?></td>
                <td><?= $data->born_date ?></td>
                <td><?php if( $data->gender== 'L'){ echo "Men"; } else {echo "Girl";} ?></td>
                <td><?= $data->country ?></td>
                <td><?= $data->nationality ?></td>
                <td><?php if ($data->is_active == 1) {echo "ACTIVE";} else{
                    echo "NONACTIVE";
                }   ?></td>
                <td ><a href="<?= base_url('index.php/member/edit/'.$data->id)?>" class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
                <a href="<?= base_url('index.php/member/delete/'.$data->id)?>"class="btn btn-danger" style="margin-top:5px"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>
        <?php } ?>
   <tr>

   </tr>

</table>
