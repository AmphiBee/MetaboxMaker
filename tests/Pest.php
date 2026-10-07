<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| WordPress stubs
|--------------------------------------------------------------------------
|
| The builders register themselves on WordPress filters. Tests only check
| the generated configuration arrays, so the hook API is stubbed out.
|
*/

function add_filter(string $hookName, callable $callback, int $priority = 10, int $acceptedArgs = 1): bool
{
    return true;
}

function doing_filter(?string $hookName = null): bool
{
    return false;
}
