<div class="tocenter">
  <?php if($this->session->flashdata('admin_loggedin')): ?>
  <?= '<p class="alert alert-success">'.$this->session->flashdata('admin_loggedin').'</p>'; ?>
  <?php endif; ?>
  <h3><center><?= $title;?></center></h3><br>
    <?= form_open('admin/update')?>
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

      <?php if($this->session->flashdata('admin_updated')): ?>
      <?= '<p class="alert alert-success">'.$this->session->flashdata('admin_updated').'</p>'; ?>
      <?php endif; ?><br>

      <button type="submit" class="btn btn-success" style="float:right">Update</button>
    <?= form_close();?>
  </div>