<?php
session_start();
include('../../../server.php');
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    header("Location: ../../../index.php");
}

$sql = "SELECT b.brand AS Brand, COUNT(r.rental_id) AS 'Number of Leases', 
SUM(DATEDIFF(r.end_date, r.start_date) * c.price_per_day) AS 'Revenue Generated from Leasing'
FROM rent_info r
INNER JOIN car_info c ON r.license_plate = c.license_plate
INNER JOIN brand_info b ON c.model_id = b.model_id
GROUP BY b.brand
ORDER BY COUNT(r.rental_id) DESC;";
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
    <style>
        .chartbox {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .chart-container {
            position: relative;
            width: 100%;
            max-width: 500px;
            height: 300px;
        }

        #bar-chart, #Revenue-chart {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
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
                                    <a href="../admin/AdminPage2.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rent Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../admin/AdminPage3.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Car Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../admin/AdminPage4.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../admin/AdminPage5.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Interested Car</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../admin/AdminPage6.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Address</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../admin/AdminPage7.php" class="nav-link">
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
                                    <a href="analysis.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Advanced Analysis Report 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="analysis2.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Advanced Analysis Report 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="analysis3.php" class="nav-link">
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
                            <h3 class="ml-2 mb-3">Top rented car brands</h3>
                            <div class="chartbox">
                                <div class="chart-container">
                                    <canvas id="bar-chart"></canvas>
                                </div>
                                <div class="chart-container">
                                    <canvas id="Revenue-chart"></canvas>
                                </div>
                            </div>
                            <div class="table-responsive-md">
                                <table class="table table-striped table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th>Brand</th>
                                            <th>Number of Leases</th>
                                            <th>Revenue Generated from Leasing</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['Brand']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['Number of Leases']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['Revenue Generated from Leasing']; ?>
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
        
        <!-- Graph plot -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
        <script>
            var tableData = [];
            var tableRows = document.querySelectorAll("table tbody tr");
            tableRows.forEach(function (row) {
                var brand = row.cells[0].textContent.trim();
                var leases = parseInt(row.cells[1].textContent);
                var revenue = parseFloat(row.cells[2].textContent);
                tableData.push({ brand: brand, leases: leases, revenue: revenue });
            });

            tableData.sort(function (a, b) {
                return b.leases - a.leases;
            });

            if (tableData.length > 10) {
                var otherLeases = 0;
                var otherRevenue = 0;

                for (var i = 10; i < tableData.length; i++) {
                    otherLeases += tableData[i].leases;
                    otherRevenue += tableData[i].revenue;
                }

                tableData = tableData.slice(0, 10);

                tableData.push({
                    brand: "Other",
                    leases: otherLeases,
                    revenue: otherRevenue
                });
            }

            var brands = tableData.map(function (data) {
                return data.brand;
            });
            var leaseCounts = tableData.map(function (data) {
                return data.leases;
            });

            new Chart(document.getElementById("bar-chart"), {
                type: "bar",
                data: {
                    labels: brands,
                    datasets: [
                        {
                            label: "Number of Leases",
                            data: leaseCounts,
                            backgroundColor: "rgba(54, 162, 235, 0.6)",
                            borderColor: "rgba(54, 162, 235, 1)",
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });

            // Get the data from the table (revenue)
            var tableData = [];
            var tableRows = document.querySelectorAll("table tbody tr");
            tableRows.forEach(function (row) {
                var brand = row.cells[0].textContent.trim();
                var leases = parseInt(row.cells[1].textContent);
                var revenue = parseFloat(row.cells[2].textContent);
                tableData.push({ brand: brand, leases: leases, revenue: revenue });
            });

            tableData.sort(function (a, b) {
                return b.revenue - a.revenue;
            });

            if (tableData.length > 10) {
                var otherLeases = 0;
                var otherRevenue = 0;

                for (var i = 10; i < tableData.length; i++) {
                    otherLeases += tableData[i].leases;
                    otherRevenue += tableData[i].revenue;
                }

                tableData = tableData.slice(0, 10); 

                tableData.push({
                    brand: "Other",
                    leases: otherLeases,
                    revenue: otherRevenue
                });
            }

            var brands = tableData.map(function (data) {
                return data.brand;
            });
            var revenues = tableData.map(function (data) {
                return data.revenue;
            });

            new Chart(document.getElementById("Revenue-chart"), {
                type: "bar",
                data: {
                    labels: brands,
                    datasets: [
                        {
                            label: "Revenue Generated from Leasing",
                            data: revenues,
                            backgroundColor: "rgba(75, 192, 192, 0.6)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });

        </script>
</body>

</html>

<?php
mysqli_close($con);
?>