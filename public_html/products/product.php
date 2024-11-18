<?php
if (isset($_GET['page'])) {
    $filePath = $_GET['page'];

    // Check if the file exists
    if (file_exists($filePath)) {
        // Get the file extension
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

        // If the file is a PHP file, execute it
        if ($fileExtension === 'php') {
            // Read the file content
            $fileContent = file_get_contents($filePath);

            // Execute PHP code
            eval('?>' . $fileContent);

            // Display the file content
            echo "<h3>Contents of $filePath:</h3>";
            echo "<pre>" . htmlspecialchars($fileContent) . "</pre>";
        } else {
            // For non-PHP files, display the content
            $fileContent = file_get_contents($filePath);
            echo "<h3>Contents of $filePath:</h3>";
            echo "<pre>" . htmlspecialchars($fileContent) . "</pre>";
        }
    } else {
        echo "Error: File does not exist.";
    }
} else {
    echo "Error: No file specified.";
}
?>
