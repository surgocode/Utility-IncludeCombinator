<?php

/**
 * FileIncludePaths
 * 
 * This function takes an array of file paths and safely includes each one in the script.
 * If a file does not exist, it will skip it to avoid errors.
 * 
 * @param array $paths An array of full file paths to be included.
 * @return void
 */
function FileIncludePaths($paths) {
    foreach ($paths as $path) {
        // Ensure the file exists before attempting to include it
        if (file_exists($path) && is_file($path)) {
            include($path);
        } else {
            // Optionally, log or handle the missing file case
            echo "File not found: " . $path . "\n";
        }
    }
}