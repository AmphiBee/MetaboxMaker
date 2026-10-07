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

$GLOBALS['wpdb'] = (object) ['prefix' => 'wp_'];

function add_action(string $hookName, callable $callback, int $priority = 10, int $acceptedArgs = 1): bool
{
    $GLOBALS['test_actions'][$hookName][] = $priority;

    return true;
}

function did_action(string $hookName): int
{
    return (int) in_array($hookName, $GLOBALS['test_did_actions'] ?? [], true);
}

function doing_action(?string $hookName = null): bool
{
    return in_array($hookName, $GLOBALS['test_doing_actions'] ?? [], true);
}

function doing_filter(?string $hookName = null): bool
{
    return false;
}

function sanitize_title(string $title): string
{
    return strtolower(trim((string) preg_replace('/[^A-Za-z0-9_]+/', '-', $title), '-'));
}
