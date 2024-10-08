<?php

/**
 *
 */
interface Client
{
    /**
     * @param string $name
     * @return string
     */
    public function name(string $name): string;
}

/**
 *
 */
interface Location
{
    /**
     * @param string $location
     */
    public function location(string $location): string;
}

/**
 *
 */
class ClientLocation implements Client, Location
{
    /**
     * @param string $name
     * @return string
     */
    public function name(string $name): string
    {
        return $name;
    }

    /**
     * @param string $location
     * @return string
     */
    public function location(string $location): string
    {
        return $location;
    }
}

/**
 * @param Client&Location $contactService
 * @param $name
 * @param $location
 * @return void
 */
function getClientLocation(Client&Location $contactService, $name, $location): void
{
    echo 'Your name is:' . $contactService->name($name) . PHP_EOL;
    echo 'Your location is:' . $contactService->location($name) . PHP_EOL;
}

$clientLocation = new ClientLocation();
getClientLocation($clientLocation, 'Bob', 'Dhaka');