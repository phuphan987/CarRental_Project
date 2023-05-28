<?php
session_start();
include('../../../server.php');
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    header("Location: ../../../index.php");
}

$sql = "SELECT * FROM rent_info";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../css/admin.css">
    <script src="https://kit.fontawesome.com/b33e8d6cbf.js" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../AdminHome.php" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-orange elevation-4">

            <a href="../../AdminHome.php" class="brand-link">
                <i class="fa-solid fa-car-side fa-lg ml-3 mr-1"></i>
                <span class="brand-text font-weight-light">Car Rental</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <span class="d-block text-white">Admin</span>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Databases
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../AdminPage.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Client</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="AdminPage2.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rent Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="AdminPage3.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Car Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="AdminPage4.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="AdminPage5.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Interested Car</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="AdminPage6.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Address</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="AdminPage7.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Credit card Client</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Advanced Analysis Report
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../analysis/analysis.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Advanced Analysis Report 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../analysis/analysis2.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Advanced Analysis Report 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../analysis/analysis3.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Advanced Analysis Report 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="../../../Logout.php" class="nav-link">
                                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                <p>
                                    Log Out
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="mb-2">
                        <div>
                            <h3 class="ml-2 mb-3">Rent Information Table</h3>
                            <div class="table-responsive-md">
                                <table class="table table-striped table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th class="text-center">Action</th>
                                            <th>Rental ID</th>
                                            <th>Client ID</th>
                                            <th>License Plate</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Credit card ID</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td class="d-flex justify-content-center"><button class="btn btn-danger" style="height:40px"
                                                        onclick="rentalDelete('<?= $row['rental_id'] ?>')">Delete</button>
                                                </td>
                                                <td>
                                                    <?php echo $row['rental_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['client_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['license_plate']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['start_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['end_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['credit_card_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['payment_date']; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <script src="../../dist/js/admincontroll.js"></script>
</body>

</html>

<?php
mysqli_close($con);
?>