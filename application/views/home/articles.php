<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="site-logo mr-auto w-25">
                <a href="<?= base_url() ?>">MathLearning</a>
            </div>
            <div class="ml-auto w-25">
                <nav class="site-navigation position-relative text-right" role="banner">
                    <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                        <li class="cta">
                            <a href="<?= base_url('auth') ?>" class="nav-link">
                                <span><?= $menu_login; ?></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="intro-section single-cover" id="home-section">
    <div class="slide-1 " style="background-image: url('<?= base_url('assets/img/'); ?>img_5.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Articles</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5">
                <?php foreach ($articles as $a) : ?>
                <div class="card course mb-4" style="max-height: 200px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <a href="<?= base_url('article?id=' . $a['id']); ?>">
                                    <h5 class="card-title"><?= $a['title']; ?></h5>
                                </a>
                                <p class="card-text text-truncate">
                                    <?php $author = $this->db->get_where('user', ['email' => $a['author']])->row_array(); ?>
                                    <small class="text-muted"><?= $author['name']; ?></small>
                                    <small class="text-muted"><?= date('D, d M Y H:i:s', $a['date_created']) ?></small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <nav aria-label="Discussions Page Navigation">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">2</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="card course">
                            <a href="<?= base_url('user/addquestion') ?>">
                                <h3 class="text-center text-black text-uppercase h6 p-2">
                                    Add New Article
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-5 border rounded course-instructor">
                            <h3 class="text-center text-black text-uppercase h6 border-bottom pb-3">Categories</h3>
                            <div class="mb-4">
                                <p>Math</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>