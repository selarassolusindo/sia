<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T01_package Read</h2>
        <table class="table">
	    <tr><td>PackageName</td><td><?php echo $PackageName; ?></td></tr>
	    <tr><td>PackageCode</td><td><?php echo $PackageCode; ?></td></tr>
	    <tr><td>SN3LN</td><td><?php echo $SN3LN; ?></td></tr>
	    <tr><td>SN6LN</td><td><?php echo $SN6LN; ?></td></tr>
	    <tr><td>SNELN</td><td><?php echo $SNELN; ?></td></tr>
	    <tr><td>PN1LN</td><td><?php echo $PN1LN; ?></td></tr>
	    <tr><td>PN1DN</td><td><?php echo $PN1DN; ?></td></tr>
	    <tr><td>SN3C</td><td><?php echo $SN3C; ?></td></tr>
	    <tr><td>SN3CP</td><td><?php echo $SN3CP; ?></td></tr>
	    <tr><td>SN6C</td><td><?php echo $SN6C; ?></td></tr>
	    <tr><td>SN6CP</td><td><?php echo $SN6CP; ?></td></tr>
	    <tr><td>SNEC</td><td><?php echo $SNEC; ?></td></tr>
	    <tr><td>SNECP</td><td><?php echo $SNECP; ?></td></tr>
	    <tr><td>PN3C</td><td><?php echo $PN3C; ?></td></tr>
	    <tr><td>PN3CP</td><td><?php echo $PN3CP; ?></td></tr>
	    <tr><td>PN6C</td><td><?php echo $PN6C; ?></td></tr>
	    <tr><td>PN6CP</td><td><?php echo $PN6CP; ?></td></tr>
	    <tr><td>PNEC</td><td><?php echo $PNEC; ?></td></tr>
	    <tr><td>PNECP</td><td><?php echo $PNECP; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('package') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>