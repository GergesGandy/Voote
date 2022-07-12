<nav class="main-header navbar navbar-expand navbar-white navbar-light" <?php if($page == 'Mobile'){echo ' style="margin-left:0px !important;"'; }?>>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <?php if ($page == 'Questions') { ?>
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <?php } ?>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <?php if ($page != 'Mobile'){ ?>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="createGroup.php" class="nav-link">Group</a>
        </li>
        <li class="nav-item d-none creaetNewBut" id="createNewTab" onclick="document.location.reload();">
            <a class="nav-link">Create new Question</a>
        </li>
        <?php }?>
    </ul>
<?php if ($page == 'Mobile'){?>
    <!-- Enter Group FORM -->
    <form class="form-inline ml-3" >
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="GroupId" type="search" placeholder="Group ID" aria-label="Group ID">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-vote-yea"></i>
                </button>
            </div>
        </div>
    </form>
<?php } if ($page != 'Mobile'){ ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown logout">
            <a class="nav-link" title="Logout" href="#">
                <i class="fas fa-sign-out-alt"></i>
                <span class="badge badge-warning navbar-badge"></span>
            </a>
        </li>
    </ul>
<?php } ?>
</nav>