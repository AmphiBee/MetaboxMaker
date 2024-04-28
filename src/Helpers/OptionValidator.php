<?php
namespace AmphiBee\MetaboxMaker\Helpers;

use InvalidArgumentException;
class OptionValidator
{
    /**
     * Validates and converts a string to an enum or returns the enum directly.
     * Throws an exception if the input is neither a valid string nor an enum instance.
     *
     * @param mixed num $value The value to convert or verify.
     * @param string $enumClass The enum class to check against.
     * @param string $errorMessage The error message for the exception if validation fails.
     *
     * @return \Enum The validated enum instance.
     */
    public static function check(mixed $value, string $enumClass, string|bool $errorMessage = false): string
    {
        if (is_string($value)) {
            $value = $enumClass::tryFrom($value);
            if ($value === null) {
                if (!$errorMessage) {
                    $errorMessage = static::generateErrorMessage($enumClass);
                }
                throw new InvalidArgumentException($errorMessage);
            }
        }

        if ($value instanceof $enumClass) {
            return $value->value;
        }

        throw new InvalidArgumentException("Type must be either a string or an instance of {$enumClass}.");
    }

    /**
     * Generates a dynamic error message based on the allowed values of the enum.
     *
     * @param string $enumClass The enum class to inspect.
     * @return string The generated error message.
     */
    private static function generateErrorMessage(string $enumClass): string
    {
        $values = array_map(fn($e) => $e->value, $enumClass::cases());
        $formattedValues = implode("', '", $values);
        return "Invalid value specified. Allowed values are '{$formattedValues}'.";
    }
}
