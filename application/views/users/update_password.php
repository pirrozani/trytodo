<?= form_open('users/update_password')?>
  <div class="tocenter">
    <center><h3><?= $title;?></h3></center>
    <?php if($this->session->flashdata('valid_verification_code')): ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('valid_verification_code').'</p>'; ?>
    <?php endif; ?><br>

    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control"  placeholder="Enter password" name="password">
    <div class="error-message"><?= form_error('password'); ?></div>

    <label for="retypepass" class="form-label">Retype Pass:</label>
    <input type="password" class="form-control"  placeholder="Retype password" name="retypepass">
    <div class="error-message"><?= form_error('retypepass'); ?></div><br>

    <?php if($this->session->flashdata('wrong_code')): ?>
    <?= '<p class="alert alert-danger">'.$this->session->flashdata('wrong_code').'</p>'; ?>
    <?php endif; ?><br>
    <button type="submit" class="btn btn-primary" style="float:right">Update</button>
  </div>
<?= form_close();?>