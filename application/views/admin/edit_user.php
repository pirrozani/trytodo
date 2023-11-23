<?= form_open(base_url('admin/edit_user/' . $users['id'])); ?>
<div class="tocenter">
    <center>
        <h3>Edit User's information:</h3>
    </center><br>
    <label for="firstname" class="form-label">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" name="firstname">
    <div class="error-message"><?= form_error('firstname'); ?></div>

    <label for="lastname" class="form-label">Last Name:</label>
    <input type="text" class="form-control" placeholder="Enter Last name" name="lastname">
    <div class="error-message"><?= form_error('lastname'); ?></div>

    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email">
    <div class="error-message"><?= form_error('email'); ?></div>

    <?php if ($this->session->flashdata('user_updated')) : ?>
        <?= '<p class="alert alert-success">' . $this->session->flashdata('user_updated') . '</p>'; ?>
    <?php endif; ?><br>
    <button type="submit" class="btn btn-success" style="float:right">Update</button>
</div>
<?= form_close(); ?>