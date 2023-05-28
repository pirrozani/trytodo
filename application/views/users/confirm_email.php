<?= form_open('users/check_verification_email') ?>
  <div class="home-container code">
    <h4>A verification code has been sent to your email:<b><br>'<?= $email;?>'</b></h4><br>
    <label for="verification_code">Enter the 4-digit verification code below:</label><br><br>
    <input type="text"  name="verification_code">
    <div class="error-message"><?= form_error('verification_code'); ?></div>
    <?php if($this->session->flashdata('invalid_verification_code')): ?>
    <?= '<p class="alert alert-danger">'.$this->session->flashdata('invalid_verification_code').'</p>'; ?>
    <?php endif; ?><br>
    <button  type="submit" class="btn btn-success">Confirm email</button>
  </div>
<?= form_close(); ?>