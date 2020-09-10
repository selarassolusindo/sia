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
        <h2>T01_company List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Kota</th>
		
            </tr><?php
            foreach ($t01_company_data as $t01_company) {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t01_company->Nama ?></td>
		      <td><?php echo $t01_company->Alamat ?></td>
		      <td><?php echo $t01_company->Kota ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>