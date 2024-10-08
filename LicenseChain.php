<?php
class LicenseChain
{
    private $apiBaseUrl;
    private $apiKey;
    private $timeout;

    public function __construct()
    {
        $config = include('config.php');
        $this->apiBaseUrl = $config['api_base_url'];
        $this->apiKey = $config['api_key'];
        $this->timeout = $config['timeout'];
    }

    // Function to validate a license
    public function validateLicense($licenseKey, $userId)
    {
        $url = $this->apiBaseUrl . '/validation.php';
        $data = [
            'license_key' => $licenseKey
        ];

        return $this->sendRequest($url, $data);
    }

    // Generic function to send HTTP POST requests
    private function sendRequest($url, $data)
    {
        $ch = curl_init($url);
        $headers = [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            throw new Exception('Request Error: ' . curl_error($ch));
        }

        curl_close($ch);

        // Check for HTTP 200 or throw an error
        if ($httpCode != 200) {
            throw new Exception('LicenseChain API Error: HTTP ' . $httpCode);
        }

        return json_decode($response, true);
    }
}
