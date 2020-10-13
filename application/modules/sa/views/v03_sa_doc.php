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
        <h2>V03_sa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idsa</th>
		<th>Idakun</th>
		<th>Debit</th>
		<th>Kredit</th>
		<th>C</th>
		
            </tr><?php
            foreach ($sa_data as $sa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sa->idsa ?></td>
		      <td><?php echo $sa->idakun ?></td>
		      <td><?php echo $sa->Debit ?></td>
		      <td><?php echo $sa->Kredit ?></td>
		      <td><?php echo $sa->c ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>