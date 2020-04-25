<?php


namespace Timetracker\Shared\ValueObject;


abstract class IntVo
{
    protected $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

}