<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
  </a>
  <nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
          <g>
            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
          </g>
        </svg>
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="dashboard" class="nav-link">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Transactions Modules</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">

      <li class="nav-item">
        <a class="nav-link pl-3" href="purchase-request"><i class="fe fe-16 fe-users"></i> <span class="ml-2 item-text">Purchase Request</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link pl-3" href="supply-qoutations"><i class="fe fe-16 fe-align-justify"></i> <span class="ml-2 item-text">Supply Quataions</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link pl-3" href="purchase-order"><i class="fe fe-16 fe-shopping-cart"></i> <span class="ml-2 item-text">Purchase Order</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link pl-3" href="test-test"><i class="fe fe-16 fe-align-justify"></i> <span class="ml-2 item-text">Payments</span></a>
      </li>


      <li class="nav-item dropdown">
        <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-credit-card fe-16"></i>
          <span class="ml-3 item-text">Master File</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="forms">
          <li class="nav-item">
            <a class="nav-link pl-3" href="clients"><i class="fe fe-16 fe-users"></i> <span class="ml-2 item-text">Clients</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="supplier"><i class="fe fe-16 fe-box"></i> <span class="ml-2 item-text">Supplier</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="supplies-items"><i class="fe fe-16 fe-align-justify"></i> <span class="ml-2 item-text">Supplies / Items</span></a>
          </li>
          <?php 
          if ($session['session']['user_id'] == 1) {
           echo '
                 <li class="nav-item">
            <a class="nav-link pl-3" href="users-account"><i class="fe fe-16 fe-user"></i> <span class="ml-2 item-text">Users Account</span></a>
          </li>
           ';
          }
          ?>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#forms2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-credit-card fe-16"></i>
          <span class="ml-3 item-text">Sales Reports</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="forms2">
          <li class="nav-item">
            <a class="nav-link pl-3" href="test-test"><i class="fe fe-16 fe-pie-chart"></i> <span class="ml-2 item-text">Stament of Accounts</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="test-test"><i class="fe fe-16 fe-pie-chart"></i> <span class="ml-2 item-text">Genenal Monitoring</span></a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</aside>
