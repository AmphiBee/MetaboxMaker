<?php

declare(strict_types=1);

/*
 * Meta Box classes used by the package, for static analysis only.
 */

class MB_Relationships_API
{
    /**
     * @param  array<string, mixed>  $settings
     * @return object
     */
    public static function register($settings) {}
}

/**
 * @param  array<string, mixed>  $args
 * @return object
 */
function mb_register_model(string $name, array $args) {}
