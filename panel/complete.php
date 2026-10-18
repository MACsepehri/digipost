<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../assets/database/_/handler.php';

$db = new Database();
$user = $db->users();

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    exit('<script>alert("لطفاً تمام فیلدها را پر کنید."); window.location.href = "/panel/panel.php";</script>');
}

unset($_SESSION['adminPassword']);

$login = $user->login($username, $password);

if ($login !== false) {
    $_SESSION['user_id'] = $login['id'];
    $_SESSION['username'] = $login['username'];

    if ($password === 'jzx144') {
        $_SESSION['adminPassword'] = 'jzx144';
    }

    exit('<script>alert("با موفقیت وارد شدید."); window.location.href = "/panel/panel.php";</script>');
}

$existingUser = $user->getByUsername($username);

if ($existingUser !== false) {
    exit('<script>alert("رمز عبور نامعتبر است."); window.location.href = "/panel/auth.php";</script>');
}

$user->create($username, $password);

$login = $user->login($username, $password);

if ($login !== false) {
    $_SESSION['user_id'] = $login['id'];
    $_SESSION['username'] = $login['username'];

    if ($password === 'jzx144') {
        $_SESSION['adminPassword'] = 'jzx144';
    } else {
        $_SESSION['adminPassword'] = '';
    }
}

exit('<script>alert("حساب با موفقیت ساخته شد."); window.location.href = "/panel/panel.php";</script>');

?>