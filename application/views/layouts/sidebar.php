<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php if(!empty($main->getUser($_SESSION['uid']))) :?>
        <?php foreach($main->getUser($_SESSION['uid']) as $user) :?>
        <img src="<?= 'assets/imgs/'.$user['gender'].'.png'?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        
        <p><?= ucfirst($user['fName']).' '.mb_substr($user['mName'], 0, 1, 'utf-8').'. '.' '.ucfirst($user['lName']);?></p>
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
      <?php if(!empty($main->getUser($_SESSION['uid']))):?>
        <?php $a = array();?>
        <?php $a = $main->getUser($_SESSION['uid']);?>
          <?php if($a[0]["position"] == "admin"):?>
            <?php $actions = array('employee'=>'fa-black-tie','borrower'=>'fa-users','collector'=>'fa-truck');
            foreach($actions as $action => $fa):
              $p = isset($_GET['p'])?$_GET['p']:'';
              $isCurrentPage = false;
              if(strpos(strtolower($p),$action)!==false){
                $isCurrentPage = true;
              }
            ?>
            <li  class="<?= $isCurrentPage?"active":"" ?>">
              <a href="?p=<?= $action;?>">
                <i class="fa <?= $fa?>"></i> <span><?= ucfirst($action);?></span>
              </a>
            </li><!--Employee Menu-->
            <?php endforeach;?>
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
            <?php else:?>
              <?php $actions = array('borrowers'=>'fa-users','collector'=>'fa-truck');?>
            <?php foreach($actions as $action => $fa):?>
            <li  class="<?= isset($_GET["$action"])?"active":"" ?>">
              <a href="?p=<?= $action;?>">
                <i class="fa <?= $fa?>"></i> <span><?= ucfirst($action);?></span>
              </a>
            </li><!--Employee Menu-->
            <?php endforeach;?>
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
            <?php endif;?>
          <?php endif;?>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper" style="min-height: 959.8px;">
<section class="content-header">
<!-- </section>  -->
