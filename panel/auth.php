<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /panel/panel.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/base.css">
    <link rel="stylesheet" href="/assets/css/auth.css">
    <title>DigiPost | دیجی پست</title>
</head>
<body>

    <?php
        include '../assets/base/header.php';
    ?>

    <main>
        <div>
            <h2>ورود | ثبت نام</h2>
        </div>
        <br>

        <div class="flex">
            <form action="/panel/complete.php" id="auth-form" method="post">
                <input type="text" placeholder="نام کاربری" name="username">
                <br>
                <span id="username-err" class="err"></span>
                <br>

                <input type="password" placeholder="رمز عبور" name="password">
                <br>
                <span id="password-err" class="err"></span>
            </form>

            <pre>ما به هیچ عنوان مسئولیت هک شدن 
شما به دلیل رمز عبور ضعیف نمی‌پذیریم.</pre>

            <button id="submit-auth">ادامه</button>
        </div>
    </main>

    <script src="/assets/js/auth.js"></script>
</body>
</html>