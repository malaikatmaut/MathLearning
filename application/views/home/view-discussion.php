<header class="site-navbar bg-primary py-3 js-sticky-header site-navbar-target" role="banner">
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

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mb-2 mt-4">
                <div class="mb-5">
                    <h1 data-aos="fade-up" data-aos-delay="0"><?= $discussion['title']; ?></h1>
                    <p data-aos="fade-up" data-aos-delay="100">
                        <?= date('d F Y', $discussion['date_created']); ?>
                        &bullet;
                        <?= $author['name']; ?>
                    </p>
                </div>
                <div class="mb-5">
                    <p>
                        <?php

                        use s9e\TextFormatter\Bundles\Forum as TextFormatter;

                        $description = TextFormatter::parse($discussion['description']);
                        echo TextFormatter::render($description); ?>
                    </p>
                </div>
                <div class="pt-5">
                    <h3 class="mb-5"><?= $total_answers; ?> Answers</h3>
                    <ul class="comment-list">
                        <?php foreach ($answers as $ans) : ?>
                        <li class="comment">
                            <div class="vcard bio">
                                <?php $user_answer = $this->db->get_where('user', ['email' => $ans['user_email']])->row_array(); ?>
                                <img src="<?= base_url('assets/img/profile/' . $user_answer['image']); ?>"
                                    alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3><?= $user_answer['name']; ?></h3>
                                <div class="meta"><?= date('D, d M Y H:i:s', $ans['date_created']) ?></div>
                                <p><?= $ans['answer'] ?></p>
                                <!-- <p><a href="#" class="reply">Reply</a></p> -->
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5" id="comment-section">
                        <h3>Leave an answer</h3>
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('discussion?id=' . $discussion['id']) ?>" method="POST"
                            class="p-3 bg-light">
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea id="answer" name="answer" cols="30" rows="10" class="form-control"></textarea>
                                <?= form_error('answer', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Answer" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>