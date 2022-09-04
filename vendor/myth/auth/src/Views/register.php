<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>


<section class="h-100 w-100" style="box-sizing: border-box; background-color: #f5f5f5">

    <div class="content-3-5 d-flex flex-column align-items-center h-100 flex-lg-row" style="font-family: 'Poppins', sans-serif">
        <div class="position-relative d-none d-lg-block h-100 width-left">
            <img class="position-absolute img-fluid centered-regis" src="<?= base_url() ?>/home/images/login-final.png" alt="" />
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
                <?= view('Myth\Auth\Views\_message_block') ?>
                <h3 class="title-text mt-3"><?= lang('Auth.register') ?></h3>
                <form style="margin-top: 1.5rem" action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div style="margin-bottom: 1.75rem">
                        <label for="" class="d-block input-label">Full Name</label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.00001 7.8C9.95479 7.8 10.8705 7.42071 11.5456 6.74558C12.2207 6.07045 12.6 5.15478 12.6 4.2C12.6 3.24522 12.2207 2.32955 11.5456 1.65441C10.8705 0.979283 9.95479 0.599998 9.00001 0.599998C8.04523 0.599998 7.12955 0.979283 6.45442 1.65441C5.77929 2.32955 5.40001 3.24522 5.40001 4.2C5.40001 5.15478 5.77929 6.07045 6.45442 6.74558C7.12955 7.42071 8.04523 7.8 9.00001 7.8V7.8ZM0.600006 18.6C0.600006 17.4969 0.817279 16.4046 1.23942 15.3855C1.66156 14.3663 2.2803 13.4403 3.06031 12.6603C3.84032 11.8803 4.76633 11.2616 5.78547 10.8394C6.8046 10.4173 7.8969 10.2 9.00001 10.2C10.1031 10.2 11.1954 10.4173 12.2145 10.8394C13.2337 11.2616 14.1597 11.8803 14.9397 12.6603C15.7197 13.4403 16.3385 14.3663 16.7606 15.3855C17.1827 16.4046 17.4 17.4969 17.4 18.6H0.600006Z" fill="#CACBCE" />
                            </svg>
                            <input class="input-field border-0<?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" placeholder="Fullname" value="<?= old('fullname') ?>" type="text" autocomplete="on" required />
                            <?php $user_code = 'user' . bin2hex(random_bytes(4)) ?>
                            <input type="hidden" name="user_code" value="<?= $user_code ?>">
                        </div>
                    </div>
                    <div style="margin-bottom: 1.75rem">
                        <label for="" class="d-block input-label"><?= lang('Auth.username') ?></label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0916 7.19625C16.1303 6.19553 14.9168 5.49864 13.5913 5.18615C12.2658 4.87365 10.8825 4.95831 9.60123 5.43033C8.31998 5.90236 7.19314 6.74248 6.35098 7.85356C5.50883 8.96465 4.98575 10.3013 4.84222 11.7091C4.6987 13.1168 4.94058 14.5381 5.53991 15.8086C6.13925 17.0792 7.07155 18.1471 8.22904 18.8889C9.38653 19.6308 10.7219 20.0162 12.0809 20.0007C13.4398 19.9852 14.7668 19.5693 15.9084 18.8013C16.0406 18.7069 16.1895 18.641 16.3465 18.6076C16.5035 18.5741 16.6653 18.5737 16.8224 18.6065C16.9795 18.6392 17.1288 18.7044 17.2613 18.7982C17.3939 18.892 17.507 19.0125 17.5941 19.1526C17.6813 19.2927 17.7406 19.4495 17.7686 19.6138C17.7965 19.7782 17.7927 19.9467 17.7571 20.1095C17.7216 20.2722 17.6551 20.4259 17.5616 20.5615C17.4681 20.697 17.3495 20.8117 17.2128 20.8987C15.4209 22.1058 13.2939 22.6564 11.168 22.4638C9.04209 22.2711 7.03839 21.3462 5.47345 19.8349C3.90852 18.3237 2.87157 16.3125 2.52641 14.1189C2.18126 11.9253 2.54758 9.67441 3.56751 7.72188C4.58744 5.76935 6.20283 4.22647 8.15848 3.33697C10.1141 2.44747 12.2985 2.26207 14.3666 2.81005C16.4347 3.35804 18.2686 4.60817 19.5785 6.36296C20.8884 8.11774 21.5997 10.2771 21.6 12.5C21.6002 13.1965 21.4142 13.8794 21.0628 14.4719C20.7114 15.0645 20.2085 15.5435 19.6105 15.8551C19.0125 16.1667 18.343 16.2986 17.677 16.2361C17.011 16.1736 16.3749 15.9192 15.84 15.5012C15.1562 16.451 14.1702 17.1163 13.0586 17.3781C11.9469 17.64 10.7821 17.4812 9.77256 16.9303C8.763 16.3794 7.97456 15.4722 7.54832 14.3712C7.12209 13.2701 7.08587 12.047 7.44614 10.9207C7.80641 9.79438 8.53967 8.83834 9.51472 8.22365C10.4898 7.60895 11.643 7.37571 12.768 7.56566C13.893 7.75561 14.9165 8.35635 15.6552 9.2604C16.3939 10.1644 16.7997 11.3128 16.8 12.5C16.8 12.8315 16.9264 13.1495 17.1515 13.3839C17.3765 13.6183 17.6817 13.75 18 13.75C18.3183 13.75 18.6235 13.6183 18.8485 13.3839C19.0736 13.1495 19.2 12.8315 19.2 12.5C19.2 10.5787 18.4968 8.6625 17.0916 7.19625ZM14.4 12.5C14.4 11.837 14.1472 11.2011 13.6971 10.7322C13.247 10.2634 12.6365 10 12 10C11.3635 10 10.753 10.2634 10.303 10.7322C9.85286 11.2011 9.60001 11.837 9.60001 12.5C9.60001 13.163 9.85286 13.7989 10.303 14.2678C10.753 14.7366 11.3635 15 12 15C12.6365 15 13.247 14.7366 13.6971 14.2678C14.1472 13.7989 14.4 13.163 14.4 12.5Z" fill="#CACBCE" />
                            </svg>
                            <input class="input-field border-0 <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" type="text" autocomplete="on" required />
                        </div>
                    </div>
                    <div style="margin-bottom: 1.75rem">
                        <label for="" class="d-block input-label">Class</label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.8484 2.7516C12.6234 2.52664 12.3182 2.40026 12 2.40026C11.6818 2.40026 11.3766 2.52664 11.1516 2.7516L2.75159 11.1516C2.533 11.3779 2.41205 11.681 2.41478 11.9957C2.41751 12.3103 2.54372 12.6113 2.76621 12.8338C2.9887 13.0563 3.28967 13.1825 3.60431 13.1852C3.91894 13.1879 4.22207 13.067 4.44839 12.8484L4.79999 12.4968V20.4C4.79999 20.7183 4.92642 21.0235 5.15146 21.2485C5.3765 21.4736 5.68173 21.6 5.99999 21.6H8.39999C8.71825 21.6 9.02347 21.4736 9.24852 21.2485C9.47356 21.0235 9.59999 20.7183 9.59999 20.4V18C9.59999 17.6817 9.72642 17.3765 9.95146 17.1515C10.1765 16.9264 10.4817 16.8 10.8 16.8H13.2C13.5182 16.8 13.8235 16.9264 14.0485 17.1515C14.2736 17.3765 14.4 17.6817 14.4 18V20.4C14.4 20.7183 14.5264 21.0235 14.7515 21.2485C14.9765 21.4736 15.2817 21.6 15.6 21.6H18C18.3182 21.6 18.6235 21.4736 18.8485 21.2485C19.0736 21.0235 19.2 20.7183 19.2 20.4V12.4968L19.5516 12.8484C19.7779 13.067 20.081 13.1879 20.3957 13.1852C20.7103 13.1825 21.0113 13.0563 21.2338 12.8338C21.4563 12.6113 21.5825 12.3103 21.5852 11.9957C21.5879 11.681 21.467 11.3779 21.2484 11.1516L12.8484 2.7516V2.7516Z" fill="#CACBCE" />
                            </svg>
                            <select id="yourClass" class="input-field border-0" placeholder="class" name="kelas">
                                <option selected disabled>Select one</option>
                                <option value="12">12</option>
                                <option value="11">11</option>
                                <option value="10">10</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom: 1.75rem">
                        <label for="" class="d-block input-label">Vocational</label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.4728 2.49599C12.3234 2.43195 12.1625 2.39893 12 2.39893C11.8374 2.39893 11.6766 2.43195 11.5272 2.49599L3.12716 6.09599C2.91069 6.18821 2.72611 6.34203 2.59637 6.53832C2.46663 6.7346 2.39746 6.9647 2.39746 7.19999C2.39746 7.43528 2.46663 7.66538 2.59637 7.86167C2.72611 8.05796 2.91069 8.21178 3.12716 8.30399L6.29996 9.66119C6.41773 9.52799 6.56365 9.42264 6.72716 9.35279L11.5272 7.29599C11.6724 7.23126 11.8291 7.19603 11.9881 7.19237C12.147 7.18872 12.3052 7.21669 12.4532 7.27468C12.6013 7.33267 12.7364 7.41951 12.8506 7.53016C12.9648 7.6408 13.0559 7.77305 13.1186 7.91921C13.1812 8.06537 13.2142 8.22252 13.2156 8.38154C13.217 8.54056 13.1868 8.69827 13.1267 8.84551C13.0666 8.99274 12.9779 9.12656 12.8656 9.23919C12.7533 9.35183 12.6198 9.44102 12.4728 9.50159L9.20036 10.9056L11.5284 11.9028C11.6776 11.9667 11.8382 11.9996 12.0006 11.9996C12.1629 11.9996 12.3235 11.9667 12.4728 11.9028L20.8728 8.30279C21.0885 8.21023 21.2724 8.05642 21.4016 7.8604C21.5308 7.66438 21.5996 7.43476 21.5996 7.19999C21.5996 6.96522 21.5308 6.73561 21.4016 6.53959C21.2724 6.34357 21.0885 6.18975 20.8728 6.09719L12.4728 2.49719V2.49599ZM3.97196 11.2764L5.99996 12.144V17.0664C5.58446 16.9719 5.16372 16.9022 4.73996 16.8576C4.46653 16.8289 4.21126 16.7071 4.01686 16.5127C3.82245 16.3183 3.7007 16.063 3.67196 15.7896C3.51415 14.2787 3.61561 12.7519 3.97196 11.2752V11.2764ZM11.16 19.8876C10.3488 19.0917 9.41738 18.4283 8.39996 17.922V13.1736L10.5816 14.1096C11.0298 14.3017 11.5123 14.4008 12 14.4008C12.4876 14.4008 12.9702 14.3017 13.4184 14.1096L20.028 11.2764C20.3864 12.7528 20.4879 14.2799 20.328 15.7908C20.2992 16.0642 20.1775 16.3195 19.9831 16.5139C19.7887 16.7083 19.5334 16.8301 19.26 16.8588C16.839 17.1132 14.5758 18.1809 12.84 19.8876C12.6156 20.1075 12.3141 20.2306 12 20.2306C11.6859 20.2306 11.3843 20.1075 11.16 19.8876V19.8876ZM7.19996 21.6C7.51822 21.6 7.82344 21.4736 8.04849 21.2485C8.27353 21.0235 8.39996 20.7183 8.39996 20.4V17.922C7.63676 17.5428 6.83107 17.256 5.99996 17.0676V20.4C5.99996 20.7183 6.12639 21.0235 6.35143 21.2485C6.57647 21.4736 6.8817 21.6 7.19996 21.6Z" fill="#CACBCE" />
                            </svg>
                            <select id="vocational" class="input-field border-0" placeholder="Vocational" name="jurusan">
                                <option selected disabled>Select one</option>
                                <option value="akl1">AKL 1</option>
                                <option value="akl2">AKL 2</option>
                                <option value="akl3">AKL 3</option>
                                <option value="akl4">AKL 4</option>
                                <option value="akl5">AKL 5</option>
                                <option value="bdp1">BDP 1</option>
                                <option value="bdp2">BDP 2</option>
                                <option value="bdp3">BDP 3</option>
                                <option value="otkp1">OTKP 1</option>
                                <option value="otkp2">OTKP 2</option>
                                <option value="otkp3">OTKP 3</option>
                                <option value="otkp4">OTKP 4</option>
                                <option value="mm1">MM 1</option>
                                <option value="mm2">MM 2</option>
                                <option value="tkj1">TKJ 1</option>
                                <option value="tkj2">TKJ 2</option>
                                <option value="umum">Umum</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom: 1.75rem">
                        <label for="" class="d-block input-label"><?= lang('Auth.email') ?></label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 5C3.34315 5 2 6.34315 2 8V16C2 17.6569 3.34315 19 5 19H19C20.6569 19 22 17.6569 22 16V8C22 6.34315 20.6569 5 19 5H5ZM5.49607 7.13174C5.01655 6.85773 4.40569 7.02433 4.13168 7.50385C3.85767 7.98337 4.02427 8.59422 4.50379 8.86823L11.5038 12.8682C11.8112 13.0439 12.1886 13.0439 12.4961 12.8682L19.4961 8.86823C19.9756 8.59422 20.1422 7.98337 19.8682 7.50385C19.5942 7.02433 18.9833 6.85773 18.5038 7.13174L11.9999 10.8482L5.49607 7.13174Z" fill="#CACBCE" />
                            </svg>
                            <input class="input-field border-0<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" type="email" autocomplete="on" required />
                        </div>
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                    </div>

                    <div style="margin-top: 1rem">
                        <label for="" class="d-block input-label"><?= lang('Auth.password') ?></label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81592 4.25974C7.12462 5.48872 7 6.95088 7 8H6C4.34315 8 3 9.34315 3 11V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V11C21 9.34315 19.6569 8 18 8L17 7.99998C17 6.95087 16.8754 5.48871 16.1841 4.25973C15.829 3.62845 15.3194 3.05012 14.6031 2.63486C13.8875 2.22005 13.021 2 12 2C10.979 2 10.1125 2.22005 9.39691 2.63486C8.68058 3.05012 8.17102 3.62845 7.81592 4.25974ZM9.55908 5.24026C9.12538 6.01128 9 7.04912 9 8H15C15 7.04911 14.8746 6.01129 14.4409 5.24027C14.2335 4.87155 13.9618 4.57488 13.6 4.36514C13.2375 4.15495 12.729 4 12 4C11.271 4 10.7625 4.15495 10.4 4.36514C10.0382 4.57488 9.76648 4.87155 9.55908 5.24026ZM14 14C14 14.7403 13.5978 15.3866 13 15.7324V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V15.7324C10.4022 15.3866 10 14.7403 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14Z" fill="#CACBCE" />
                            </svg>
                            <input class="input-field border-0 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" type="password" name="password" id="password-content-3-5" minlength="6" required />
                            <div onclick="togglePassword()">
                                <svg style="margin-left: 0.75rem; cursor: pointer" width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path id="icon-toggle" fill-rule="evenodd" clip-rule="evenodd" d="M0 7C0.555556 4.66667 3.33333 0 10 0C16.6667 0 19.4444 4.66667 20 7C19.4444 9.52778 16.6667 14 10 14C3.31853 14 0.555556 9.13889 0 7ZM10 5C8.89543 5 8 5.89543 8 7C8 8.10457 8.89543 9 10 9C11.1046 9 12 8.10457 12 7C12 6.90536 11.9934 6.81226 11.9807 6.72113C12.2792 6.89828 12.6277 7 13 7C13.3608 7 13.6993 6.90447 13.9915 6.73732C13.9971 6.82415 14 6.91174 14 7C14 9.20914 12.2091 11 10 11C7.79086 11 6 9.20914 6 7C6 4.79086 7.79086 3 10 3C10.6389 3 11.2428 3.14979 11.7786 3.41618C11.305 3.78193 11 4.35535 11 5C11 5.09464 11.0066 5.18773 11.0193 5.27887C10.7208 5.10171 10.3723 5 10 5Z" fill="#CACBCE" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 1rem">
                        <label for="" class="d-block input-label"><?= lang('Auth.repeatPassword') ?></label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81592 4.25974C7.12462 5.48872 7 6.95088 7 8H6C4.34315 8 3 9.34315 3 11V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V11C21 9.34315 19.6569 8 18 8L17 7.99998C17 6.95087 16.8754 5.48871 16.1841 4.25973C15.829 3.62845 15.3194 3.05012 14.6031 2.63486C13.8875 2.22005 13.021 2 12 2C10.979 2 10.1125 2.22005 9.39691 2.63486C8.68058 3.05012 8.17102 3.62845 7.81592 4.25974ZM9.55908 5.24026C9.12538 6.01128 9 7.04912 9 8H15C15 7.04911 14.8746 6.01129 14.4409 5.24027C14.2335 4.87155 13.9618 4.57488 13.6 4.36514C13.2375 4.15495 12.729 4 12 4C11.271 4 10.7625 4.15495 10.4 4.36514C10.0382 4.57488 9.76648 4.87155 9.55908 5.24026ZM14 14C14 14.7403 13.5978 15.3866 13 15.7324V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V15.7324C10.4022 15.3866 10 14.7403 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14Z" fill="#CACBCE" />
                            </svg>
                            <input class="input-field border-0 <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" type="password" name="pass_confirm" id="password-content-3-6" minlength="6" required />
                            <div onclick="togglePassword2()">
                                <svg style="margin-left: 0.75rem; cursor: pointer" width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path id="icon-toggle2" fill-rule="evenodd" clip-rule="evenodd" d="M0 7C0.555556 4.66667 3.33333 0 10 0C16.6667 0 19.4444 4.66667 20 7C19.4444 9.52778 16.6667 14 10 14C3.31853 14 0.555556 9.13889 0 7ZM10 5C8.89543 5 8 5.89543 8 7C8 8.10457 8.89543 9 10 9C11.1046 9 12 8.10457 12 7C12 6.90536 11.9934 6.81226 11.9807 6.72113C12.2792 6.89828 12.6277 7 13 7C13.3608 7 13.6993 6.90447 13.9915 6.73732C13.9971 6.82415 14 6.91174 14 7C14 9.20914 12.2091 11 10 11C7.79086 11 6 9.20914 6 7C6 4.79086 7.79086 3 10 3C10.6389 3 11.2428 3.14979 11.7786 3.41618C11.305 3.78193 11 4.35535 11 5C11 5.09464 11.0066 5.18773 11.0193 5.27887C10.7208 5.10171 10.3723 5 10 5Z" fill="#CACBCE" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fill text-white d-block w-100" type="submit">
                        Register
                    </button>
                </form>
                <p class="text-center bottom-caption">
                    Have an account yet?
                    <a href="/login" class="green-bottom-caption text-decoration-none">Login Here</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>