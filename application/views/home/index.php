<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>


<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="site-logo mr-auto w-25">
                <a href="<?= base_url() ?>">MathLearning</a>
            </div>

            <div class="mx-auto text-center">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                        <li><a href="#home-section" class="nav-link">Home</a></li>
                        <li><a href="#program-section" class="nav-link">Programs</a></li>
                        <li><a href="#article-section" class="nav-link">Article</a></li>
                        <li><a href="#discussion-section" class="nav-link">Discussion</a></li>
                        <li><a href="#contact-section" class="nav-link">Contact Us</a></li>
                    </ul>
                </nav>
            </div>

            <div class="ml-auto w-25">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                        <li class="cta">
                            <a href="<?= base_url('auth') ?>" class="nav-link">
                                <span><?= $menu_login; ?></span>
                            </a>
                            <?php if ($menu_login == 'Account') : ?>
                            <a href="<?= base_url('auth/logout') ?>" class="nav-link pl-0">
                                Logout
                            </a>
                            <?php endif; ?>
                        </li>

                    </ul>
                </nav>
                <a href="#"
                    class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span
                        class="icon-menu h3"></span></a>
            </div>
        </div>
    </div>

</header>

<div class="intro-section" id="home-section">

    <div class="slide-1" style="background-image: url('<?= base_url('assets/') ?>img/hero_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4">
                            <h1 data-aos="fade-up" data-aos-delay="100">Learn From The Everyone</h1>
                            <p class="mb-4" data-aos="fade-up" data-aos-delay="200">Let's join various
                                mathematical activists</p>
                            <p data-aos="fade-up" data-aos-delay="300"><a href="<?= base_url('auth/register') ?>"
                                    class="btn btn-primary py-3 px-5 btn-pill">Register Now</a></p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="site-section" id="program-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Our Programs</h2>
                <p>We have various forms of teaching programs that are tailored to your needs. Find your best
                    way here.</p>
            </div>
        </div>
        <div class="row mb-5 align-items-center">
            <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= base_url('assets/') ?>img/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-black mb-4">The best learning videos</h2>
                <p class="mb-4">Watch a variety of learning videos that have been provided from various sources.
                </p>
            </div>
        </div>

        <div class="row mb-5 align-items-center">
            <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= base_url('assets/') ?>img/undraw_teaching.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-black mb-4">Good Explanation</h2>
                <p class="mb-4">We provide a variety of articles with very good explanations. So it is easy to
                    understand and apply</p>
            </div>
        </div>

        <div class="row mb-5 align-items-center">
            <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= base_url('assets/') ?>img/undraw_teacher.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-black mb-4">Everywhere and Everytime</h2>
                <p class="mb-4">Ask your math questions and discuss them together in the forum when and wherever
                    you are!</p>

            </div>
        </div>

    </div>
</div>

<!-- Article Section -->
<div class="site-section courses-title" id="article-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Article</h2>
            </div>
        </div>
    </div>
</div>
<div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="row">

            <div class="owl-carousel col-12 nonloop-block-14">
                <?php foreach ($article as $a) : ?>
                <div class="course bg-white h-100 align-self-stretch">
                    <figure class="m-0">
                        <a href="<?= base_url('article?id=' . $a['id']); ?>"><img
                                src="<?= base_url('assets/img/article/header/') . $a['image_header'] ?>" alt="Image"
                                class="img-fluid" style="max-height: 12rem;"></a>
                    </figure>
                    <div class="course-inner-text py-4 px-4">
                        <div class="meta"><span class="icon-clock-o"></span><?= date('d F Y', $a['date_created']); ?>
                        </div>
                        <h3><a href="<?= base_url('article?id=' . $a['id']); ?>"><?= $a['title'] ?></a></h3>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-7 text-center">
                <button class="customPrevBtn btn btn-primary m-1">Prev</button>
                <button class="customNextBtn btn btn-primary m-1">Next</button>
                <p><a href="<?= base_url('articles') ?>">Browse Articles &rarr;</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Discussion Section -->
<div class="site-section" id="discussion-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Discussions</h2>
                <p class="mb-5">Ask your math questions and discuss them together in the forum. Find your best
                    answers with us.</p>
                <p><a href="<?= base_url('discussions') ?>">Browse Discussions &rarr;</a></p>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-image overlay" style="background-image: url('<?= base_url('assets/') ?>img/slider_1.jpg');">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 text-center testimony">
                <img src="<?= base_url('assets/img/') ?>GK_Chesterton.jpg" alt="Image"
                    class="img-fluid w-25 mb-4 rounded-circle">
                <h3 class="mb-4">G.K. Chesterton</h3>
                <blockquote>
                    <p>&ldquo; The difference between the poet and the mathematician is that the poet tries to get his
                        head into the heavens while the mathematician tries to get the heavens into his head. &rdquo;
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
</div>


<div class="site-section bg-light" id="contact-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="section-title mb-3">Message Us</h2>
                <p class="mb-5"></p>
                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('home') ?>" method="post" data-aos="fade">

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Full Name" id="name" name="name"
                                value="<?= set_value('name') ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Email" id="email" name="email"
                                value="<?= set_value('email') ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Subject" id="subject" name="subject"
                                value="<?= set_value('subject') ?>">
                            <?= form_error('subject', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea class="form-control" id="message" name="message"
                                value="<?= set_value('message') ?>" cols="30" rows="10"
                                placeholder="Write your message here."></textarea>
                            <?= form_error('message', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill"
                                value="Send Message">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>