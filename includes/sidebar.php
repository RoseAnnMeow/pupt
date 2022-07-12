
<aside class="main-sidebar sidebar-dark-red elevation-3">
<?php 
    $sql = "SELECT * FROM system_details LIMIT 1";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
  ?>

<a href="index.php" class="brand-link">
<img src="upload/<?=$row['logo'];}?>" alt="PUP Taguig DCMS" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-normal text-lg text-light">PUP Taguig DCMS</span>
  </a>

  <?php $page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);?>
    <div class="sidebar">
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="dashboard.php" class="nav-link <?= $page == 'dashboard.php' ? 'active':''?>">
                <i class="fa fa-home nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
          <li class="nav-item">
            <a href="user-profile.php" class="nav-link <?= $page == 'user-profile.php' ? 'active':''?>">
              <i class="nav-icon fa fa-user"></i>
              <p>Profile</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>