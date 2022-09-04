<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<section class="h-100 w-100" style="box-sizing: border-box; background-color: #f5f5f5">

    <div class="content-3-5 d-flex flex-column align-items-center h-100 flex-lg-row" style="font-family: 'Poppins', sans-serif">
        <div class="position-relative d-none d-lg-block h-100 width-left">
            <img class="position-absolute img-fluid centered" src="<?= base_url() ?>/home/images/login-final.png" alt="" />
        </div>
        <div class="d-flex mx-auto align-items-left justify-content-left width-right mx-lg-0">
            <div class="right mx-lg-0 mx-auto">
                <div class="align-items-center justify-content-center d-lg-none d-flex">
                    <img class="img-fluid" src="<?= base_url() ?>/home/images/login-final.png" alt="" />
                </div>
                <a href="/" class="green-bottom-caption text-decoration-none">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6484 20.0484C11.4234 20.2734 11.1182 20.3997 10.8 20.3997C10.4818 20.3997 10.1766 20.2734 9.9516 20.0484L2.7516 12.8484C2.52663 12.6234 2.40025 12.3182 2.40025 12C2.40025 11.6818 2.52663 11.3766 2.7516 11.1516L9.9516 3.9516C10.1779 3.73301 10.481 3.61206 10.7957 3.61479C11.1103 3.61753 11.4113 3.74373 11.6338 3.96622C11.8563 4.18871 11.9825 4.48968 11.9852 4.80432C11.9879 5.11895 11.867 5.42208 11.6484 5.6484L6.4968 10.8H20.4C20.7183 10.8 21.0235 10.9264 21.2485 11.1515C21.4736 11.3765 21.6 11.6817 21.6 12C21.6 12.3183 21.4736 12.6235 21.2485 12.8485C21.0235 13.0736 20.7183 13.2 20.4 13.2H6.4968L11.6484 18.3516C11.8734 18.5766 11.9997 18.8818 11.9997 19.2C11.9997 19.5182 11.8734 19.8234 11.6484 20.0484V20.0484Z" fill="#524EEE" />
                    </svg>
                    Homepage
                </a>
                <h3 class="title-text mt-3"><?= lang('Auth.forgotPassword') ?></h3>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form style="margin-top: 1.5rem" action="<?= route_to('forgot') ?>" method="post">
                    <?= csrf_field() ?>
                    <div style="margin-bottom: 1.75rem">
                        <label for="" class="d-block input-label"><?= lang('Auth.emailAddress') ?></label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 5C3.34315 5 2 6.34315 2 8V16C2 17.6569 3.34315 19 5 19H19C20.6569 19 22 17.6569 22 16V8C22 6.34315 20.6569 5 19 5H5ZM5.49607 7.13174C5.01655 6.85773 4.40569 7.02433 4.13168 7.50385C3.85767 7.98337 4.02427 8.59422 4.50379 8.86823L11.5038 12.8682C11.8112 13.0439 12.1886 13.0439 12.4961 12.8682L19.4961 8.86823C19.9756 8.59422 20.1422 7.98337 19.8682 7.50385C19.5942 7.02433 18.9833 6.85773 18.5038 7.13174L11.9999 10.8482L5.49607 7.13174Z" fill="#CACBCE" />
                            </svg>
                            <input class="input-field border-0 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" type="email" autocomplete="on" required />
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fill text-white d-block w-100" type="submit">
                        <?= lang('Auth.sendInstructions') ?>
                    </button>
                </form>
            </div>
        </div>
    </div>

</section>


<?= $this->endSection() ?>