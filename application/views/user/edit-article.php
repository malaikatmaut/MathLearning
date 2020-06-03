<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/sceditor/minified/themes/modern.min.css" />
<script src="<?= base_url('assets/') ?>vendor/sceditor/minified/sceditor.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/sceditor/minified/icons/material.js"></script>
<script src="<?= base_url('assets/') ?>vendor/sceditor/minified/formats/bbcode.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?= form_open_multipart('user/editarticle?id=' . $article['id']) ?>
            <div class="form-group row">
                <label for="name" class="col-sm-1 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $article['title'] ?>">
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-1 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="contentText" name="content" cols="50" rows="30">
                        <?= $article['content'] ?>
                    </textarea>
                    <?= form_error('content', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1">Image Header</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/article/header/') . $article['image_header']; ?>"
                                class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <div class="text-right text-muted">
                                <p>Max size: 2MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- SC Editor -->
<script>
var textarea = document.getElementById('contentText');
sceditor.create(textarea, {
    format: "bbcode",
    icons: "material",
    style: "<?= base_url('assets/'); ?>vendor/sceditor/minified/themes/content/default.min.css"
});
</script>