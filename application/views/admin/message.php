<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-12">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($message as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['email']; ?></td>
                        <td><?= $m['subject']; ?></td>
                        <td><?= $m['message']; ?></td>
                        <td><?= date('d F Y', $m['date_created']); ?></td>
                        <td>
                            <a href="" class="btn btn-primary btn-circle btn-sm">
                                <i class="fas fa-reply"></i>
                            </a>
                            <?php if ($m['is_read'] == 0) : ?>
                            <a href="<?= base_url('admin/readmsg?id=') . $m['id']; ?>"
                                class="btn btn-success btn-circle btn-sm" title="Mark as Read">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <?php else : ?>
                            <a href="<?= base_url('admin/readmsg?id=') . $m['id']; ?>"
                                class="btn btn-success btn-circle btn-sm" title="Mark as Unread">
                                <i class="fas fa-envelope-open"></i>
                            </a>
                            <?php endif; ?>
                            <a href="<?= base_url('admin/deletemsg?id=') . $m['id']; ?>"
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