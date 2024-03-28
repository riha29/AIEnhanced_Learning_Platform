<?php
require_once __DIR__.'/../vendor/autoload.php';

use Prisma\Client;

$prisma = new Client();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; // Remember to hash passwords
    $name = $_POST['name'];

    $user = $prisma->user->create([
        'data' => [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name,
        ],
    ]);

    echo 'User registered successfully!';
}
?>
