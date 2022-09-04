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
				<h3 class="title-text mt-3"><?= lang('Auth.loginTitle') ?></h3>
				<?= view('Myth\Auth\Views\_message_block') ?>
				<p class="caption-text">
					Please log in using that account has<br />
					registered on the website.
				</p>
				<form style="margin-top: 1.5rem" action="<?= route_to('login') ?>" method="post">
					<?= csrf_field() ?>
					<?php if ($config->validFields === ['email']) : ?>
						<div style="margin-bottom: 1.75rem">
							<label for="" class="d-block input-label"><?= lang('Auth.email') ?></label>
							<div class="d-flex w-100 div-input">
								<svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M5 5C3.34315 5 2 6.34315 2 8V16C2 17.6569 3.34315 19 5 19H19C20.6569 19 22 17.6569 22 16V8C22 6.34315 20.6569 5 19 5H5ZM5.49607 7.13174C5.01655 6.85773 4.40569 7.02433 4.13168 7.50385C3.85767 7.98337 4.02427 8.59422 4.50379 8.86823L11.5038 12.8682C11.8112 13.0439 12.1886 13.0439 12.4961 12.8682L19.4961 8.86823C19.9756 8.59422 20.1422 7.98337 19.8682 7.50385C19.5942 7.02433 18.9833 6.85773 18.5038 7.13174L11.9999 10.8482L5.49607 7.13174Z" fill="#CACBCE" />
								</svg>
								<input class="input-field border-0 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" type="email" autocomplete="on" required />
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
						</div>
					<?php else : ?>
						<div style="margin-bottom: 1.75rem">
							<label for="" class="d-block input-label"><?= lang('Auth.emailOrUsername') ?></label>
							<div class="d-flex w-100 div-input">
								<svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M5 5C3.34315 5 2 6.34315 2 8V16C2 17.6569 3.34315 19 5 19H19C20.6569 19 22 17.6569 22 16V8C22 6.34315 20.6569 5 19 5H5ZM5.49607 7.13174C5.01655 6.85773 4.40569 7.02433 4.13168 7.50385C3.85767 7.98337 4.02427 8.59422 4.50379 8.86823L11.5038 12.8682C11.8112 13.0439 12.1886 13.0439 12.4961 12.8682L19.4961 8.86823C19.9756 8.59422 20.1422 7.98337 19.8682 7.50385C19.5942 7.02433 18.9833 6.85773 18.5038 7.13174L11.9999 10.8482L5.49607 7.13174Z" fill="#CACBCE" />
								</svg>
								<input class="input-field border-0 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" type="text" autocomplete="on" required />
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div style="margin-top: 1rem">
						<label for="" class="d-block input-label"><?= lang('Auth.password') ?></label>
						<div class="d-flex w-100 div-input">
							<svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M7.81592 4.25974C7.12462 5.48872 7 6.95088 7 8H6C4.34315 8 3 9.34315 3 11V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V11C21 9.34315 19.6569 8 18 8L17 7.99998C17 6.95087 16.8754 5.48871 16.1841 4.25973C15.829 3.62845 15.3194 3.05012 14.6031 2.63486C13.8875 2.22005 13.021 2 12 2C10.979 2 10.1125 2.22005 9.39691 2.63486C8.68058 3.05012 8.17102 3.62845 7.81592 4.25974ZM9.55908 5.24026C9.12538 6.01128 9 7.04912 9 8H15C15 7.04911 14.8746 6.01129 14.4409 5.24027C14.2335 4.87155 13.9618 4.57488 13.6 4.36514C13.2375 4.15495 12.729 4 12 4C11.271 4 10.7625 4.15495 10.4 4.36514C10.0382 4.57488 9.76648 4.87155 9.55908 5.24026ZM14 14C14 14.7403 13.5978 15.3866 13 15.7324V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V15.7324C10.4022 15.3866 10 14.7403 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14Z" fill="#CACBCE" />
							</svg>
							<input class="input-field border-0 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" name="password" type="password" name="" id="password-content-3-5" minlength="6" required />
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
							<div onclick="togglePassword()">
								<svg style="margin-left: 0.75rem; cursor: pointer" width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path id="icon-toggle" fill-rule="evenodd" clip-rule="evenodd" d="M0 7C0.555556 4.66667 3.33333 0 10 0C16.6667 0 19.4444 4.66667 20 7C19.4444 9.52778 16.6667 14 10 14C3.31853 14 0.555556 9.13889 0 7ZM10 5C8.89543 5 8 5.89543 8 7C8 8.10457 8.89543 9 10 9C11.1046 9 12 8.10457 12 7C12 6.90536 11.9934 6.81226 11.9807 6.72113C12.2792 6.89828 12.6277 7 13 7C13.3608 7 13.6993 6.90447 13.9915 6.73732C13.9971 6.82415 14 6.91174 14 7C14 9.20914 12.2091 11 10 11C7.79086 11 6 9.20914 6 7C6 4.79086 7.79086 3 10 3C10.6389 3 11.2428 3.14979 11.7786 3.41618C11.305 3.78193 11 4.35535 11 5C11 5.09464 11.0066 5.18773 11.0193 5.27887C10.7208 5.10171 10.3723 5 10 5Z" fill="#CACBCE" />
								</svg>
							</div>
						</div>
					</div>
					<?php if ($config->allowRemembering) : ?>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
								<?= lang('Auth.rememberMe') ?>
							</label>
						</div>
					<?php endif; ?>
					<?php if ($config->activeResetter) : ?>
						<div class="d-flex justify-content-end" style="margin-top: 0.75rem">
							<a href="<?= route_to('forgot') ?>" class="forgot-password fst-italic">Forgot Password?</a>
						</div>
					<?php endif; ?>
					<button type="submit" class="btn btn-fill text-white d-block w-100" type="submit">
						Log In To My Account
					</button>
				</form>
				<p class="text-center bottom-caption">
					Don't have an account yet?
					<a href="/register" class="green-bottom-caption u text-decoration-none">Register Here</a>
				</p>
			</div>
		</div>
	</div>

</section>

<?= $this->endSection() ?>