<?php

declare(strict_types=1);

use App\Address;

require __DIR__ . '/vendor/autoload.php';

function test(Closure ...$tests): void
{
    $result = [];
    foreach ($tests as $test) {
        try {
            $result[] = $test();
        } catch (\Throwable $e) {
            $result[] = $e->getMessage();
        }
    }

    var_dump($result);
}

test(
    fn() => new Address('', '151-0053'),
    fn() => new Address('渋谷区', ''),
    fn() => new Address('渋谷区', '151-0053'),
);
