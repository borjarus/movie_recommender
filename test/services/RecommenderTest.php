<?php

namespace Test\services;

use App\services\Recommender;
use PHPUnit\Framework\TestCase;

class RecommenderTest extends TestCase
{
    public function testReturnsThreeRandomTitles()
    {
        $service = new Recommender();
        $service->getRandomTitles();
    }
}
