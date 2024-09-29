<?php
$server = new \WebRPC\WebRPC(new \Examples\UserService());
$server->run();