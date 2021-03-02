<?php require APPROOT . '/views/inc/head.php'; ?>
<section class="d-flex justify-content-center align-items-center loginBg p-4">

    <div class="container">
        <h2 class="text-center mb-5"><strong>PRISIJUNGTI</strong></h2>
        <?php flash('login_status'); ?>
        <form action='' method='post' class="p-2">
            <div class="row mb-3">
                <label for='email' class="col-sm-2 col-form-label">EL. PAŠTAS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo (!empty($data['errors']['emailErr'])) ? 'is-invalid' : ''; ?>" name='email' id='email' placeholder="ex. johnwick@gmail.com" value="<?php echo $data['email']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['emailErr']; ?></small>
                </div>
            </div>
            <div class="row mt-4">
                <label for='passwordLog' class="col-sm-2 col-form-label">SLAPTAŽODIS</label>
                <div class="col-sm-10">
                    <input class="form-control <?php echo (!empty($data['errors']['passwordErr'])) ? 'is-invalid' : ''; ?>" name='password' id='password' value="<?php echo $data['password']; ?>" type="password">
                    <small class="error-alert"><?php echo $data['errors']['passwordErr']; ?></small>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type='submit' name="btnName" class="btn btn-dark mt-5" value="login">PRISIJUNGTI</button>
            </div>

        </form>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>