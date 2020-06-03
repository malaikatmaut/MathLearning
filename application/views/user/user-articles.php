<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>

            <a href="<?= base_url('user/addarticle') ?>" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add New Article</span>
            </a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image Header</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Views</th>
                        <?php if ($user['role_id'] == 1) : ?>
                        <th scope="col">Author</th>
                        <?php endif; ?>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($article as $a) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $a['title']; ?></td>
                        <td>
                            <img src="<?= base_url('assets/img/article/header/') . $a['image_header']; ?>"
                                class="img-thumbnail" style="height: 100px; width: auto;">
                        </td>
                        <td><?= date('d F Y', $a['date_created']); ?></td>
                        <td><?= $a['views']; ?></td>
                        <?php if ($user['role_id'] == 1) : ?>
                        <td><?= $a['author'] ?></td>
                        <?php endif; ?>

                        <td>
                            <a href="<?= base_url('article?id=') . $a['id'] ?>" class="btn btn-info btn-circle btn-sm"
                                title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= base_url('user/editarticle?id=') . $a['id'] ?>"
                                class="btn btn-primary btn-circle btn-sm" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="<?= base_url('user/deletearticle?id=') . $a['id'] ?>>"
                                class="btn btn-danger btn-circle btn-sm" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->