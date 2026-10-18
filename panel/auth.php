<!DOCTYPE html>
<html lang="fa" dir='rtl'>
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
        </div><br>
        <div class='flex'>
            <form action="/panel/complete.php" id='auth-form' method='post'>
                <input type="text" placeholder='نام کاربری'><br>
                <input type="password" placeholder='رمز عبور'><br>
            </form><br>
            <button id='submit-auth'>ادامه</button>
        </div>
    </main>
</body>
</html>
