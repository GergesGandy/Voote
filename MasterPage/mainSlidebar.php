<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" style="text-align: center;">
        <img src="./assist/img/logo.png"
             alt="<?php $handel->h_getWord('projectName', 'e');?> Logo"
             class="brand-image img-circle elevation-3 Vlogo"
             style="opacity: .8;display:none;">
             <span class="brand-text font-weight-light"><img src="./assist/img/logoallw.png" width="100" height="55"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!---<img src="assist/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">-->
                <img src="<?php echo $handel->h_imagePath(); ?>" style="height: 35px;width: 35px;" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" id="nameMainSlidebar" class="d-block"><?php echo $handel->h_myName($_SESSION['startUser']);?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-child-indent nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                     <?php if ($page == 'Questions') { ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                        Group questions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" id="GroupQuestions">

                    </ul>
                </li>
                    <?php } ?>

                <li class="nav-item has-treeview hidden" id="forms">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Forms
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item" class="imageForm" id="imgForm1">
                            <a href="#" class="nav-link">
                                <!-- i class="fas fa-chart-bar"></i -->
                                <img src="assist/img/form1.png" alt="Form 1" class="formImg">
                            </a>
                        </li>
                        <li class="nav-item" class="imageForm" id="imgForm2">
                            <a href="#" class="nav-link">
                                <!-- i class="fas fa-chart-bar"></i -->
                                <img src="assist/img/form2.png" alt="Form 2" class="formImg">
                            </a>
                        </li>
                        <li class="nav-item" class="imageForm" id="imgForm3">
                            <a href="#" class="nav-link">
                                <!-- i class="fas fa-chart-bar"></i -->
                                <img src="assist/img/form3.png" alt="Form 3" class="formImg">
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item has-treeview hidden" id="data" hidden>
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <textarea id="quesText" class="form-control" rows="3" placeholder="Question ..." style="margin-top: 0px; margin-bottom: 0px; height: 78px;"></textarea>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <textarea id="a1" class="form-control" rows="3" placeholder="Answer 1 ..." style="margin-top: 0px; margin-bottom: 0px; height: 50px;" required></textarea>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <textarea id="a2" class="form-control" rows="3" placeholder="Answer 2 ..." style="margin-top: 0px; margin-bottom: 0px; height: 50px;" required></textarea>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <textarea id="a3" class="form-control" rows="3" placeholder="Answer 3 ... (optional)" style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <textarea id="a4" class="form-control" rows="3" placeholder="Answer 4 ...(optional)" style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Control Account</li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                        <i class="nav-icon fas fa-user-edit text-info"></i>
                        <p>Edit account</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"  data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="nav-icon fas fa-key text-warning"></i>
                        <p>Change Password</p>
                    </a>
                </li>
                <li class="nav-item logout">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Modal -->
<div class="modal fade changePass" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h5 class="col-12 wrong-ms d-none" id="wrongMS">Old password is incorect</h5>
          <h5 class="col-12 right-ms d-none" id="rightMS">Your password is changed</h5>
        Old Password: <input type="password" id="oldPass" class="form-control pull-right" placeholder="Old Password"><br>        
        New Password: <input type="password" id="newPass" class="form-control pull-right" placeholder="New Password">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="changePass">Save changes</button>
      </div>
    </div>
  </div>
</div>