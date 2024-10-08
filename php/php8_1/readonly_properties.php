<?php

class User {
    public readonly string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}

$user = new User("Alice");
echo $user->name . PHP_EOL; // Output: Alice

# Attempting to reassign will throw an error
#$user->name = "Bob"; // Fatal error: Cannot modify readonly property
#echo $user->name;
