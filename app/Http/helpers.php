<?php

use Illuminate\Support\Str;

if (!function_exists('generateUserFriendlyUniqueId')) {
    /**
     * Generate a short, user-friendly unique ID with randomness mixed throughout.
     *
     * @return string
     */
    function generateUserFriendlyUniqueId()
    {
        // Generate a UUID (Universally Unique Identifier)
        $uuid = (string) Str::uuid();

        // Encode the UUID to Base62
        $base62Encoded = base62_encode($uuid);

        // Randomly select a 6-character substring from the Base62-encoded UUID
        $randomSlice = substr($base62Encoded, rand(0, strlen($base62Encoded) - 6), 6);

        // Add a random prefix and suffix to ensure uniqueness
        $randomPrefix = Str::random(4); // 4 characters
        $randomSuffix = Str::random(2); // 2 characters

        // Combine the prefix, random slice, and suffix
        return $randomPrefix . $randomSlice . $randomSuffix;
    }
}

/**
 * Base62 encode a string
 *
 * @param string $input
 * @return string
 */
function base62_encode($input)
{
    $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $base = strlen($alphabet);

    // Convert hexadecimal string to decimal
    $number = '0x' . bin2hex($input);
    $decimal = base_convert($number, 16, 10);

    $encoded = '';
    while ($decimal > 0) {
        $decimal = (int) $decimal;
        $remainder = $decimal % $base;
        $encoded = $alphabet[$remainder] . $encoded;
        $decimal = ($decimal - $remainder) / $base;
    }

    return $encoded;
}
