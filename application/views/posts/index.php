    <div class="container">
      <?php $counter = 1;?><?php foreach($posts as $post): ?>
        <h3>Message <?php echo $counter;?></h3>
        <small>Submitted at: <b><?php echo date('H:m:s D d M Y', strtotime($post['created_at'])); ?></b></small><br>
        <?php echo $post['message']; ?> <br><br>
        <?php $counter++;?>
      <?php endforeach; 
            if(!$posts):?>
              <h3>No messages</h3><?php 
            endif;?>
    </div>