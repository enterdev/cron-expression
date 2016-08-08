<?php

namespace Cron\Tests;

use Cron\FieldFactory;
use PHPUnit_Framework_TestCase;

/**
 * @author Michael Dowling <mtdowling@gmail.com>
 */
class FieldFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Cron\FieldFactory::getField
     */
    public function testRetrievesFieldInstances()
    {
        $mappings = array(
            0 => 'Cron\SecondsField',
            1 => 'Cron\MinutesField',
            2 => 'Cron\HoursField',
            3 => 'Cron\DayOfMonthField',
            4 => 'Cron\MonthField',
            5 => 'Cron\DayOfWeekField',
            6 => 'Cron\YearField'
        );

        $f = new FieldFactory();

        foreach ($mappings as $position => $class) {
            $this->assertEquals($class, get_class($f->getField($position)));
        }
    }

    /**
     * @covers Cron\FieldFactory::getField
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesFieldPosition()
    {
        $f = new FieldFactory();
        $f->getField(-1);
    }
}
