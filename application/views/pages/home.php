<style>
    .container {
      margin: auto;
      border: 1px solid #484848;
      width: 22%;
      height: auto;
    }
    .admin-btn{
      margin: 5% 10% 5% 75%;
      width: 50%;
    }
    a:link{
      color: black;
      text-decoration: none;
      font-size: larger;
    }
    
  </style>
  <body>
  <div class="admin-btn">
        <a href="<?php echo base_url('admin/home');?>" class="btn btn-primary btn-lg">ADMIN</a>
    </div>

  <?php echo form_open('users/login')?> 
    <div class="container">
      <center><h5>LOGIN INTO YOUR ACCOUNT CUSTOMER</h5></center><br>
      <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control"  placeholder="Enter email" name="email">
        <small><div style='color:red;'><?php echo form_error('email'); ?></div></small>
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control"  placeholder="Enter password" name="password">
        <small><div style='color:red;'><?php echo form_error('password'); ?></div></small>
      </div>         
      <?php if($this->session->flashdata('login_failed')): ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>
      <div style="margin-top: 5%;"></div>
      <?php if($this->session->flashdata('user_loggedout','password_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout','password_updated').'</p>'; ?>
      <?php endif; ?>      
      <?php if($this->session->flashdata('password_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('password_updated').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>
      
      <button type="submit" class="btn btn-primary" style="float:right">LOGIN</button><br><br>
        <center>
          <a href="<?php echo base_url('users/lostpass');?>">Lost My Pass</a><br>
          <a href="<?php echo base_url('users/register');?>">New Account</a>
        </center>

    </div>
    <?php echo form_close(); ?>

  </body>