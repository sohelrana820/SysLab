<?php

/**
 *
 */
enum Status {
    case Draft;
    case Published;
    case Archived;
}

/**
 * @param Status $status
 * @return string
 */
function getStatus(Status $status): string
{
    if($status == Status::Published) {
        return "Published";
    } else if($status == Status::Archived) {
        return "Archived";
    } else if($status == Status::Draft) {
        return "Draft";
    }

    return "Unknown";
}

echo getStatus(Status::Published) . PHP_EOL;
echo getStatus(Status::Archived) . PHP_EOL;
echo getStatus(Status::Draft) . PHP_EOL;
