<?php
session_start();
require_once __DIR__.'/../vendor/autoload.php';

use Prisma\Client;

$prisma = new Client();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $prisma->user->findFirst([
        'where' => [
            'email' => $email,
        ],
    ]);

    if ($user && password_verify($password, $user->password)) {
        $_SESSION['user_id'] = $user->id;
        echo 'Login successful!';
    } else {
        echo 'Invalid credentials!';
    }
}
?>
