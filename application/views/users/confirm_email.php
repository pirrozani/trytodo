  <style>
    .container{
      margin: 10%;
      width: 45%;
      border: 1px solid black;
      padding: 10px;
  }
  .form-label{
    font-size: larger;
  }
  input[type="text"]{
    text-align: center;
  }
  </style>
  <body>
    <?php echo form_open('users/check_verification_email') ?>
      <center>
        <div class="container">
          <h5 style="font-size:25px;">A verification code has been sent to your email:<b><br>'<?php echo $email;?>'</b></h5><br>
          <label for="verification_code" class="form-label">Enter the 4-digit verification code below:</label><br>
          <input type="text" style="width: 15%"  name="verification_code">
          <small><div style='color:red;'><?php echo form_error('verification_code'); ?></div></small><br>
          <?php if($this->session->flashdata('invalid_verification_code')): ?>
          <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('invalid_verification_code').'</p>'; ?>
          <?php endif; ?><br>
          <button  type="submit" class="btn btn-primary">Confirm email</button>
        </div>
      </center>
    <?php echo form_close(); ?>
  </body>
</html>