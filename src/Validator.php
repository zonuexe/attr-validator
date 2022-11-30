<?php

declare(strict_types=1);

namespace zonuexe\AttrValidator;

interface Validator
{
    /**
     * @phpstan-param non-empty-string $name
     */
    public function ensure(string $name, mixed $input): void;
}
