<?php 


/**
 * DataStandardization
 * 
 * This function standardizes input data by determining whether it is a JSON string or a PHP array.
 * If it's a JSON string, it will decode it into a PHP array. Otherwise, it returns the PHP array as is.
 * 
 * @param mixed $data The input data, either a JSON string or a PHP array.
 * @return array|null Returns the PHP array if valid, or null if the input is invalid.
 */
function DataStandardization($data) {
    // If the input is a string, try to decode it as JSON
    if (is_string($data)) {
        $decodedData = json_decode($data, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $decodedData;
        } else {
            return null; // Return null if JSON decoding fails
        }
    }
    
    // If the input is already a PHP array, return it
    if (is_array($data)) {
        return $data;
    }

    return null; // Return null if the input is not valid
}

/**
 * getFiles
 * 
 * This function takes either a JSON string or a PHP array containing a path, a list of filenames, and a suffix.
 * It uses the DataStandardization function to process the input and concatenates the path, filenames, and suffix to return an array of full paths to the files.
 * 
 * @param mixed $data The input data, either a JSON string or a PHP array.
 * @return array An array of full file paths.
 */
function getFiles($data) {
    // Standardize the data (JSON or PHP array)
    $data = DataStandardization($data);
    if ($data === null) {
        return []; // Return empty array if the data is invalid
    }

    // Check if the required fields are present in the array
    if (!isset($data['path'], $data['files'], $data['suffix'])) {
        return []; // Return empty array if necessary data is missing
    }

    $files = [];

    // Concatenate path, filename, and suffix to create the full file path
    foreach ($data['files'] as $filename) {
        $fullPath = $data['path'] . DIRECTORY_SEPARATOR . $filename . $data['suffix'];
        $files[] = $fullPath;
    }

    return $files;
}