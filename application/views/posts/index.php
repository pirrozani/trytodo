<div class="container extra2">
  <div class="accordion" id="user">
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true" aria-controls="collapse">
        <h3>List of your Messages</h3>
      </h2>  
      <div id="collapse" class="accordion-collapse  collapse" aria-labelledby="heading" data-bs-parent="#user">
        <div class="accordion-body">
          <?php $counter = 1;
          foreach($posts as $post): ?>
            <h3>Message <?= $counter;?></h3>
            <small>Submitted at: <b><?= date('H:i:s D d M Y', strtotime($post['created_at'])); ?></b></small><br>
            <?= $post['message']; $counter++;?><br><br>
          <?php 
          endforeach;?>
          <?php if(!$posts):{echo '<h4>'.'No messages'.'</h4>';}endif;?>
        </div>
      </div>
    </div>
  </div>
</div>