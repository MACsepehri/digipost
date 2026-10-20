<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /panel/auth.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/base.css">
    <link rel="stylesheet" href="/assets/css/panel.css">
    <title>DigiPost | دیجی پست</title>
</head>
<body>

    <?php
        include '../assets/base/header.php';
    ?>

    <main>
        <div class='default-box'>
            <div>
                <h2>پنل کاربری</h2>
            </div>
            <div style='margin: auto; text-align: center;' id='main-box'>
                <div dir='ltr' class='header-box'>
                    <button onclick="window.location.href='/panel/logout.php'">
خروج از حساب
</button>
                    <button id='post-part-btn'>آپلود پست</button>
                    <button id='settings-part-btn'>تنظیمات کاربری</button>
                    <button id='status-part-btn'>آمار پروفایل</button>
                </div>
                <div id='panel-content'>
                    <h3>خوش آمدی <?php echo $_SESSION['username'] ?>!</h3>
                    <pre>اینجا آزادی که اخبار یا هر متن یا مقاله ای
درباره تکنولوژی دوست داری پست کنی.
یا یک پروفایل خفن درست کنی و دانشی
که از تکنولوژی داری رو به رخ بکشی!
                    </pre>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/js/panel.js"></script>
</body>
</html>