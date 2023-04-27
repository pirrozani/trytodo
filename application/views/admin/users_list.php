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
	margin-bottom: 2%;
}
.accordion-button:not(.collapsed) {
	background-color: transparent;
	color:black;
}
.alert-success{
	margin-top: 2%;
}
</style>

<body style="margin-top: 2%;">
<center>
	<a href="<?php echo base_url('admin/update');?>" >Admin Profile</a>
	<a style="background-color:#f8f9fa" href="<?php echo base_url('admin/users_list');?>">Users</a>    
	<a href="<?php echo base_url('admin/all_posts');?>" >All Message History</a>
	<a href="<?php echo base_url('admin/logout');?>" >Logout</a>
	<?php if($this->session->flashdata('success')): ?>
	<?php 	echo '<p class="alert alert-success">'.$this->session->flashdata('success').'</p>'; ?>
	<?php endif; ?><br>
</center>

<?php $counter = 1; 
foreach($users as $user):?>
	<div class="container">
		<div class="accordion" id="user" >
			<div class="accordion-item" >
				<h2 class="accordion-header" id="heading<?php echo $counter;?>">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $counter;?>" aria-expanded="true" aria-controls="collapse<?php echo $counter;?>">
						<h3>
							<?php echo $user['firstname'];?> <?php echo $user['lastname']; ?><br> 
							<small style="font-size:small;"><b> Last interactive:</b> <?php echo $user['last_post_created'] ?></small>
						</h3>
				</h2>
				<div id="collapse<?php echo $counter;?>" class="accordion-collapse  collapse" aria-labelledby="heading<?php echo $counter;?>" data-bs-parent="#user">
					<div class="accordion-body" style="display:flex;">
						<div class="card mb-3" style="width: 40%;">
							<div class="card-body text-dark">
								<div class="card-text">
									<b>First Name:</b> <?php echo $user['firstname'];?><br>
									<b>Last Name:</b> <?php echo $user['lastname'];?><br>
									<b>Email:</b> <?php echo $user['email'];?><br>
								</div>
							</div>            
						</div>
						<div class="d-grid gap-2 col-6 mx-auto" style="width: auto;">
							<a href="<?php echo base_url('admin/delete_user/'.$user['id']);?>" class="btn btn-light" onclick="return confirm('Are you sure want to Delete this User?')">Delete User</a>
							<a href="<?php echo base_url('admin/edit_user/'.$user['id']);?>" type="button" class="btn btn-light">Edit User</a>
							<a href="<?php echo base_url('admin/user_message/'.$user['id']);?>" type="button" class="btn btn-light">Show the User's messages</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	$counter++;
endforeach; ?>
</body>