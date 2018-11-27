<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 18-11-27
 * Time: 下午4:59
 */

namespace tests;

use minimonitor\src\monitor;
use PHPUnit\Framework\TestCase;

class MonitorTest extends TestCase
{
    public function testAddSuccess()
    {
        $example = new monitor();
        $result = $example->add("php.add");
        $this->assertTrue($result);

        return $result;
    }

    public function testAddValueSuccess()
    {
        $example = new monitor();
        $result = $example->addValue("php.addValue", 10);
        $this->assertTrue($result);

        return $result;
    }

    public function testSetSuccess()
    {
        $example = new monitor();
        $result = $example->set("php.set", 50);
        $this->assertTrue($result);

        return $result;
    }

    public function testAddValueFailed()
    {
        $example = new monitor();
        $result = $example->addValue("php.addValue", "addValue");
        $this->assertFalse($result);
        return $result;
    }

    public function testSetFailed()
    {
        $example = new monitor();
        $result = $example->set("php.set", "set");
        $this->assertFalse($result);
        return $result;
    }
}