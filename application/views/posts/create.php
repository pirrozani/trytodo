<style>
  a:link,
  a:visited {
    margin-right: 15px;
    border: 1px solid lightblue;
    padding: 10px 50px;
    color: black;
    text-decoration: none;
    font-size: larger;
  }
</style>

<body style="margin-top: 2%;">
  <center>
    <?php echo form_open('posts/create') ?>
    <a href="<?php echo base_url('users/update'); ?>">My Profile</a>
    <a style="background-color:#f8f9fa" href="<?php echo base_url('posts/create'); ?>">Submit New Message</a>
    <a href="<?php echo base_url('posts/index'); ?>">Message History</a>
    <a href="<?php echo base_url(''); ?>">Logout</a>

    <div class="mb-3" style="margin-top: 5%; width: 60%">
      <label for="message" class="form-label" style="float:left">
        <h3><?= $title; ?></h3>
      </label> <br>

      <textarea class="form-control" name="message" rows="10"></textarea>
      <small>
        <div style='float:left; color:red;'><?php echo validation_errors(); ?></div>
      </small>
      <div class="container" style="margin-top: 1%;">
        <?php if ($this->session->flashdata('message_created')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('message_created') . '</p>'; ?>
        <?php endif; ?>
      </div>
      <button type="submit" class="btn btn-primary" style="float:right; margin-top: 1%;">Send</button>
    </div>

  </center>


  <?php echo form_close(); ?>

</body>