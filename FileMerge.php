<?php

/**
 * FileMergePaths
 * 
 * This function takes an array of file paths (either local or HTTP links) and merges the content into a single string.
 * If a file does not exist or a URL is invalid, it skips the item.
 * The merged content is returned as output.
 * 
 * @param array $paths An array of full file paths or URLs to be merged.
 * @return string The merged content from all the files or URLs.
 */
function FileMergePaths($paths) {
    $mergedContent = '';

    foreach ($paths as $path) {
        // Check if it's a valid URL
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            $remoteContent = getRemoteData($path);
            if ($remoteContent !== false) {
                $mergedContent .= $remoteContent . "\n"; // Append the URL content
            }
        } elseif (file_exists($path) && is_file($path)) {
            // Local file handling
            $localContent = file_get_contents($path);
            if ($localContent !== false) {
                $mergedContent .= $localContent . "\n"; // Append the local file content
            } else {
                echo "Failed to read content from: $path\n";
            }
        } else {
            echo "Invalid file or URL: $path\n";
        }
    }

    return $mergedContent;
}

/**
 * WriteMergedContent
 * 
 * This function takes the merged content as a string and an output path, 
 * then writes the content to the specified file.
 * 
 * @param string $content The merged content to be written.
 * @param string $outputPath The path where the content should be written.
 * @return bool Returns true on success, false on failure.
 */
function WriteMergedContent($content, $outputPath) {
    // Attempt to write the content to the output file
    $result = file_put_contents($outputPath, $content);

    // Check if the write operation was successful
    if ($result === false) {
        echo "Failed to write to file: " . $outputPath . "\n";
        return false;
    }

    return true;
}
