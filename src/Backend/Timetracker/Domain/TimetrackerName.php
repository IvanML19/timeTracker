<?php


namespace Timetracker\Backend\Timetracker\Domain;


use Timetracker\Shared\ValueObject\StringVO;

class TimetrackerName extends StringVO
{
    public function __construct(string $value)
    {
        $this->guardNameWithLessThan40Chars($value);
        parent::__construct($value);
    }

    private function guardNameWithLessThan40Chars(string $value)
    {
        if(strlen($value) > 40) {
            throw new \InvalidArgumentException('Name has more than 40 characters');
        }
    }

}