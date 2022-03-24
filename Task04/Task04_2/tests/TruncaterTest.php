<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    public function testTrancate()
    {
        $truncater1 = new Truncater();
        $truncater2 = new Truncater(['length' => 7]);
        $this -> assertSame("Long t...", $truncater1 -> truncate("Long text", ['length' => 6]));
        $this -> assertSame("Long text", $truncater1 -> truncate("Long text"));
        $this -> assertSame("Long t---", $truncater2 -> truncate("Long text", ['length' => 6, 'separator' => '---']));
        $this -> assertSame("Long te...", $truncater2 -> truncate("Long text"));
    }
}