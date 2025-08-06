<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DomainController extends Controller
{


    public function showDomains(): \Illuminate\View\View
    {
        $domains = Domain::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.domains', compact('domains'));
    }

    public function domainList()
    {
        // dd('DomainController@domainList called');
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_SUBDOMAINS', [
            'domain' => config('app.hosting.host')
        ]);
        if ($response->successful()) {
            parse_str($response->body(), $domains);
            return response()->json([
                'success' => true,
                'domains' => $domains
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve domain list',
            'response' => $response
        ], $response->status());
    }

    public function databaseList()
    {
        $response = Http::withBasicAuth(
            'ahmadbudi',
            'Pelaihari88'
        )->get(config('app.hosting.url') . '/CMD_API_DATABASES', [
            'subdomain' => 'akli.batuah.tech'
        ]);
        if ($response->successful()) {
            parse_str($response->body(), $databases);
            return response()->json([
                'success' => true,
                'databases' => $databases
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve database list',
            'response' => $response
        ], $response->status());
    }

    public function databaseDetail($name)
    {
        $response = Http::withBasicAuth(
            'ahmadbudi',
            'Pelaihari88'
        )->get(config('app.hosting.url') . '/CMD_API_DATABASES', [
            'name' => $name
        ]);

        if ($response->successful()) {
            parse_str($response->body(), $databaseDetails);
            return response()->json([
                'success' => true,
                'database_details' => $databaseDetails
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve database details',
            'response' => $response
        ], $response->status());
    }


    public function activateDomain($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $domain = Domain::findOrFail($id);
        $domain->status = 'active';
        $domain->save();

        return redirect()->back()->with('message', 'Domain activated successfully.');
    }
}
