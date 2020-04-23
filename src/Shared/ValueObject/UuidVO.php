<?php


namespace Timetracker\Shared\ValueObject;


use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

abstract class UuidVO
{
    protected $value;

    public function __construct(string $value)
    {
        $this->guardValidUuid($value);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->getValue();
    }

    public static function generate(): string
    {
        return RamseyUuid::uuid4()->toString();
    }

    private function guardValidUuid(string $value)
    {
        if (!RamseyUuid::isValid($value)) {
            throw new InvalidArgumentException('Uuid with no supported format');
        }
    }

}