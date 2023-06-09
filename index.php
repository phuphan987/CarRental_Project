<?php
session_start();
$loggedIn = isset($_SESSION['loggedIn']) ? $_SESSION['loggedIn'] : false;

include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b33e8d6cbf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
</head>

<body>
    <?php
    if (!$loggedIn) {
        include 'navbaruser.php';
    } else {
        include 'navbarclient.php';
    }
    ?>
    <div class="container-md d-flex justify-content-center align-items-center mt-3 text-white">
        <main class="search-container">
            <div class="mb-1">
                <div class="date-res">
                    <label for="start-date"><i class="fa-regular fa-calendar me-2"></i>Start Date &nbsp; </label>
                    <input type="text" id="start-date" name="start-date" class="date-info date-info-res">
                    <span class="me-4 sp-responsive"></span>
                    <br class="br-responsive">
                    <label for="end-date"><i class="fa-regular fa-calendar me-2"></i>End Date &nbsp; </label>
                    <input type="text" id="end-date" name="end-date" class="date-info">
                </div>

                <br>
                <center class="mb-2">Province</center>

                <div class="search-wrapper">
                    <input type="text" id="province_selected" class="form-control"
                        onkeyup="fetchSuggestions(this.value,'fetch_suggestions_province.php')" style="border: 1px solid #ccc;
    background: #f9f9f9;">
                    <ul id="suggestions-list1"></ul>
                </div>

                <br>
                <center class="mb-2">District</center>

                <div class="search-wrapper">
                    <input type="text" id="district_selected" class="form-control"
                        onkeyup="fetchSuggestions_district(this.value, 'fetch_suggestions_district.php', $('#province_selected').val())"
                        style="border: 1px solid #ccc;
    background: #f9f9f9;">
                    <ul id="suggestions-list2"></ul>
                </div>

                <br>
                <center class="mb-2">Brand</center>

                <div class="search-wrapper mb-3">
                    <input type="text" id="brand_selected" class="form-control"
                        onkeyup="fetchSuggestions(this.value,'fetch_suggestions_brand.php')" style="border: 1px solid #ccc;
    background: #f9f9f9;">
                    <ul id="suggestions-list3"></ul>
                </div>

                <div class="transmission-wrapper d-flex justify-content-center mb-4">
                    <input class="me-1" type="radio" name="transmission" value="Automatic"> Automatic
                    <span class="me-3"></span>
                    <input class="me-1" type="radio" name="transmission" value="Manual Transmission"> Manual
                    Transmission
                </div>

                <button class="search-btn" onclick="search()">Find Car</button>
                <script>
                    function fetchSuggestions(keyword, url) {

                        $.ajax({
                            url: url,
                            method: 'POST',
                            data: { keyword: keyword },
                            success: function (data) {
                                var activeInput = $('.form-control:focus');
                                var suggestionsList;

                                if (activeInput.attr('id') === 'province_selected') {
                                    suggestionsList = $('#suggestions-list1');
                                } else if (activeInput.attr('id') === 'brand_selected') {
                                    suggestionsList = $('#suggestions-list3');
                                }
                                if (activeInput.attr('id') === 'province_selected') {
                                    $('#district_selected').val('');
                                }
                                suggestionsList.html(data);
                            }
                        });
                    }
                    function fetchSuggestions_district(keyword, url, province) {
                        $.ajax({
                            url: url,
                            method: 'POST',
                            data: {
                                keyword: keyword,
                                province: province
                            },
                            success: function (data) {
                                var suggestionsList = $('#suggestions-list2');
                                suggestionsList.html(data);
                            }
                        });
                    }

                    $(document).on('click', '#suggestions-list1 li', function () {
                        var selectedOption = $(this).text();
                        $('#province_selected').val(selectedOption);
                        $('#suggestions-list1').empty();
                    });

                    $(document).on('click', '#suggestions-list2 li', function () {
                        var selectedOption = $(this).text();
                        $('#district_selected').val(selectedOption);
                        $('#suggestions-list2').empty();
                    });
                    $(document).on('click', '#suggestions-list3 li', function () {
                        var selectedOption = $(this).text();
                        $('#brand_selected').val(selectedOption);
                        $('#suggestions-list3').empty();
                    });
                    $(document).on('click', function (e) {

                        if (!$(e.target).closest('.search-wrapper').length) {
                            $('#suggestions-list1').empty();
                            $('#suggestions-list2').empty();
                            $('#suggestions-list3').empty();
                        }
                    });
                </script>
                <script src="js/date.js"></script>
        </main>
    </div>

    <footer>
        <p> Copyright © 2023.</p>
    </footer>
</body>

</html>