<?= form_open('posts/create') ?>
  <div class="container">
    <div class="mb-3">
      <label for="message" class="form-label"><h3><?= $title;?></h3></label><br>
      <textarea class="form-control" name="message" rows="8"></textarea>
      <div class="error-message"><?=  validation_errors(); ?></div>
      <div class="container"><br>
        <?php if ($this->session->flashdata('message_created')) : ?>
          <?= '<p class="alert alert-success">' . $this->session->flashdata('message_created') .'</p>';?>
        <?php endif; ?>
      </div>
      <button type="submit" class="btn btn-primary" style="float:right; margin-top: 1%;">Send</button>
    </div>
  </div>         
<?= form_close(); ?>