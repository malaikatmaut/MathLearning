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
    <div class="slide-1"
        style="background-image: url('<?= base_url('assets/img/article/header/') . $article['image_header']; ?>');"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0"><?= $article['title']; ?></h1>
                            <p data-aos="fade-up" data-aos-delay="100"><?= date('d F Y', $article['date_created']); ?>
                                &bullet; <a href="#" class="text-white"><?= $total_comments; ?> comments</a></p>
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
                <div class="mb-5">
                    <p>
                        <?php

                        use s9e\TextFormatter\Bundles\Forum as TextFormatter;

                        $content = TextFormatter::parse($article['content']);
                        echo TextFormatter::render($content); ?>
                    </p>
                </div>

                <div class="pt-5">
                    <h3 class="mb-5"><?= $total_comments; ?> Comments</h3>
                    <ul class="comment-list">
                        <?php foreach ($comments as $c) : ?>
                        <li class="comment">
                            <div class="vcard bio">
                                <?php $user_comment = $this->db->get_where('user', ['email' => $c['user_email']])->row_array(); ?>
                                <?php if ($user_comment) : ?>
                                <img src="<?= base_url('assets/img/profile/' . $user_comment['image']); ?>"
                                    alt="Image placeholder">
                                <?php else : ?>
                                <img src="<?= base_url('assets/img/profile/'); ?>default.jpg" alt="Image placeholder">
                                <?php endif; ?>
                            </div>
                            <div class="comment-body">
                                <h3><?= $c['name']; ?></h3>
                                <div class="meta"><?= date('D, d M Y H:i:s', $c['date_created']) ?></div>
                                <p><?= $c['message'] ?></p>
                                <!-- <p><a href="#" class="reply">Reply</a></p> -->
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5" id="comment-section">
                        <h3>Leave a comment</h3>
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('article?id=' . $article['id']); ?>" method="POST"
                            class="p-5 bg-light">
                            <?php if ($menu_login == 'Login') : ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="text">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <?php elseif ($menu_login == 'Account') : ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?= $user['name'] ?>" readonly>
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= $user['email'] ?>" readonly>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" cols="30" rows="10"
                                    class="form-control"></textarea>
                                <?= form_error('message', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pl-lg-5">

                <div class="mb-5 text-center border rounded course-instructor">
                    <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Author</h3>
                    <div class="mb-4 text-center">
                        <img src="<?= base_url('assets/img/profile/') . $author['image']; ?>" alt="Image"
                            class="w-25 rounded-circle mb-4">
                        <h3 class="h5 text-black mb-4"><?= $author['name']; ?></h3>
                        <p><?= $author['email']; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="site-section courses-title bg-dark">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">More Articles</h2>
            </div>
        </div>
    </div>
</div>
<div class="site-section courses-entry-wrap" data-aos="fade" data-aos-delay="100">
    <div class="container">
        <div class="row">

            <div class="owl-carousel col-12 nonloop-block-14">
                <?php foreach ($more_article as $ma) : ?>
                <div class="course bg-white h-100 align-self-stretch">
                    <figure class="m-0">
                        <a href="<?= base_url('article?id=' . $ma['id']); ?>"><img
                                src="<?= base_url('assets/img/article/header/') . $ma['image_header'] ?>" alt="Image"
                                class="img-fluid" style="max-height: 12rem;"></a>
                    </figure>
                    <div class="course-inner-text py-4 px-4">
                        <div class="meta"><span class="icon-clock-o"></span><?= date('d F Y', $ma['date_created']); ?>
                        </div>
                        <h3 class="text-truncate"><a
                                href="<?= base_url('article?id=' . $ma['id']); ?>"><?= $ma['title'] ?></a></h3>
                    </div>
                    <div class="d-flex border-top stats">
                        <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>



        </div>
        <div class="row justify-content-center">
            <div class="col-7 text-center">
                <button class="customPrevBtn btn btn-primary m-1">Prev</button>
                <button class="customNextBtn btn btn-primary m-1">Next</button>
            </div>
        </div>
    </div>
</div>