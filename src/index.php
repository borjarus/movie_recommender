<?php

require __DIR__ . '/../vendor/autoload.php';


$service = new \App\services\Recommender();

app()->get('/get-three-random-titles', function () use ($service) {
    $titles = $service->getRandomTitles();
    response()->json($titles);
});

app()->get('/get-titles-starting-on-w-letter', function () use ($service) {
    $titles = $service->filter([
        'letter' => 'w',
        'withEvenNumberCharacters' => true
    ]);
    response()->json($titles);
});

app()->get('/get-titles-with-more-than-one-word', function () use ($service) {
    $titles = $service->filter([
        'withMoreThanOneWord' => true
    ]);
    response()->json($titles);
});

app()->run();