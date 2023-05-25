<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_orange.css">
</head>

<body>

    <form action="">
        <input type="date-local" placeholder="Select date">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date-local]", {
            mode: "range",
            dateFormat: "Y-m-d",
            minDate: "today",
            maxDate: "2023.12.31",
            disable: [
                {
                    from: "2023-05-27",
                    to: "2023-05-28"
                },
                {
                    from: "2023-06-01",
                    to: "2023-06-05"
                }
            ]
        });
    </script>
</body>

</html>