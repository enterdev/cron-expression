<?php

namespace Cron;
/**
 * Seconds field.  Allows: * , / -
 */
class SecondsField extends AbstractField
{
    public function isSatisfiedBy(\DateTime $date, $value)
    {
        return $this->isSatisfied(strval(intval($date->format('s'))), $value);
    }

    public function increment(\DateTime $date, $invert = false, $parts = null)
    {
        if ($invert) {
            $date->modify('-1 second');
        } else {
            $date->modify('+1 second');
        }
        return $this;
    }

    public function validate($value)
    {
        return (bool) preg_match('/^[\*,\/\-0-9]+$/', $value);
    }
}
