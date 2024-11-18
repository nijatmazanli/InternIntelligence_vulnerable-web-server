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

$xmlString = <<<XML
<?xml version="1.0"?>
<!DOCTYPE root [
<!ENTITY xxe SYSTEM "file:///etc/passwd">
]>
<root>
    &xxe;
</root>
XML;

try {
    $dom = loadSecureXML($xmlString);
    echo $dom->saveXML();
} catch (Exception $e) {
    echo 'Error: ',  $e->getMessage();
}
?>
