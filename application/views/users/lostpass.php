  <style>
    .cont{
      width: 60%;
      margin-top: auto;
      margin: auto;
    }
  </style>
  <body style="margin-top: 10%;">
    <div class="cont">
      <h5><center>Lost Pass?<br>Enter here your Email and we will send you a link to generate your Password again.</center></h5><br>
      <?php echo form_open('users/check_email')?>
        <label for="email" class="form-label">Email:</label>
        <input style="margin-bottom: 2%;" type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        <?php if($this->session->flashdata('wrong_email')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('wrong_email').'</p>'; ?>
        <?php endif; ?>
        <small><div style='color:red;'><?php echo form_error('email'); ?></div></small>
        <a href="<?php echo base_url();?>" style="margin-top: 2%" class="btn btn-danger" style="float:right">Back</a>
        <button type="submit" class="btn btn-primary" style="float:right; margin-top: 2%">Remind Me</button>
      <?php echo form_close(); ?>
    </div>
  </body>
</html>
