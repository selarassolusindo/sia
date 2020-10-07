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
        <h2>T01_package List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>PackageName</th>
		<th>PackageCode</th>
		<th>SN3LN</th>
		<th>SN6LN</th>
		<th>SNELN</th>
		<th>PN1LN</th>
		<th>PN1DN</th>
		<th>SN3C</th>
		<th>SN3CP</th>
		<th>SN6C</th>
		<th>SN6CP</th>
		<th>SNEC</th>
		<th>SNECP</th>
		<th>PN3C</th>
		<th>PN3CP</th>
		<th>PN6C</th>
		<th>PN6CP</th>
		<th>PNEC</th>
		<th>PNECP</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($package_data as $package)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $package->PackageName ?></td>
		      <td><?php echo $package->PackageCode ?></td>
		      <td><?php echo $package->SN3LN ?></td>
		      <td><?php echo $package->SN6LN ?></td>
		      <td><?php echo $package->SNELN ?></td>
		      <td><?php echo $package->PN1LN ?></td>
		      <td><?php echo $package->PN1DN ?></td>
		      <td><?php echo $package->SN3C ?></td>
		      <td><?php echo $package->SN3CP ?></td>
		      <td><?php echo $package->SN6C ?></td>
		      <td><?php echo $package->SN6CP ?></td>
		      <td><?php echo $package->SNEC ?></td>
		      <td><?php echo $package->SNECP ?></td>
		      <td><?php echo $package->PN3C ?></td>
		      <td><?php echo $package->PN3CP ?></td>
		      <td><?php echo $package->PN6C ?></td>
		      <td><?php echo $package->PN6CP ?></td>
		      <td><?php echo $package->PNEC ?></td>
		      <td><?php echo $package->PNECP ?></td>
		      <td><?php echo $package->created_at ?></td>
		      <td><?php echo $package->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>