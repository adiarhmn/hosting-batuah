<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

abstract class Controller
{
    protected $list_periods = [7, 30, 90, 180, 356];

    /**
     * Get the list periods.
     *
     * @return array<int>
     */
    public function getListPeriods(): array
    {
        return $this->list_periods;
    }

    public function createDomainAccount(array $data): array
    {
        try {
            $url = "https://" . config('app.hosting.host') . ":" . config('app.hosting.port') . "/CMD_API_ACCOUNT_USER";
            $dataPost = [
                'action' => 'create',
                'add' => 'Submit',
                'username' => $data['username'],
                'email' => $data['email'],
                'passwd' => $data['code'] . config('app.hosting.client_code'),
                'passwd2' => $data['code'] . config('app.hosting.client_code'),
                'domain' => $data['name'] . config('app.hosting.host', '.batuah.tech'),
                'package' => $data['name_package'],
                'ip' => config('app.hosting.ip'),
                'notify' => 'yes'
            ];
            $response = Http::withOptions([])->withBasicAuth(
                config('app.hosting.username'),
                config('app.hosting.password')
            )->post($url, $dataPost);
            $responseBody = $response->body();

            // Parse the response body to check for errors
            parse_str($responseBody, $parsedResponse);

            // Check if there's an error in the response
            if (isset($parsedResponse['error']) && $parsedResponse['error'] == '1') {
                return [
                    'success' => false,
                    'message' => urldecode($parsedResponse['text'] ?? 'Account creation failed'),
                    'details' => urldecode($parsedResponse['details'] ?? ''),
                    'response' => $parsedResponse,
                    'status_code' => $response->status()
                ];
            }
            return [
                'success' => true,
                'message' => 'Account created successfully',
                'response' => $parsedResponse,
                'status_code' => $response->status()
            ];
        } catch (\Exception $e) {
            throw new \Exception('Domain account creation failed: ' . $e->getMessage(), $e->getCode() ?: 500);
        }
    }
}
