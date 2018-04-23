<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="stylesheet" href="css/forms.css">
    <title>Office Hours | <?php echo $title ?></title>
    <script src="js/jquery.js"></script>
    <script>
            showView();

            function showView() {
                $(document).ready(function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $view ?>.php",
                        success: function (result) {
                            $("#view").html(result);
                        }
                    });
                });
            }
        </script>
</head>