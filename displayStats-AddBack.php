<?php


/**
 * Function to check whether a file exists at the specified path.
 * 
 * @param string $filePath The full path to the file.
 * @return bool True if the file exists, false otherwise.
 */
function file_test($filePath) {
    return file_exists($filePath);
}

/**
 * Function to generate stats for file existence.
 * 
 * @param string $fileName The file name.
 * @param string $filePath The full path to the file.
 * @param string $outputType The type of output (bool, text, or emoji).
 * @return array Array containing file name and existence status.
 */
function fileStatus($fileName, $filePath, $outputType = 'bool') {
    $fileExists = file_test($filePath);

    $status = $fileExists;
    if ($outputType === 'emoji') {
        $status = $fileExists ? '✅' : '❌';
    } elseif ($outputType === 'text') {
        $status = $fileExists ? 'exists' : 'does not exist';
    }

    return [
        'file' => $fileName,
        'exists' => $status
    ];
}



/**
 * Function to display stats in different formats.
 * 
 * @param array $stats The array of stats to be displayed.
 * @param string $displayType The type of display (array, text_csv).
 * @return mixed Formatted stats based on display type.
 */
function StatsDisplay($stats, $displayType = 'array') {
    if ($displayType === 'text_csv') {
        $csvOutput = '';
        foreach ($stats as $stat) {
            $csvOutput .= $stat['file'] . ' ' . $stat['exists'] . ', ';
        }
        return rtrim($csvOutput, ', ');
    }
    return $stats; // Default is to return the array
}
