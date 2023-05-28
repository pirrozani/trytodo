<div class="container">
	<?php 
	if($this->session->flashdata('success')):
		{echo '<p class="alert alert-success">'.$this->session->flashdata('success').'</p>';}
	endif;?>
</div>
<?php $counter = 1; 
foreach($users as $user):?>
	<div class="container extra2">
		<div class="accordion" id="user" >
			<div class="accordion-item" >
				<h2 class="accordion-header" id="heading<?= $counter;?>">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $counter;?>" aria-expanded="true" aria-controls="collapse<?= $counter;?>">
						<h3>
						<?= ucfirst($user['firstname']).' '.ucfirst($user['lastname']);?><br> 
							<small style="font-size:small;">Last interactive: <b><?= date('H:i:s D d M Y', strtotime($user['last_post_created'])); ?></b></small>
						</h3>
				</h2>
				<div id="collapse<?= $counter;?>" class="accordion-collapse  collapse" aria-labelledby="heading<?= $counter;?>" data-bs-parent="#user">
					<div class="accordion-body" style="display:flex;">
						<div class="card mb-3" style="width: 50%;">
							<div class="card-body text-dark">
								<div class="card-text">
									<b>First Name:</b> <?= ucfirst($user['firstname']);?><br>
									<b>Last Name:</b> <?= ucfirst($user['lastname']);?><br>
									<b>Email:</b> <?= $user['email'];?><br>
								</div>
							</div>            
						</div>
						<nav class="nav flex-column mx-auto col-5 gap-1">
							<a class="nav-link btn-danger" href="<?= base_url('admin/delete_user/'.$user['id']);?>" onclick="return confirm('Are you sure want to Delete this User?')">Delete User</a>
							<a class="nav-link btn-light" href="<?= base_url('admin/edit_user/'.$user['id']);?>">Edit User</a>
							<a class="nav-link btn-light" href="<?= base_url('admin/user_message/'.$user['id']);?>">User's messages</a>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	$counter++;
endforeach; ?>