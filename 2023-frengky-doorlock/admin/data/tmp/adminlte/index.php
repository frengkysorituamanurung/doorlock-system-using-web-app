<?php

    $default_url = '../../../data/tmp/adminlte';
    $url = $default_url.'/file';
    ?>
<?php 
    include '../../../include/all_include.php';        
    include '../../../include/function/session.php';

$id_role = decrypt($_COOKIE['id_role']);
$id_user = decrypt($_COOKIE['id_user']);
    ?>
<link
    rel="stylesheet"
    href="<?php echo $url;?>/bootstrap/css/bootstrap.min.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link
    rel="stylesheet"
    href="<?php echo $url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo $url;?>/dist/css/AdminLTE.min.css">
<link
    rel="stylesheet"
    href="<?php echo $url;?>/dist/css/skins/_all-skins.min.css">
<script
    type="text/javascript"
    src="<?php echo $default_url;?>/txt/ckeditor/ckeditor.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">

        <a class="logo">
            <span class="logo-mini">
                <b>

                    <?php echo ucwords($judul); ?>

                </b>
            </span>
            <span class="logo-lg">
                <b><?php echo strtolower($judul); ?></b>
            </span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only"><?php echo ucwords($judul); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $avatar; ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $siapa;?></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-header">
                                <img src="<?php echo $avatar; ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $siapa;?>
                                    <small>Login
                                        <?php echo $siapa;?></small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php home();?>" class="btn btn-default btn-flat">home</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php logout();?>" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" data-toggle="control-sidebar">
                            <i class="fa fa-gears"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>

    <aside class="main-sidebar">

        <section class="sidebar">

            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo $avatar; ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo ucwords($siapa);?></p>

                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">Menu</li>

                <!-- MENU -->
                <?php
                if ($id_role == "ROL20230614013017953")
                {
                    $m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
                }
                else
                {
                    $m = new SimpleXMLElement('../../../include/settings/menu_user.xml', null, true);
                }

foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
                <li class="treeview">
                    <a href="<?php echo $i->l;?>">
                        <i class="<?php echo $i->i;?>"></i>
                        <span><?php echo $i->n;?></span>

                    </a>
                </li>
                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->

                <li class="treeview">
                    <a href="#">
                        <i class="<?php echo $i->i;?>"></i>
                        <span><?php echo $i->n;?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <?php

                            if ($id_role == "ROL20230614013017953")
                            {
                                $m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
                            }
                            else
                            {
                                $m1 = new SimpleXMLElement('../../../include/settings/menu_user.xml', null, true);
                            }



		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                        <li>
                            <a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
                                <?php echo $i1->n;?></a>
                        </li>
                        <?php }} ?>
                    </li>
                </ul>
            </li>

            <!-- /MULTI -->
            <?php }} ?>
            <!-- /MENU -->

        </ul>
    </section>
</aside>

<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info box-solid direct-chat direct-chat-info">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?php tabelnomin(); ?></h3>
                        <div class="box-tools pull-right">

                            <button class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div >
                        <br>
                        <div class="col-xs-12">
                            <?php include 'halaman.php'; ?>
                        </div>
                    </div>
                    <div class="box-footer" style="display: block;"></div>
                </div>

            </div>
        </div>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b><?php echo $judul; ?></b>
    </div>
    <strong><?php echo $copyright; ?></strong>
</footer>
<!-- desain -->
<aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li>
            <a href="#control-sidebar-home-tab" data-toggle="tab">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li>
            <a href="#control-sidebar-settings-tab" data-toggle="tab">
                <i class="fa fa-gears"></i>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <!-- home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked="checked">
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked="checked">
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked="checked">
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked="checked">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>

<div class="control-sidebar-bg"></div>
</div>

<script src="<?php echo $url;?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo $url;?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $url;?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $url;?>/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo $url;?>/dist/js/app.min.js"></script>
<script src="<?php echo $url;?>/dist/js/demo.js"></script>
</body>
</html>