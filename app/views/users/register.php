<?php require APPROOT . '/views/inc/head.php'; ?>
<section class="d-flex justify-content-center registerBg p-1">
    <div class="registerContainer container">
        <?php flash('register_status'); ?>
        <h2 class="text-center mt-4"><strong>REGISTRUOTIS</strong></h2>
        <form action='' method='post' autocomplete="" class="p-2 mt-4">
            <div class="row mb-3">
                <label for='name' class="col-sm-2 col-form-label">VARDAS<sup>*</sup></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo (!empty($data['errors']['nameErr'])) ? 'is-invalid' : ''; ?>" name='name' id='name' placeholder="ex. Jenny" value="<?php echo $data['name']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['nameErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='lastname' class="col-sm-2 col-form-label">PAVARDĖ<sup>*</sup></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo (!empty($data['errors']['lastnameErr'])) ? 'is-invalid' : ''; ?>" name='lastname' id='lastname' placeholder="ex. Smiths" value="<?php echo $data['lastname']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['lastnameErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='email' class="col-sm-2 col-form-label">EL. PAŠTAS<sup>*</sup></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo (!empty($data['errors']['emailErr'])) ? 'is-invalid' : ''; ?>" name='email' id='email' placeholder="ex. jenny@smith.com" value="<?php echo $data['email']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['emailErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='password' class="col-sm-2 col-form-label">SLAPTAŽODIS<sup>*</sup></label>
                <div class="col-sm-10">
                    <input class="form-control <?php echo (!empty($data['errors']['passwordErr'])) ? 'is-invalid' : ''; ?>" name='password' id='password' type="password" value="<?php echo $data['password']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['passwordErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='confirmPassword' class="col-sm-2 col-form-label">PAKARTOTI SLAPTAŽODĮ<sup>*</sup></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control <?php echo (!empty($data['errors']['confirmPasswordErr'])) ? 'is-invalid' : ''; ?>" name='confirmPassword' id='confirmPassword' value="<?php echo $data['confirmPassword']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['confirmPasswordErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='number' class="col-sm-2 col-form-label">TELEFONO NUMERIS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='phone' id='phone' placeholder="ex. 861234567" value="<?php echo $data['phone']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for='address' class="col-sm-2 col-form-label">ADRESAS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='address' id='address' placeholder="ex. Kačiukų g. 56, Maldyvai" value="<?php echo $data['address']; ?>">
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type='submit' name="btnName" class="btn btn-dark mt-3" value="register">REGISTRUOTIS</button>
            </div>
        </form>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>