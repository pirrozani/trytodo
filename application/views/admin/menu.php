<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-md">
      <span class="navbar-brand mb-0 h1">TRYTODO</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(2)=="update"){echo "active";}?>" href="<?= base_url('admin/update');?>">Admin Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if( ($this->uri->segment(2)=="users_list") OR ($this->uri->segment(2)=="edit_user") OR ($this->uri->segment(2)=="user_message") ){echo "active";}?>" 
            href="<?php echo base_url('admin/users_list');?>">Users' List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(2)=="all_posts"){echo "active";}?>" href="<?= base_url('admin/all_posts');?>">Users' Message History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/logout');?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>