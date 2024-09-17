<?php

/**
 * getFilesFromDirectory
 * 
 * This function takes a file directory as an argument and returns an array with the full paths to all the files in that directory.
 * By default, it scans and returns files at all depths within the directory, but a second argument can be passed to limit the depth of the scan.
 * If the depth is set to 'all', it will scan all depths.
 * 
 * @param string $directory The directory to scan.
 * @param mixed $depth The depth to scan; 'all' scans all depths, or specify an integer to limit the depth.
 * @return array An array of full paths to files.
 */
function getFilesFromDirectory($directory, $depth = 'all') {
    $files = [];

    // Helper function to scan the directory recursively with depth control
    $scanDirectory = function($dir, $currentDepth, $maxDepth) use (&$files, &$scanDirectory) {
        if ($maxDepth !== 'all' && $currentDepth > $maxDepth) {
            return;
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            $fullPath = $dir . DIRECTORY_SEPARATOR . $item;

            if (is_file($fullPath)) {
                $files[] = $fullPath;
            } elseif (is_dir($fullPath)) {
                $scanDirectory($fullPath, $currentDepth + 1, $maxDepth);
            }
        }
    };

    // Start the recursive scan with 'all' representing no depth limit
    $scanDirectory($directory, 0, $depth);

    return $files;
}
