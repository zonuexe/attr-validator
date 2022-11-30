<?php

declare(strict_types=1);

namespace zonuexe\AttrValidator;

use Attribute;
use TypeError;
use DomainException;

use function is_string;
use function preg_match;

#[Attribute(Attribute::TARGET_PROPERTY)]
class RegExp implements Validator
{
    public function __construct(public string $pattern) {}

    public function ensure(string $name, mixed $input): void
    {
        if (!is_string($input)) {
            throw new TypeError();
        }

        if (!preg_match($this->pattern, $input)) {
            throw new DomainException("{$name} がパターンにマッチしません");
        }
    }

}
