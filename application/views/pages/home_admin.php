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


  </style>
  <body>
  <div class="admin-btn">
        <a href="<?php echo base_url('users/home');?>" class="btn btn-primary btn-lg">CUSTOMER</a>
    </div>

   
  <?php echo form_open('admin/login')?>
  <div class="container">
  <center><h5>LOGIN INTO YOUR ACCOUNT ADMIN</h5></center><br>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    <small><div style='color:red;'><?php echo form_error('email'); ?></div></small>

    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    <small><div style='color:red;'><?php echo form_error('password'); ?></div></small>
  </div>
  <?php if($this->session->flashdata('admin_loggedin_failed')): ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('admin_loggedin_failed').'</p>'; ?>
      <?php endif; ?>
  <button type="submit" class="btn btn-primary" style="float:right">LOGIN</button><br><br>
  </div>

  </body>