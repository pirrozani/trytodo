<style>

a:link, a:visited{
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
text{
	font-size: 20%;
}
.container{
	margin-top: 5%;

}
.accordion-button:not(.collapsed) {
	background-color: transparent;
	color:black;
}

</style>

<body style="margin-top: 2%; ">
<center>
	<a href="<?php echo base_url('admin/update');?>" >Admin Profile</a>
	<a href="<?php echo base_url('admin/users_list');?>">Users</a>    
	<a style="background-color:#f8f9fa" href="<?php echo base_url('admin/all_posts');?>" >All Message History</a>
	<a href="<?php echo base_url('admin/logout');?>" >Logout</a>
</center>
<div class="container" style="margin-top: 5%;">
<?php 
foreach($users as $user):?>
	<h4 style="background-color:lightblue; ">Messages From <b><?= $user['firstname'];?> <?= $user['lastname'];?></b></h4>
	<?php $counter = 1;?>
	<?php
	foreach($posts as $post): ?>
		 <?php
		if($user['id'] == $post['user_id']):?>
		<b style="font-size:x-large;">Message <?= $counter;?></b>
        	<br><small><b>Submitted at:</b> <?php echo $post['created_at']; ?></small><br>
        	<?php echo $post['message']; ?> <br><br>
			<?php $counter++;?><?php 
		endif;?>
		<?php 
	endforeach;
			   
endforeach; ?>

</div>
</body>