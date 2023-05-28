<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-md">
      <span class="navbar-brand mb-0 h1">TRYTODO</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if( ($this->uri->segment(1)=="users") OR ( ($this->uri->segment(0)=="") AND ($this->uri->segment(1)!= "admin") )){echo "active";}?>" href="<?= base_url('users/home');?>">Customer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1)=="admin"){echo "active";}?>" href="<?= base_url('admin/home');?>">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>