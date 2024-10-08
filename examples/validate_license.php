<?php
require_once 'path/to/LicenseChain.php';

// Initialize LicenseChain SDK
$licenseChain = new LicenseChain();

try {
    $licenseKey = 'LICENSE_KEY_HERE';

    // Validate the license
    $response = $licenseChain->validateLicense($licenseKey);

    // Handle the response
    if ($response['status'] == 'valid') {
        echo "License is valid.";
    } else {
        echo "License is invalid or expired.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
