
# LicenseChain PHP SDK

This PHP SDK allows you to easily interact with the LicenseChain API to validate licenses and manage other licensing tasks.

## Features

- Validate license keys using LicenseChain APIs.
- Simple integration with your PHP project.
- Easy-to-configure API settings.

## Installation

1. Clone this repository or download the ZIP file:

   ```bash
   git clone https://github.com/LicenseChain/PHP-SDK.git
   ```

2. Include the `LicenseChain.php` file in your project:

   ```php
   require_once 'path/to/LicenseChain.php';
   ```

3. Set up the configuration in `config.php`:

   ```php
   <?php
   return [
       'api_base_url' => 'https://licensechain.app/api',
       'api_key' => 'YOUR_API_KEY_HERE',
       'timeout' => 30, // seconds
   ];
   ```

## Usage

### Validating a License

Here’s an example of how to validate a license:

```php
<?php
require_once 'path/to/LicenseChain.php';

// Initialize LicenseChain SDK
$licenseChain = new LicenseChain();

try {
    $licenseKey = 'LICENSE_KEY_HERE';
    $userId = 123; // Example user ID

    // Validate the license
    $response = $licenseChain->validateLicense($licenseKey, $userId);

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
```

### Configuration

The `config.php` file contains essential settings for the SDK:

```php
<?php
return [
    'api_base_url' => 'https://licensechain.com/api',
    'api_key' => 'YOUR_API_KEY_HERE',
    'timeout' => 30, // seconds
];
```

- **`api_base_url`**: The base URL for LicenseChain's API.
- **`api_key`**: Your API key for authentication.
- **`timeout`**: The timeout value for API requests in seconds.

### Example

An example of license validation can be found in the `examples/` directory:

```bash
examples/
└── validate_license.php
```

Run it in your PHP environment to test the SDK.

## Requirements

- PHP 7.4 or higher
- cURL extension enabled in PHP

# Bugs
If the default example that wasn’t included in your software isn’t working as expected, please pop over to https://t.me/LicenseChainBot and lodge a bug report via the Support Option.

However, we don't offer support for integrating LicenseChain into your project. If you’re having trouble, you might want to have a look on Google or YouTube for tutorials on the programming language you're using to build your programme.

# Copyright License
LicenseChain is under the Elastic License 2.0.

- You’re not allowed to offer the software to third parties as a hosted or managed service, where users get access to any significant part of the software’s features or functionality.
- You mustn’t move, alter, disable, or bypass the licence key functionality in the software, and you can’t remove or hide any features protected by the licence key.
- You’re also not permitted to change, remove, or obscure any licensing, copyright, or other notices from the licensor within the software. Any use of the licensor’s trademarks must comply with relevant laws.

Cheers for sticking to these guidelines. We put a lot of effort into developing LicenseChain and don't take copyright breaches lightly.

## Support

If you have any questions or need help, feel free to open an issue or contact us at support@licensechain.app.
