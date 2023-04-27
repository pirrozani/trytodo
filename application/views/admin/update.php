<style>
    body{
      margin-top: 2%;
  
    }

    a:link, a:visited {
      margin-right: 15px;
      border: 1px solid lightblue;
      padding: 10px 50px;
      color: black;
      text-decoration: none;
      font-size: larger;
    }
    .tocenter{
      width: 35%;
      margin: auto;
    }
    input{
      margin-bottom: 2%;
    }
    .menu{
      margin-bottom: 5%;
    }
  </style>
  <body>
  <div class="menu">
    <center>
      <a style="background-color:#f8f9fa" href="<?php echo base_url('admin/update');?>" >Admin Profile</a>
      <a href="<?php echo base_url('admin/users_list');?>" >Users</a>    
      <a href="<?php echo base_url('admin/all_posts');?>" >All Message History</a>
      <a href="<?php echo base_url('admin/logout');?>" >Logout</a>
  </center>
  </div>

    <div class="tocenter">
      <div style="margin-botoom: 5%;"></div><?php if($this->session->flashdata('admin_loggedin')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('admin_loggedin').'</p>'; ?>
      <?php endif; ?>
      <h3 style="margin-bottom: 5%;"><?= $title;?></h3>
        <?php echo form_open('admin/update')?>
          <label for="firstname" class="form-label" >Name:</label>
          <input type="text" class="form-control" placeholder="Enter name" name="firstname">
          <small><div style='color:red;'><?php echo form_error('firstname'); ?></div></small>

          <label for="lastname" class="form-label">Last Name:</label>
          <input type="text" class="form-control" placeholder="Enter Last name" name="lastname">
          <small><div style='color:red;'><?php echo form_error('lastname'); ?></div></small>

          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control"  placeholder="Enter email" name="email">
          <small><div style='color:red;'><?php echo form_error('email'); ?></div></small>

          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control"  placeholder="Enter password" name="password">
          <small><div style='color:red;'><?php echo form_error('password'); ?></div></small>

          <?php if($this->session->flashdata('admin_updated')): ?>
          <?php echo '<p class="alert alert-success">'.$this->session->flashdata('admin_updated').'</p>'; ?>
          <?php endif; ?><br>

          <button type="submit" class="btn btn-primary" style="float:right">Update</button>
        <?php echo form_close();?>
      </div>

  </body>