<header class="stick d-flex justify-content-center">
    <nav class="d-flex justify-content-between navRes">
        <div class="d-flex justify-content-between align-items-center">
            <a href="<?php echo URLROOT; ?>" class="nav-link <?php echo ($data['current'] === 'home') ? 'activeLink' : ''; ?>">TITULINIS</a>
            <a class="nav-link <?php echo ($data['current'] === 'comments') ? 'activeLink' : ''; ?>" href="<?php echo URLROOT; ?>/comments/feedback">ATSILIEPIMAI</a>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <?php if (!ifUserIsLoggedIn()) : ?>
                <a class="nav-link <?php echo ($data['current'] === 'login') ? 'activeLink' : ''; ?>" href="<?php echo URLROOT; ?>/users/login">PRISIJUNGTI</a>
                <a class="nav-link <?php echo ($data['current'] === 'register') ? 'activeLink' : ''; ?>" href="<?php echo URLROOT; ?>/users/register">REGISTRUOTIS</a>
            <?php else : ?>
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">ATSIJUNGTI</a>
            <?php endif; ?>
        </div>
    </nav>
</header>