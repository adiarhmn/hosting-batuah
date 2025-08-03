<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PackageController extends Controller
{
    public function packageList()
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_PACKAGES_USER');
        if ($response->successful()) {
            parse_str($response->body(), $packages);
            return response()->json([
                'success' => true,
                'packages' => $packages
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve package list',
            'response' => $response
        ], $response->status());
    }

    public function packageDetail($name)
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_PACKAGES_USER', [
            'package' => $name
        ]);

        if ($response->successful()) {
            parse_str($response->body(), $packageDetails);
            return response()->json([
                'success' => true,
                'package_details' => $packageDetails
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve package details',
            'response' => $response
        ], $response->status());
    }
}
