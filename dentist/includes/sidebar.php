
  <aside class="main-sidebar sidebar-dark-red elevation-3">
  <?php 
    $sql = "SELECT * FROM system_details LIMIT 1";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
  ?>
  <a href="../index.php" class="brand-link">
    <img src="../upload/<?=$row['logo'];}?>" alt="PUP Taguig DCMS< Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-normal text-lg text-light">PUP Taguig DCMS</span>
  </a>
  <?php $page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);?>
  <div class="sidebar">
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="index.php" class="nav-link <?= $page == 'index.php' ? 'active':''?>">
            <i class="fa fa-home nav-icon"></i>
            <p>Dashboard </p>
          </a>
        </li>  
        <li class="nav-item">
          <a href="patients.php" class="nav-link <?= $page == 'patients.php' || $page == 'patient-details.php'? 'active' : '' ?>">
            <i class="nav-icon  fa fa-users-medical"></i>
            <p>Patients</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="schedule.php" class="nav-link <?= $page == 'schedule.php' ? 'active':''?>">
            <i class="nav-icon  fas fa-clock"></i>
            <p>Schedule</p>
          </a>
        </li>
        <li class="nav-item <?= $page == 'appointment.php' || $page == 'calendar.php' || $page == 'online-request.php' ? 'menu-open':''?>">
          <a href="#" class="nav-link <?= $page == 'appointment.php' || $page == 'calendar.php' || $page == 'online-request.php' ? 'active':''?>">
            <i class="nav-icon  fas fa-calendar"></i>
            <p>
              Appointment
              <i class="fas fa-angle-left right"></i>
              <?php 
                $user_id = $_SESSION['auth_user']['user_id'];
                $sql = "SELECT * FROM tblappointment WHERE status='Pending' AND doc_id='$user_id'";
                $query_run = mysqli_query($conn,$sql);
                $row = mysqli_num_rows($query_run);
                if($row > 0)
                {
                    echo '<span class="right badge badge-danger">New</span>';
                }
                ?>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="appointment.php" class="nav-link <?= $page == 'appointment.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Walk In Request</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="online-request.php" class="nav-link <?= $page == 'online-request.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Online Request</p>
                <?php 
                $user_id = $_SESSION['auth_user']['user_id'];
                $sql = "SELECT * FROM tblappointment WHERE schedtype='Online Schedule' AND status='Pending' AND doc_id='$user_id'";
                $query_run = mysqli_query($conn,$sql);
                $row = mysqli_num_rows($query_run);
                if($row > 0)
                {
                    echo '<span class="badge badge-warning right">'.$row.'</span>';
                }
                ?>
              </a>
            </li>
            <li class="nav-item">
              <a href="calendar.php" class="nav-link <?= $page == 'calendar.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Calendar</p>
                <?php 
                $user_id = $_SESSION['auth_user']['user_id'];
                $sql = "SELECT * FROM tblappointment WHERE status='Confirmed' AND doc_id='$user_id'";
                $query_run = mysqli_query($conn,$sql);
                $row = mysqli_num_rows($query_run);
                if($row > 0)
                {
                    echo '<span class="badge badge-success right">'.$row.'</span>';
                }
                ?>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?= $page == 'all-medicine.php' || $page == 'medicine-stock.php' || $page == 'medicine-stock-history.php' || $page == 'medicine-transactions.php' ? 'menu-open':''?>">
          <a href="#" class="nav-link <?= $page == 'all-medicine.php' || $page == 'medicine-stock.php' || $page == 'medicine-stock-history.php' || $page == 'medicine-transactions.php' ? 'active':''?>">
            <i class="nav-icon fas fa-capsules"></i>
            <p>
              Medicine Inventory
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="all-medicine.php" class="nav-link <?= $page == 'all-medicine.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Medicines</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="medicine-stock.php" class="nav-link <?= $page == 'medicine-stock.php' || $page == 'medicine-stock-history.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Stocks</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="medicine-transactions.php" class="nav-link <?= $page == 'medicine-transactions.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Transactions</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?= $page == 'all-supply.php' || $page == 'supply-stock.php' || $page == 'supply-stock-history.php' || $page == 'supply-transactions.php' ? 'menu-open':''?>">
          <a href="#" class="nav-link <?= $page == 'all-supply.php' || $page == 'supply-stock.php' || $page == 'supply-stock-history.php' || $page == 'supply-transactions.php' ? 'active':''?>">
            <i class="nav-icon fas fa-box-open"></i>
            <p>
              Supplies Inventory
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="all-supply.php" class="nav-link <?= $page == 'all-supply.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Supply</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="supply-stock.php" class="nav-link <?= $page == 'supply-stock.php' || $page == 'supply-stock-history.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Stocks</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="supply-transactions.php" class="nav-link <?= $page == 'supply-transactions.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Transactions</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="prescription.php" class="nav-link <?= $page == 'prescription.php' || $page == 'add-prescription.php' || $page == 'view-prescription.php' || $page == 'edit-prescription.php' ? 'active':''?>">
            <i class="nav-icon  fas fa-prescription"></i>
            <p>Prescription</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="treatment.php" class="nav-link <?= $page == 'treatment.php'  ? 'active':''?>">
            <i class="nav-icon  fas fa-file-check"></i>
            <p>Treatment</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="reports.php" class="nav-link <?= $page == 'reports.php' ? 'active':''?>">
            <i class="nav-icon fas fa-file-pdf "></i>
            <p>Reports</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="profile.php" class="nav-link <?= $page == 'profile.php' ? 'active':''?>">
            <i class="nav-icon  fa fa-user-alt"></i>
            <p>Profile</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>