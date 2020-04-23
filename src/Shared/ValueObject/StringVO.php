<?php


namespace Timetracker\Shared\ValueObject;


abstract class StringVO
{
    protected $value;

    /**
     * StringVO constructor.
     * @param $value
     */
    public function __construct(string $value)
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