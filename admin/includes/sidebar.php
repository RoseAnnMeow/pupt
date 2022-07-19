
  <aside class="main-sidebar sidebar-dark-red elevation-3">
  <?php 
    $sql = "SELECT * FROM system_details LIMIT 1";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
  ?>
  <a href="../index.php" class="brand-link">
    <img src="../upload/<?=$row['logo'];}?>" alt="PUP Taguig DCMS Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-normal text-lg text-white">PUP Taguig DCMS</span>
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
          <a href="admins.php" class="nav-link <?= $page == 'admins.php' ? 'active':''?>">
            <i class="fas fa-user-shield nav-icon"></i>
            <p>Admins </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="dentist.php" class="nav-link <?= $page == 'dentist.php' || $page == 'dentist-details.php' ? 'active':''?>">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Dentist</p>
          </a>
        </li>         
        <li class="nav-item">
          <a href="staff.php" class="nav-link <?= $page == 'staff.php' ? 'active':''?>">
            <i class="nav-icon fas fa-user-nurse"></i>
            <p>Staff</p>
          </a>
        </li>   
        <li class="nav-item">
          <a href="patients.php" class="nav-link <?= $page == 'patients.php' || $page == 'patient-details.php'? 'active' : '' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>Patients</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="schedule.php" class="nav-link <?= $page == 'schedule.php' ? 'active':''?>">
            <i class="nav-icon fas fa-clock"></i>
            <p>Schedule</p>
          </a>
        </li>
        <li class="nav-item <?= $page == 'appointment.php' || $page == 'calendar.php' || $page == 'online-request.php' ? 'menu-open':''?>">
          <a href="#" class="nav-link <?= $page == 'appointment.php' || $page == 'calendar.php' || $page == 'online-request.php' ? 'active':''?>">
            <i class="nav-icon fas fa-calendar"></i>
            <p>
              Appointment List
              <i class="fas fa-angle-left right"></i>
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
              </a>
            </li>
            <li class="nav-item">
              <a href="calendar.php" class="nav-link <?= $page == 'calendar.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Calendar</p>
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
          <a href="services.php" class="nav-link <?= $page == 'services.php' ? 'active':''?>">
            <i class="nav-icon fas fa-teeth"></i>
            <p>Dental Services</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="prescription.php" class="nav-link <?= $page == 'prescription.php' || $page == 'add-prescription.php' || $page == 'view-prescription.php' || $page == 'edit-prescription.php' ? 'active':''?>">
            <i class="nav-icon fas fa-prescription"></i>
            <p>Prescription</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="treatment.php" class="nav-link <?= $page == 'treatment.php'  ? 'active':''?>">
            <i class="nav-icon fas fa-file-check"></i>
            <p>Treatment</p>
          </a>
        </li>
        <li class="nav-item <?= $page == 'highlight-content.php' || $page == 'about.php' || $page == 'procedures.php' || $page == 'health-declaration.php' || $page == 'review.php' || $page == 'gallery.php'|| $page == 'featured-dentist.php' || $page == 'settings.php' ? 'menu-open':''?>">
          <a href="#" class="nav-link <?= $page == 'highlight-content.php' || $page == 'about.php' || $page == 'procedures.php' || $page == 'health-declaration.php' || $page == 'review.php' || $page == 'gallery.php'|| $page == 'featured-dentist.php' || $page == 'settings.php' ? 'active':''?>">
            <i class="nav-icon fas fa-globe"></i>
            <p>Website</p>
            <i class="fas fa-angle-left right "></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="highlight-content.php" class="nav-link <?= $page == 'highlight-content.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Highlight Content</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="about.php" class="nav-link <?= $page == 'about.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="health-declaration.php" class="nav-link <?= $page == 'health-declaration.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Questionnaire</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="review.php" class="nav-link <?= $page == 'review.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Review</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="gallery.php" class="nav-link <?= $page == 'gallery.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Gallery</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="featured-dentist.php" class="nav-link <?= $page == 'featured-dentist.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Featured Dentist</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="settings.php" class="nav-link <?= $page == 'settings.php' ? 'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Website Settings</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="reports.php" class="nav-link <?= $page == 'reports.php' ? 'active':''?>">
            <i class="nav-icon fas fa-file-pdf "></i>
            <p>Reports</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>