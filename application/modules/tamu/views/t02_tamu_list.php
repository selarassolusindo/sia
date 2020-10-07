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
        <h2 style="margin-top:0px">T02_tamu List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('tamu/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('tamu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('tamu'); ?>" class="btn btn-default">Reset</a>
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
                <th rowspan="2">No.</th>
                <th colspan="2">Trip</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">MFC</th>
        		<th rowspan="2">Country</th>
                <th colspan="2">Package</th>
                <th rowspan="2">CheckIn</th>
        		<th rowspan="2">CheckOut</th>
                <th rowspan="2">Agent</th>
                <th rowspan="2">Status</th>
                <th rowspan="2">DaysStay</th>
                <th rowspan="2">Price</th>
                <th rowspan="2">Action</th>
            </tr>
            <tr>
                <!-- <th>No</th> -->
        		<th>No.</th>
        		<th>Tgl.</th>
        		<th>Night</th>
        		<th>Type</th>
        		<!-- <th>Created At</th>
        		<th>Updated At</th> -->
            </tr>
            <?php
            foreach ($tamu_data as $tamu)
            {
                ?>
                <tr>
        			<td><?php echo ++$start ?></td>
        			<td><?php echo $tamu->TripNo ?></td>
        			<td><?php echo shortDateIndo($tamu->TripTgl) ?></td>
        			<td><?php echo $tamu->Nama ?></td>
        			<td><?php echo $tamu->MFC ?></td>
        			<td><?php echo $tamu->Country ?></td>
        			<td><?php echo $tamu->PackageNight ?></td>
        			<td><?php echo $tamu->PackageType ?></td>
        			<td><?php echo shortDateIndo($tamu->CheckIn) ?></td>
        			<td><?php echo shortDateIndo($tamu->CheckOut) ?></td>
        			<td><?php echo $tamu->Agent ?></td>
        			<td><?php echo $tamu->Status ?></td>
        			<td><?php echo $tamu->DaysStay ?></td>
        			<td><?php echo numIndo($tamu->Price) ?></td>
        			<!-- <td><?php //echo $tamu->created_at ?></td>
        			<td><?php //echo $tamu->updated_at ?></td> -->
        			<td style="text-align:center" width="200px">
        				<?php
        				echo anchor(site_url('tamu/read/'.$tamu->idtamu),'Read');
        				echo ' | ';
        				echo anchor(site_url('tamu/update/'.$tamu->idtamu),'Update');
        				echo ' | ';
        				echo anchor(site_url('tamu/delete/'.$tamu->idtamu),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
		<?php echo anchor(site_url('tamu/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('tamu/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
