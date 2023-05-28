<?= form_open('users/login')?> 
  <div class="home-container">
    <center><h5>LOGIN INTO YOUR ACCOUNT CUSTOMER</h5></center><br>
    <div class="mb-3 mt-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="email">
      <div class="error-message"><?= form_error('email'); ?></div>

      <label for="password" class="form-label">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="password">
      <div class="error-message"><?= form_error('password'); ?></div>

    </div>         
    <?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>
    <div style="margin-top: 5%;"></div>
    <?php if($this->session->flashdata('user_loggedout','password_updated')): ?>
      <?= '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout','password_updated').'</p>'; ?>
    <?php endif; ?>      
    <?php if($this->session->flashdata('password_updated')): ?>
      <?= '<p class="alert alert-success">'.$this->session->flashdata('password_updated').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('user_registered')): ?>
      <?= '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>
      <center>
        <a class="btn" href="<?= base_url('users/lostpass');?>">Lost My Pass</a><br>
        <a class="btn" href="<?= base_url('users/register');?>">New Account</a><br><br>
      </center>
      <button type="submit" class="btn btn-success" style="float:right">LOGIN</button><br><br>
  </div>
<?= form_close(); ?>