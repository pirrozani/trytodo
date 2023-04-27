<style>
    body{
      margin-top: 5%;
  
    }
    .tocenter{
      width: 35%;
      margin: auto;
      margin-bottom: 2%;
    }
    input{
      margin-bottom: 2%;
    }

  </style>
  <body>
    <div class="tocenter">
      <h3><center><?=$title;?></center></h3><br>
      
      <?php echo form_open('users/register');?>
        
        <label for="firstname" class="form-label">First Name:</label>
        <input type="text" class="form-control"  placeholder="Enter First name" name="firstname">
        <small><div style='color:red;'><?php echo form_error('firstname'); ?></div></small>

        <label for="lastname" class="form-label">Last Name:</label>
        <input type="text" class="form-control"  placeholder="Enter Last name" name="lastname">
        <small><div style='color:red;'><?php echo form_error('lastname'); ?></div></small>

        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control"  placeholder="Enter Email" name="email">
        <small><div style='color:red;'><?php echo form_error('email'); ?></div></small>

        <label for="password" class="form-label">Password:</label>
        <input type="password"  class="form-control" placeholder="Enter Password" name="password">
        <small><div style='color:red;'><?php echo form_error('password'); ?></div></small>

        <label for="retypepass" class="form-label">Retype Pass:</label>
        <input type="password" class="form-control"  placeholder="Retype pass" name="retypepass">
        <small><div style='color:red;'><?php echo form_error('retypepass'); ?></div></small><br>
        

        <a href="/trytodo/home" class="btn btn-danger">Back</a>
        <button type="submit" class="btn btn-primary" style="float:right">Register</button>
      <?php echo form_close(); ?>
    </div>
  </body>
