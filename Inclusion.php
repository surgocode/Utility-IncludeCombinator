<?php

include('FileInclude.php');
include('FileMerge.php');
include('getFilesFromArray.php');
include('getFilesFromDir.php');
include('getFilesFromRemote.php');


/**
 * Inclusion
 * 
 * This function manages the inclusion or merging of files based on the provided data.
 * The data can be either a directory path, a JSON string, or a PHP array.
 * You can specify whether to include or merge the files (default is to include).
 * If merging, the content will be written to the specified merged file path.
 * 
 * @param mixed $data The input data, either a directory path, JSON string, or PHP array.
 * @param string $action Whether to 'include' or 'merge' the files. Default is 'include'.
 * @param mixed $depth The depth for directory scanning. Default is 'all' (full directory scan), or specify an integer depth.
 * @param string|null $mergedFilePath The path where the merged content should be written (only applicable for 'merge' action).
 * @param string $outputType The type of output for stats (bool, text, emoji). Default is 'bool'.
 * @param string $displayType The type of display (array, text_csv). Default is 'array'.
 * @return void
 */
function Inclusion($data, $action = 'include', $depth = 'all', $mergedFilePath = null, $outputType = 'bool', $displayType = 'array') {
    // If the data is a directory path, scan the directory for files
    if (is_string($data) && is_dir($data)) {
        $files = getFilesFromDirectory($data, $depth);
    } else {
        // Otherwise, standardize the data (JSON or PHP array)
        $files = getFiles($data);
    }

    // If no files were found or data was invalid, stop the process
    if (empty($files)) {
        echo "No valid files found.\n";
        return;
    }

    // Check file status and generate stats
    $fileStats = [];
    foreach ($files as $file) {
        $fileStats[] = fileStatus($file, $file, $outputType); // Use file path for both name and path here
    }

    // Display file stats
    echo StatsDisplay($fileStats, $displayType) . "\n";

    // Determine whether to include or merge the files
    if ($action === 'merge') {
        // Ensure an output path is provided for merging
        if ($mergedFilePath === null) {
            echo "No output path provided for merging files.\n";
            return;
        }

        // Merge the file contents
        $mergedContent = FileMergePaths($files);

        // Write the merged content to the specified file path
        if (WriteMergedContent($mergedContent, $mergedFilePath)) {
            echo "Merged content successfully written to: " . $mergedFilePath . "\n";
        } else {
            echo "Failed to write merged content.\n";
        }
    } else {
        // Include the files
        FileIncludePaths($files);
    }
}