<Header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">PERPUSKU</a>

            <button class="navbar-toggler ms-auto me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li>
                        <a class="nav-link me-2" aria-current="page" href="#">About Us</a>
                    </li>
                    <?php if (logged_in() == false) : ?>
                        <li>
                            <a class="nav-link me-2" aria-current="page" href="<?= base_url() ?>/login">Login</a>
                        </li>
                    <?php endif; ?>
                    </li>
                </ul>
            </div>
            <?php if (logged_in()) : ?>
                <div class="dropdown text-end ms-lg-5">
                    <a href="#" class=" link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= base_url() ?>/img/<?= user()->image ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="/mybook/index">My Book</a></li>
                        <li><a class="dropdown-item" href="/user">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/logout">Sign out</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</Header>