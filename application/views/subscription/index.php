<div class="content">
            <div class="top bg-white" style="font-weight:bold;padding-left:20px;display:grid; align-items:center">
                SUBSCRIPTION
            </div>
            <div class="bottom">
<table class="table">
    <a href="<?= base_url('index.php/subscription/add') ?>" class="btn btn-primary"> tambah</a>
    <tr>
        <th scope="col">No</th>
        <th scope="col">title</th>
        <th scope="col">Month</th>
        <th scope="col">Price</th>
        <th scope="col">is active</th>
        <th scope="col">Created_at</th>
        <th scope="col">Option</th>
    </tr>

    <tr>
        <?php
        $no = 1;
        foreach ($subscription as $key => $data) { ?>
    <tr>
        <td><?= $no++ ?> </td>
        <td><?= $data->title ?></td>
        <td><?= $data->month ?></td>
        <td><?= $data->price ?></td>
        <td><?php if ($data->is_active == 1) {
                echo "ACTIVE";
            } else {
                echo "NONACTIVE";
            }   ?></td>
        <td><?= $data->created_at ?></td>
        <td><a href="<?= base_url('index.php/subscription/edit/' . $data->id) ?>" class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
            <a href="<?= base_url('index.php/subscription/delete/' . $data->id) ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
        </td>
    </tr>
<?php } ?>
<tr>

</tr>

</table>