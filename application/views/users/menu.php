<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">TRYTODO</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(2)=="update"){echo "active";}?>" href="<?= base_url('users/update');?>">My profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(2)=="create"){echo "active";}?>" href="<?= base_url('posts/create');?>">Submit a New Message</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(2)=="index"){echo "active";}?>" href="<?= base_url('posts/index');?>">Message History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('users/logout');?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
