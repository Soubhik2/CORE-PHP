<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container">
    <a href="<?=BASEURL?>"><img src="<?= BASEURL ?>public/asset/php.png" class="me-2" width="45" alt=""></a>
    <a class="navbar-brand" href="<?=BASEURL?>">CORE PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= ($page_name == 'welcome')?'active':'' ?>" aria-current="page" href="<?=BASEURL?>">Welcome</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page_name == 'test')?'active':'' ?>" href="<?= $router=="AUTO"?BASEURL.'test':BASEURL.'test/product/10'?>">Test</a>
        </li>
      </ul>
    </div>
  </div>
</nav>