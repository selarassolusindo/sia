<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-sm-8 offset-2">
            <?php echo $this->session->flashdata('notif'); ?>
            <form method="post" action="<?php echo site_url('tamu/import_action'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="userfile">Import file Excel</label>
                    <input type="file" name="userfile" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
                <a href="<?php echo site_url('tamu') ?>" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
</div>
