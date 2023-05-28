<div class="tocenter">
  <?php if($this->session->flashdata('user_loggedin')): ?>
  <?= '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
  <?php endif; ?>
  <?= form_open('users/update')?>
    <h3 style="margin-bottom: 5%;"><?= $title;?></h3>
    <label for="firstname" class="form-label" >Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" name="firstname">
    <div class="error-message"><?= form_error('firstname'); ?></div>

    <label for="lastname" class="form-label">Last Name:</label>
    <input type="text" class="form-control" placeholder="Enter Last name" name="lastname">
    <div class="error-message"><?= form_error('lastname'); ?></div>

    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control"  placeholder="Enter email" name="email">
    <div class="error-message"><?= form_error('email'); ?></div>

    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control"  placeholder="Enter password" name="password">
    <div class="error-message"><?= form_error('password'); ?></div>

    <?php if($this->session->flashdata('user_updated')): ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('user_updated').'</p>'; ?>
    <?php endif; ?><br>  
    <button type="submit" class="btn btn-primary" style="float:right">Update</button>
  <?= form_close();?>
</div>