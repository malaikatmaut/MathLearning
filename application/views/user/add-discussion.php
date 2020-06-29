<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/sceditor/minified/themes/modern.min.css" />
<script src="<?= base_url('assets/') ?>vendor/sceditor/minified/sceditor.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/sceditor/minified/icons/material.js"></script>
<script src="<?= base_url('assets/') ?>vendor/sceditor/minified/formats/bbcode.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="<?= base_url('user/addquestion') ?>">
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">Title</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="title" name="title"
                            value="<?= set_value('title'); ?>">
                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">Description</label>
                    <div class="col-lg-8">
                        <textarea type="text" class="form-control" id="descriptionText" name="description" cols="20"
                            rows="20" value="<?= set_value('description') ?>"></textarea>
                        <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">Category</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="category" name="category"
                            value="<?= set_value('category'); ?>">
                        <?= form_error('category', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
var textarea = document.getElementById('descriptionText');
sceditor.create(textarea, {
    format: "bbcode",
    icons: "material",
    style: "<?= base_url('assets/'); ?>vendor/sceditor/minified/themes/content/default.min.css"
});
</script>