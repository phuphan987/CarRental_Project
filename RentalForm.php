<?php
include 'Rental.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Form</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/rental.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b33e8d6cbf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
</head>

<body>

    <?php include 'navbarclient.php'; ?>

    <div class="container-md d-flex justify-content-center align-items-center">
        <div class="row bg-white">

            <div class="rental-left col-7">
                <div class="ps-2 mb-2"><a href="#" class="back-btn"><i class="fa-solid fa-angle-left"></i>&nbsp;&nbsp;Back</a></div>
                <div class="mb-5 ps-2 border-bottom">
                    <h2 class="title text-uppercase">Rental Form</h2>
                </div>

                <img src="<?php echo $image_path; ?>" alt="car-image" class="car-img ps-2 pe-2">

                <div class="ps-2 pb-2 mt-4 border-bottom">
                    <h3 class="fw-bold">
                        <?php echo $brand, ' ', $model_name, ' ', $year_car, ' | '; ?>
                        <span class="price-car">
                            <?php echo $formatted_price, ' THB/day'; ?>
                        </span>
                    </h3>

                    <div class="d-flex flex-wrap align-items-center mt-4">
                        <div class="me-5 pe-4">
                            <h6 class="car-info">License Plate</h6>
                            <p class="text-uppercase">
                                <?php echo $license_plate; ?>
                            </p>
                        </div>
                        <div class="me-5 pe-4">
                            <h6 class="car-info">Transmission</h6>
                            <p class="text-uppercase">
                                <?php echo $transmission; ?>
                            </p>
                        </div>
                        <div class="me-5 pe-4">
                            <h6 class="car-info">Seat</h6>
                            <p class="text-uppercase">
                                <?php echo $seat; ?>
                            </p>
                        </div>
                        <div>
                            <h6 class="car-info">Location</h6>
                            <p class="text-uppercase">
                                <?php echo $province, ' - ', $district; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="ps-2 pb-4 mt-4 border-bottom">
                    <h4 class="fw-bold">Lessor</h4>
                    <div class="mt-4">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-circle-user fa-2xl me-2"></i>
                            <p class="lessor-info">
                                <?php echo $lessor_name; ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="rental-right col-5">

                <div class="pickdrop-info border rounded me-2">
                    <h5 class="fw-bold mb-3">Pick-up and drop-off</h5>

                    <div class="d-flex flex-column ms-2">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label for="start-date"><i class="fa-regular fa-calendar me-2"></i>Pick-up</label>
                            <div>
                                <input type="text" name="start-date" id="start-date" class="date-info" />
                                <select id="time-picker1" class="time-info"></select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <label for="end-date"><i class="fa-regular fa-calendar me-2"></i>Drop-off</label>
                            <div>
                                <input type="text" name="end-date" id="end-date" class="date-info" />
                                <select id="time-picker2" class="time-info"></select>
                            </div>
                        </div>

                    </div>

                    <div class="mt-2 ms-2">
                        <p style="color: red; font-size: 12px;">* Pick-up and drop-off times will be the same.</p>
                    </div>
                </div>

                <div class="cost-info border rounded me-2 mt-4">
                    <h5 class="fw-bold mb-3">Cost Detail</h5>

                    <div class="d-flex justify-content-between mb-3 border-bottom">
                        <p class="" id="day-diff">1 day rate</p>
                        <p class="" id="price1">
                            <?php echo 'THB ', $formatted_price; ?>
                        </p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="fs-5">Total payment</p>
                        <p class="fs-5 fw-bold total-price" id="price2">
                            <?php echo 'THB ', $formatted_price; ?>
                        </p>
                    </div>

                </div>

                <div class="mt-3"><a href="#"> <button class="submit-btn text-white rounded">Continue</button></a></div>

            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script>
        var price = <?php echo $price; ?>;
    </script>
    <script src="js/rental.js"></script>

</body>

</html>