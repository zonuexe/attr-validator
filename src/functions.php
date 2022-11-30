<?php

declare(strict_types=1);

namespace zonuexe\AttrValidator;

use ReflectionAttribute;
use ReflectionClass;

function validate_properties(object $subject): void
{
    $ref = new ReflectionClass($subject);

    foreach ($ref->getProperties() as $prop) {
        $name = $subject::class . '::$' . $prop->getName();
        $value = $prop->getValue($subject);
        foreach ($prop->getAttributes(Validator::class, ReflectionAttribute::IS_INSTANCEOF) as $attr) {
            $attr->newInstance()->ensure($name, $value);
        }
    }
}
