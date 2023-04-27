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
      <a href="<?php echo base_url('users/update');?>" >My Profile</a>
      <a href="<?php echo base_url('posts/create');?>" >Submit New Message</a>    
      <a style="background-color:#f8f9fa" href="<?php echo base_url('posts/index');?>" >Message History</a>
      <a href="<?php echo base_url('users/logout');?>" >Logout</a>
    </center>
    <div class="container" style="margin-top: 5%;">
      <?php $counter = 1;?>
      <?php foreach($posts as $post): ?>
        <h3>Message <?php echo $counter;?></h3>
        <small><b>Submitted at:</b> <?php echo $post['created_at']; ?></small><br>
        <?php echo $post['message']; ?> <br><br>
        <?php $counter++;?>
      <?php endforeach; 
            if(!$posts):?>
              <h3>No messages</h3><?php 
            endif;?>
    </div>
  </body>