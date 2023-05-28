<?= form_open('users/register');?>
  <div class="home-container">
    <h3><center><?=$title;?></center></h3><br>
    <label for="firstname" class="form-label">First Name:</label>
    <input type="text" class="form-control"  placeholder="Enter First name" name="firstname">
    <small><div style='color:red;'><?= form_error('firstname'); ?></div></small>

    <label for="lastname" class="form-label">Last Name:</label>
    <input type="text" class="form-control"  placeholder="Enter Last name" name="lastname">
    <small><div style='color:red;'><?= form_error('lastname'); ?></div></small>

    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control"  placeholder="Enter Email" name="email">
    <small><div style='color:red;'><?= form_error('email'); ?></div></small>

    <label for="password" class="form-label">Password:</label>
    <input type="password"  class="form-control" placeholder="Enter Password" name="password">
    <small><div style='color:red;'><?= form_error('password'); ?></div></small>

    <label for="retypepass" class="form-label">Retype Pass:</label>
    <input type="password" class="form-control"  placeholder="Retype pass" name="retypepass">
    <small><div style='color:red;'><?= form_error('retypepass'); ?></div></small><br>
    

    <a href="<?= base_url('users/home');?>" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-success" style="float:right">Register</button>
  </div>
<?= form_close(); ?>