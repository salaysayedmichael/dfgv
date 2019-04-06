<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php if(!empty($main->getUser($_SESSION['uid']))) :?>
        <?php foreach($main->getUser($_SESSION['uid']) as $user) :?>
        <img src="<?php echo 'assets/imgs/'.$user['gender'].'.png'?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        
        <p><?php echo ucfirst($user['fName']).' '.mb_substr($user['mName'], 0, 1, 'utf-8').'. '.' '.ucfirst($user['lName']);?></p>
        <?php endforeach;?>
        <?php endif;?>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
<<<<<<< Updated upstream
      <li class="active"><a href="?employee"><i class="fa fa-link"></i> <span>Employee</span></a></li>
=======
      <li  class="<?php echo isset($_GET['addEmployee'])?"active":"" ?>"><a href="?addEmployee"><i class="fa fa-link"></i> <span>Employee</span></a></li>
      <li class="<?php echo isset($_GET['addBorrower'])?"active":"" ?>"><a href="?addBorrower"><i class="fa fa-link"></i> <span>Borrower</span></a></li>
>>>>>>> Stashed changes
      <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="?">Link in level 2</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper" style="min-height: 959.8px;">
<section class="content-header">
</section> 