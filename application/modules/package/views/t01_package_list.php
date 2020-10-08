<!-- <!doctype html>
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
        <h2 style="margin-top:0px">T01_package List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('package/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('package/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('package'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th rowspan="3">No</th>
                <th colspan="2" rowspan="2">Package</th>
                <th colspan="3">SSW Price</th>
                <th colspan="2">PIW Price</th>
                <th rowspan="3">Action</th>
            </tr>
            <tr>
                <th>3 Night</th>
                <th>6 Night</th>
                <th>Extend /Night</th>
                <th colspan="2">1 Night</th>
            </tr>
            <tr>
            	<th>Name</th>
            	<th>Code</th>
                <th>LN</th>
                <th>LN</th>
                <th>LN</th>
                <th>LN</th>
                <th>DN</th>
            	<!-- <th>SN3C</th>
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
            	<th>PNECP</th> -->
            	<!-- <th>Created At</th>
            	<th>Updated At</th> -->

            </tr>
            <?php
            foreach ($package_data as $package) {
            ?>
            <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $package->PackageName ?></td>
    			<td><?php echo $package->PackageCode ?></td>
    			<td align="right">USD <?php echo numIndo($package->SN3LN) ?></td>
    			<td align="right">USD <?php echo numIndo($package->SN6LN) ?></td>
    			<td align="right">USD <?php echo numIndo($package->SNELN) ?></td>
    			<td align="right">USD <?php echo numIndo($package->PN1LN) ?></td>
    			<td align="right">IDR <?php echo numIndo($package->PN1DN) ?></td>
    			<!-- <td><?php echo $package->SN3C ?></td>
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
    			<td><?php echo $package->PNECP ?></td> -->
    			<!-- <td><?php echo $package->created_at ?></td>
    			<td><?php echo $package->updated_at ?></td> -->
    			<td style="text-align:center" width="200px">
    				<?php
    				echo anchor(site_url('package/read/'.$package->idprice),'Read');
    				echo ' | ';
    				echo anchor(site_url('package/update/'.$package->idprice),'Update');
    				echo ' | ';
    				echo anchor(site_url('package/delete/'.$package->idprice),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
    				?>
    			</td>
    		</tr>
            <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('package/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('package/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
