<?php

namespace Cron\Tests;

use Cron\SecondsField;
use DateTime;

/**
 * @author Michael Dowling <mtdowling@gmail.com>
 */
class SecondsFieldTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Cron\MinutesField::validate
     */
    public function testValdatesField()
    {
        $f = new SecondsField();
        $this->assertTrue($f->validate('1'));
        $this->assertTrue($f->validate('*'));
        $this->assertTrue($f->validate('*/3,1,1-12'));
    }

    /**
     * @covers Cron\MinutesField::increment
     */
    public function testIncrementsDate()
    {
        $d = new DateTime('2011-03-15 11:15:00');
        $f = new SecondsField();
        $f->increment($d);
        $this->assertEquals('2011-03-15 11:15:01', $d->format('Y-m-d H:i:s'));
        $f->increment($d, true);
        $this->assertEquals('2011-03-15 11:15:00', $d->format('Y-m-d H:i:s'));
        $f->increment($d, true);
        $this->assertEquals('2011-03-15 11:14:59', $d->format('Y-m-d H:i:s'));
    }
}
