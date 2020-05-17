<?php
// See the password_hash() example to see where this came from.
$a = 'aaaaaa';

$b = password_hash($a, PASSWORD_DEFAULT);
echo $b;

$hash = '$2y$10$q/emCtg6ABO.qiYQY43rpO7wZTe7qjnRJcFNsnUlZTc';

if (password_verify($a, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>