<?php

declare(strict_types=1);

namespace zonuexe\AttrValidator;

use Attribute;
use TypeError;
use DomainException;

use function is_string;
use function mb_strlen;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Length implements Validator
{
    /**
     * @param ?non-negative-int $min
     * @param ?non-negative-int $max
     */
    public function __construct(
        public ?int $min,
        public ?int $max,
    ) {
    }

    public function ensure(string $name, mixed $input): void
    {
        if (!is_string($input)) {
            throw new TypeError();
        }

        $length = mb_strlen($input, 'UTF-8');

        if (isset($this->min) && $this->min > $length) {
            throw new DomainException("{$name} (length={$length}) は {$this->min} 以上である必要があります");
        }

        if (isset($this->max) && $this->max < $length) {
            throw new DomainException("{$name} (length={$length}) は {$this->max} 以下である必要があります");
        }
    }
}
