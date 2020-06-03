<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <a href="<?= base_url('user/addquestion') ?>" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add New Discussion</span>
            </a>
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <?php

            use s9e\TextFormatter\Bundles\Forum as TextFormatter; ?>
            <!-- Button trigger modal -->
            <?php foreach ($discussions as $d) : ?>
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="<?= base_url('discussion?id=') . $d['id'] ?>" class="text-decoration-none">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $d['title']; ?></h6>
                    </a>
                    <div class="dropdown no-arrow">
                        <?php if ($d['is_solved'] == 1) : ?>
                        <a href="#" class="btn btn-success btn-circle btn-sm text-decoration-none">
                            <i class="fas fa-check"></i>
                        </a>
                        <?php endif; ?>
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('user/editquestion?id=') . $d['id'] ?>">Edit</a>
                            <a class="dropdown-item"
                                href="<?= base_url('user/deletequestion?id=') . $d['id'] ?>">Delete</a>
                            <div class="dropdown-divider"></div>
                            <?php if ($d['is_solved'] == 0) : ?>
                            <a class="dropdown-item" href="<?= base_url('user/solvequestion?id=') . $d['id'] ?>">Mark as
                                solved</a>
                            <?php else : ?>
                            <a class="dropdown-item" href="<?= base_url('user/unsolvequestion?id=') . $d['id'] ?>">Mark
                                as
                                unsolved</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                        $description = TextFormatter::parse($d['description']);
                        echo TextFormatter::render($description);
                        ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->