<div class="home-container">
  <h5><center>Lost Pass?<br>Enter here your Email and we will send you a link to generate your Password again.</center></h5><br>
  <?= form_open('users/check_email')?>
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    <?php if($this->session->flashdata('wrong_email')): ?>
    <?= '<p class="alert alert-danger">'.$this->session->flashdata('wrong_email').'</p>'; ?>
    <?php endif; ?>
    <div class="error-message"><?= form_error('email');  ?></div>
    <a href="<?php echo base_url();?>" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-success" style="float:right;">Remind Me</button>
  <?= form_close(); ?>
</div>
