<?php

function fetchDataFromApi(string $url): string {
    // Simulate an HTTP request delay
    Fiber::suspend("Fetching data from: $url");
    sleep(2); // Represents a network delay (2 seconds)
    return "Data from $url";
}

// Define a Fiber to manage each "async" task
$urls = ["https://api.example.com/user", "https://api.example.com/posts", "https://api.example.com/comments"];
$results = [];

foreach ($urls as $url) {
    $fiber = new Fiber(function() use ($url) {
        $result = fetchDataFromApi($url);
        Fiber::suspend($result);
    });

    $results[] = $fiber; // Store the Fiber so we can resume it later
    echo $fiber->start() . PHP_EOL; // Start the Fiber, initiating the "request"
}

// Resume all Fibers after the simulated delay
foreach ($results as $fiber) {
    echo $fiber->resume() . PHP_EOL; // Output the simulated "response" from each Fiber
}
