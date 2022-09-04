<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MayLib - Login Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/home/style/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/style/style-basic.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/style/login-regis.css">
</head>

<body>

    <?= $this->renderSection('main') ?>


    <!-- Password toggle -->
    <script>
        function togglePassword() {
            var x = document.getElementById("password-content-3-5");
            if (x.type === "password") {
                x.type = "text";
                document
                .getElementById("icon-toggle")
                .setAttribute("fill", "#524EEE");
            } else {
                x.type = "password";
                document
                    .getElementById("icon-toggle")
                    .setAttribute("fill", "#CACBCE");
            }
        }
        
        function togglePassword2() {
            var x2 = document.getElementById("password-content-3-6");
            if (x2.type === "password") {
                x2.type = "text";
                document
                    .getElementById("icon-toggle2")
                    .setAttribute("fill", "#524EEE");
            } else {
                x2.type = "password";
                document
                    .getElementById("icon-toggle2")
                    .setAttribute("fill", "#CACBCE");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>