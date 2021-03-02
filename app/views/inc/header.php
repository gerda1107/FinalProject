<header class="stick d-flex justify-content-center">
    <nav class="d-flex justify-content-between navRes">

        <div class="d-flex justify-content-between align-items-center">
            <a href="<?php echo URLROOT; ?>" class="nav-link">TITULINIS</a>
            <a class="nav-link" href="<?php echo URLROOT; ?>">ATSILIEPIMAI</a>
        </div>
        
        <div class="d-flex justify-content-between align-items-center">
            <?php if (!ifUserIsLoggedIn()) : ?>
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">PRISIJUNGTI</a>
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">REGISTRUOTIS</a>
            <?php else : ?>
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">ATSIJUNGTI</a>
            <?php endif; ?>
        </div>
    </nav>
</header>