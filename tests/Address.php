<?php

declare(strict_types=1);

namespace App;

// use zonuexe\AttrValidator\Length;
// use zonuexe\AttrValidator\RegExp;

use function zonuexe\AttrValidator\validate_properties;

class Address
{
    public function __construct(
        #[Length(min: 1, max: 100)]
        public readonly string $city,
        #[RegExp(pattern: '/\A\d{3}-\d{4}\z/')]
        public readonly string $postal,
    ) {
        validate_properties($this);
    }
}
