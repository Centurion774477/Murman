<?php

# Murman is licensed under the O'Saasy license.
# For more information, see LICENSE.md

$start = microtime(true);

function getNewContents(string $contents): array {
    $lines = explode(PHP_EOL, $contents);

    $newContents = [];

    foreach ($lines as $line) {
        $characters = mb_str_split($line);
        foreach ($characters as $character) {
            if ($character === '’' || $character === '‘') {
                array_push($newContents, "'");
            } elseif ($character === '“' || $character === '”') {
                array_push($newContents, '"');
            } else {
                array_push($newContents, $character);
            }
        }
        array_push($newContents, PHP_EOL);
    }

    return $newContents;
}

function purifyMarkdown(string $file): string {
    if ((file_exists($file)) === false) {
        echo "The given file $file does not exist in this context.";
        exit;
    }

    $fileHandle = fopen($file, 'r');

    $contents = fread($fileHandle, filesize($file));

    fclose($fileHandle);

    if ($contents === false) {
        echo "Something went wrong";
        exit;
    }

    $newContents = getNewContents($contents);

    $newFile = "clean-$file";

    if (file_exists($newFile)) {
        echo "Murman wanted to write to $newFile but it already exists in this context.";
        exit;
    }

    $cleaned = implode('', $newContents);
    file_put_contents($newFile, $cleaned);

    return $newFile;
}


if ((isset($argv[1]) == false)) {
    echo "Invalid argument given. Please provide a file to purify.";
    exit;
}

$fileToPurify = $argv[1];

$generatedFile = purifyMarkdown($fileToPurify);

echo "Done! Your new file is now named $generatedFile\n";

$end = microtime(true);

echo "Took " . ($end - $start) . " seconds";