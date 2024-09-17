<?php 
include('Inclusion.php');

// Example usage
$settings = [
    'path' => '/Users/Reess/Code/Snippets/php',
    'files' => [
        'api_requests',  // This is the API request snippet
        'surgo_table_td',	
        'surgo_table_css_1',
        'pretty_array',
        'surgo_inputs',
        // 'time_ago',
        // 'time_ago2',
        // 'time_test',
        // 'debug'
    ],
    'suffix' => '.php', // Optional suffix
    'stats' => 'emoji', // Optional stats setting (bool, text, or emoji)
    'display' => 'text_csv' // Optional display setting (array or text_csv)
];

$fullPaths = Inclusion($settings, 'merge', 'all', '/Users/Reess/Code/Inc/Utilities/Inclusion/merged.php');
// print_r($fullPaths);