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
        <h2 style="margin-top:0px">V03_sa List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sa'); ?>" class="btn btn-default">Reset</a>
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
                <th>No</th>
        		<!-- <th>Idsa</th> -->
        		<th>Akun</th>
        		<th>Debit</th>
        		<th>Kredit</th>
        		<!-- <th>C</th> -->
        		<th>Action</th>
            </tr>
            <?php
            foreach ($sa_data as $sa)
            {
            ?>
                <tr>
        			<td width="80px"><?php echo ++$start ?></td>
        			<!-- <td><?php //echo $sa->idsa ?></td> -->
        			<td><?php echo $sa->Kode . ' - ' . $sa->Nama ?></td>
        			<td align="right"><?php echo numIndo($sa->Debit) ?></td>
        			<td align="right"><?php echo numIndo($sa->Kredit) ?></td>
        			<!-- <td><?php //echo $sa->c ?></td> -->
        			<td style="text-align:center">
        				<?php
        				echo anchor(site_url('sa/read/'.$sa->idsa),'Read');
        				echo ' | ';
        				echo anchor(site_url('sa/update/'.$sa->idsa),'Update');
        				echo ' | ';
        				echo anchor(site_url('sa/delete/'.$sa->idsa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
        		<?php echo anchor(site_url('sa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        		<?php echo anchor(site_url('sa/word'), 'Word', 'class="btn btn-primary"'); ?>
    	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
