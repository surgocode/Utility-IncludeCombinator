<?php

/**
 * getRemoteData
 * 
 * This function takes a URL, fetches its content, and returns it as a string.
 * If fetching the content fails, it returns false.
 * 
 * @param string $url The URL to fetch data from.
 * @return string|false The fetched content on success, or false on failure.
 */
function getRemoteData($url) {
    // Use file_get_contents to fetch data from the URL
    $context = stream_context_create([
        'http' => [
            'timeout' => 10, // Set a timeout for the request
        ],
    ]);

    $content = file_get_contents($url, false, $context);

    if ($content === false) {
        echo "Failed to fetch data from URL: $url\n";
        return false;
    }

    return $content;
}
