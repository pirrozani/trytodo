<?= form_open('admin/login')?>
  <div class="home-container">
    <center><h5>LOGIN INTO YOUR ACCOUNT ADMIN</h5></center><br>
    <div class="mb-3 mt-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      <div class="error-message"><?= form_error('email'); ?></div>

      <label for="pwd" class="form-label">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      <div class="error-message"><?=form_error('password'); ?></div>
    </div>
    <?php if($this->session->flashdata('admin_loggedin_failed')): ?>
    <?= '<p class="alert alert-danger">'.$this->session->flashdata('admin_loggedin_failed').'</p>'; ?>
    <?php endif; ?>
    <button type="submit" class="btn btn-success" style="float:right">LOGIN</button><br><br>
  </div>
<?= form_close(); ?>
