<style>
    a:link, a:visited {
      margin-right: 15px;
      border: 1px solid black;
      padding: 10px 50px;
      color: black;
      text-decoration: none;
      font-size: larger;
    }
    .tocenter{
      width: 35%;
      margin: auto;
      margin-top: 12%;
    }
    input{
      margin-bottom: 2%;
    }

  </style>
  <body>

    <div class="tocenter">
      <h3 style="margin-bottom: 5%;"><?= $title;?></h3>
        <?php echo form_open('users/update_password')?>
          <?php if($this->session->flashdata('valid_verification_code')): ?>
          <?php echo '<p class="alert alert-success">'.$this->session->flashdata('valid_verification_code').'</p>'; ?>
          <?php endif; ?><br>
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control"  placeholder="Enter password" name="password">
          <small><div style='color:red;'><?php echo form_error('password'); ?></div></small>

          <label for="retypepass" class="form-label">Retype Pass:</label>
          <input type="password" class="form-control"  placeholder="Retype password" name="retypepass">
          <small><div style='color:red;'><?php echo form_error('retypepass'); ?></div></small><br>
          <?php if($this->session->flashdata('wrong_code')): ?>
          <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('wrong_code').'</p>'; ?>
          <?php endif; ?><br>
          

          <button type="submit" class="btn btn-primary" style="float:right">Update</button>
        <?php echo form_close();?>
      </div>

  </body>