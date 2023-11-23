<?php $index = 1;
foreach ($users as $user) :
	$msg_counter = 1; ?>
	<div class="container extra2">
		<div class="accordion" id="user">
			<div class="accordion-item">
				<h2 class="accordion-header" id="heading<?= $index; ?>">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index; ?>" aria-expanded="true" aria-controls="collapse<?= $index; ?>">
						<h4>Messages From <b><?= ucfirst($user['firstname']) . ' ' . ucfirst($user['lastname']); ?></b><br>
							<small style="font-size:small; align-text:end;">Last interactive: <b><?= date('H:i:s D d M Y', strtotime($user['last_post_created'])); ?></b></small>
						</h4>
				</h2>
				<div id="collapse<?= $index; ?>" class="accordion-collapse  collapse" aria-labelledby="heading<?= $index; ?>" data-bs-parent="#user">
					<div class="accordion-body">
						<?php foreach ($posts as $post) :
							if ($user['id'] == $post['user_id']) : ?>
								<b style="font-size:x-large;">Message <?= $msg_counter; ?></b>
								<br><small>Submitted at:</small> <b><?= date('H:i:s D d M Y', strtotime($post['created_at'])); ?></b><br>
								<?= $post['message']; ?> <br><br>
						<?php $msg_counter++;
							endif;
						endforeach;
						if ($post['user_id'] == $index) : {
								echo '<h4>' . 'No messages' . '</h4>';
							}
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $index++;
endforeach; ?>