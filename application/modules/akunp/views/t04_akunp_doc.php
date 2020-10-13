<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T04_akunp List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Induk</th>
		<th>Urut</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($akunp_data as $akunp)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $akunp->Kode ?></td>
		      <td><?php echo $akunp->Nama ?></td>
		      <td><?php echo $akunp->Induk ?></td>
		      <td><?php echo $akunp->Urut ?></td>
		      <td><?php echo $akunp->created_at ?></td>
		      <td><?php echo $akunp->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>