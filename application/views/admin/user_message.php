<style>

a:link, a:visited {
  margin-right: 15px;
  border: 1px solid lightblue;
  padding: 10px 50px;
  color: black;
  text-decoration: none;
  font-size: larger;
}
input{
  margin-bottom: 2%;
}
</style>

<body style="margin-top: 2%;">
<center>
    <a href="<?php echo base_url('admin/update');?>" >Admin Profile</a>
	<a style="background-color:#f8f9fa" href="<?php echo base_url('admin/users_list');?>">Users</a>    
	<a href="<?php echo base_url('admin/all_posts');?>" >All Message History</a>
	<a href="<?php echo base_url('admin/logout');?>" >Logout</a>
</center>
<?php echo form_open('admin/user_message')?>
<div class="container" style="margin-top: 5%;">
  <?php $counter = 1;
  foreach($posts as $post): ?>
    <h3>Message <?php echo $counter;?></h3>
    <small><b>Submitted at:</b> <?php echo $post['created_at']; ?></small><br>
    <?php echo $post['message']; ?> <br><br>
  <?php $counter++;
  endforeach; ?><?php 
  if(!$posts):?>
    <h3>The user has not sent any message yet.</h3><?php 
  endif;?>
</div>
</body>