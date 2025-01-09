<?php

require_once 'vendor/autoload.php';
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class HomepagesTest extends TestCase
{
    #[DataProvider('optellenProvider')]
    public function testOptellen($getal1, $getal2, $expected)
    {
        $homepagesTest = new Homepages();

        $output = $homepagesTest->optellen($getal1, $getal2);

        $this->assertEquals($expected, $output);
    }

    public static function optellenProvider()
    {
        return [
            [5, 3, 8],
            [-5, 5, 0],
            [0, 0, 0],
            [12,36, 48]
        ];
    }


}