
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin - Bootstrap Admin Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--https://datatables.net-->
        <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">

    </head>

    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">CMS Admin</a>
                    </div>
                    <!-- Top Menu Items -->
                    <ul class="nav navbar-right top-nav">

                        <li>
                            <a href="../index.php">Home Page</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> omar tuffaha <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="http://localhost/udemy_blog/includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav side-nav">
                            <li>
                                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="posts_dropdown" class="collapse">
                                    <li>
                                        <a href="posts.php"> View All Posts</a>
                                    </li>
                                    <li>
                                        <a href="posts.php?source=add_post">Add Posts</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="categories.php"><i class="fa fa-fw fa-table"></i> Categories</a>
                            </li>
                            <li>
                                <a href="comments.php"><i class="fa fa-fw fa-desktop"></i> Comments</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#users_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="users_dropdown" class="collapse">
                                    <li>
                                        <a href="users.php">View All Users</a>
                                    </li>
                                    <li>
                                        <a href="users.php?source=add_user">Add User</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </nav>


            <div id="page-wrapper">
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Welcome To Admin
                                <small>admin</small>
                            </h1>




                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Author</td>
                                        <td>Title</td>
                                        <td>Category</td>
                                        <td>Status</td>
                                        <td>Image</td>
                                        <td>Tag</td>
                                        <td>Comment</td>
                                        <td>Date</td>
                                        <td>Options</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>7</td><td>Dana </td><td>yayyyyyyyyyyyyyyy!!</td><td>test</td><td>published</td><td><img width='100' src='../images/img_59493322b1490.jpg' alt='post image'></td><td></td><td>0</td><td>2017-06-20</td><td><a href='posts.php?source=edit_post&post_id=7'>edit</a>/<a href='posts.php?source=delete_post&post_id=7'>Delete</a></td></tr><tr><td>6</td><td>test</td><td>uhgvdbhjs</td><td>test</td><td>published</td><td></td><td></td><td>0</td><td>2017-06-18</td><td><a href='posts.php?source=edit_post&post_id=6'>edit</a>/<a href='posts.php?source=delete_post&post_id=6'>Delete</a></td></tr><tr><td>5</td><td>omar Tuffaha</td><td>post #2</td><td>test</td><td>published</td><td><img width='100' src='../images/img_5943cdef1ae07.jpg' alt='post image'></td><td>php,javascript,other</td><td>0</td><td>2017-06-16</td><td><a href='posts.php?source=edit_post&post_id=5'>edit</a>/<a href='posts.php?source=delete_post&post_id=5'>Delete</a></td></tr><tr><td>1</td><td>Omar Tuffaha</td><td>The First post #2</td><td>test</td><td>published</td><td><img width='100' src='../images/test.jpg' alt='post image'></td><td>php,nodejs</td><td>0</td><td>2017-06-14</td><td><a href='posts.php?source=edit_post&post_id=1'>edit</a>/<a href='posts.php?source=delete_post&post_id=1'>Delete</a></td></tr>    </tbody>
                            </table>






                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- /#page-wrapper -->
                </div>
            </div>
            <!-- /#wrapper -->
            <!-- jQuery -->
            <script
                src="https://code.jquery.com/jquery-3.2.1.js"
                integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <!--https://datatables.net/-->
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
            <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>


            <script>
                $(document).ready(function () {
                    $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>
    </body>

</html>
