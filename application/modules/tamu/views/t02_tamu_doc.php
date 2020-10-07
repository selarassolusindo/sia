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
        <h2>T02_tamu List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>TripNo</th>
		<th>TripTgl</th>
		<th>Nama</th>
		<th>MFC</th>
		<th>Country</th>
		<th>PackageNight</th>
		<th>PackageType</th>
		<th>CheckIn</th>
		<th>CheckOut</th>
		<th>Agent</th>
		<th>Status</th>
		<th>DaysStay</th>
		<th>Price</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($tamu_data as $tamu)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tamu->TripNo ?></td>
		      <td><?php echo $tamu->TripTgl ?></td>
		      <td><?php echo $tamu->Nama ?></td>
		      <td><?php echo $tamu->MFC ?></td>
		      <td><?php echo $tamu->Country ?></td>
		      <td><?php echo $tamu->PackageNight ?></td>
		      <td><?php echo $tamu->PackageType ?></td>
		      <td><?php echo $tamu->CheckIn ?></td>
		      <td><?php echo $tamu->CheckOut ?></td>
		      <td><?php echo $tamu->Agent ?></td>
		      <td><?php echo $tamu->Status ?></td>
		      <td><?php echo $tamu->DaysStay ?></td>
		      <td><?php echo $tamu->Price ?></td>
		      <td><?php echo $tamu->created_at ?></td>
		      <td><?php echo $tamu->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>