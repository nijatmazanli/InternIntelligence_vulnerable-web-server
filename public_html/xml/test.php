<?php
// Load XML with secure settings
function loadSecureXML($xmlString) {
    $dom = new DOMDocument();
    
    // Disable external entities
    $dom->resolveExternals = false;
    $dom->substituteEntities = false;
    
    // Disable DTD
    $dom->validateOnParse = false;
    $dom->loadXML($xmlString, LIBXML_NOENT | LIBXML_DTDLOAD | LIBXML_DTDATTR | LIBXML_NOCDATA);
    
    return $dom;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['xml'])) {
    $fileTmpPath = $_FILES['xml']['tmp_name'];
    
    if (is_uploaded_file($fileTmpPath)) {
        $xmlString = file_get_contents($fileTmpPath);
        
        try {
            $dom = loadSecureXML($xmlString);
            echo $dom->saveXML();
        } catch (Exception $e) {
            echo 'Error: ',  $e->getMessage();
        }
    } else {
        echo 'Error: File upload failed.';
    }
} else {
    echo 'Error: No XML file uploaded.';
}
?>
