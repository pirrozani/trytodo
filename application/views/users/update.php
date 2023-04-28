  <body>
    <div class="container">
      <?php if($this->session->flashdata('user_loggedin')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>
      <h3 style="margin-bottom: 5%;"><?= $title;?></h3>
        <?php echo form_open('users/update')?>
          <label for="firstname" class="form-label" >Name:</label>
          <input type="text" class="form-control" placeholder="Enter name" name="firstname"><br>
          <small><div style='color:red;'><?php echo form_error('firstname'); ?></div></small>

          <label for="lastname" class="form-label">Last Name:</label>
          <input type="text" class="form-control" placeholder="Enter Last name" name="lastname"><br>
          <small><div style='color:red;'><?php echo form_error('lastname'); ?></div></small>

          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control"  placeholder="Enter email" name="email"><br>
          <small><div style='color:red;'><?php echo form_error('email'); ?></div></small>

          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control"  placeholder="Enter password" name="password"><br>
          <small><div style='color:red;'><?php echo form_error('password'); ?></div></small>

          <?php if($this->session->flashdata('user_updated')): ?>
          <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_updated').'</p>'; ?>
          <?php endif; ?><br>

          <button type="submit" class="btn btn-primary" style="float:right">Update</button>
        <?php echo form_close();?>
      </div>

  </body>