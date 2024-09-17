<?php
/*

This will just include EVERYTHING that's in a directory ... all functions ... 

*/

function includeAllFiles($directory)
{
    // Ensure directory ends with a slash
    $directory = rtrim($directory, '/') . '/';

    // Get all files in the directory
    $files = scandir($directory);

    // Loop through each file
    foreach ($files as $file) {
        // Only include files that end with .php
        if (is_file($directory . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
            require_once $directory . $file;
        }
    }
}

