<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DomainController extends Controller
{

    public function showDomains(Request $request): \Illuminate\View\View
    {
        $query = Domain::query();

        // Filter by search term
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('username', 'like', '%' . $request->search . '%');
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $domains = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.domains', compact('domains'));
    }

    public function loginDomain($id)
    {
        $domain = Domain::findOrFail($id);
        if (!$domain) {
            return redirect()->back()->withErrors(['error' => 'Domain not found.']);
        }
        $url = $domain->name . ":" . config('app.hosting.port');
        $password = $domain->code . config('app.hosting.client_code');
        $username = $domain->username;

        return view('admin.domain-login', compact('url', 'username', 'password'));
    }

    public function regeneratePassword($id)
    {
        DB::beginTransaction();
        try {
            $domain = Domain::findOrFail($id);
            $code = $this->getCode($domain->username);
            $response = Http::withBasicAuth(
                config('app.hosting.username'),
                config('app.hosting.password')
            )->post(config('app.hosting.url') . '/CMD_API_USER_PASSWD', [
                // 'action' => 'modify',
                'username' => $domain->username,
                'passwd' => $code . config('app.hosting.client_code'),
                'passwd2' => $code . config('app.hosting.client_code'),
            ]);

            $responseBody = $response->body();

            // Parse the response body to check for errors
            parse_str($responseBody, $parsedResponse);

            if (isset($parsedResponse['error']) && $parsedResponse['error'] == '0') {
                $domain->code = $code;
                $domain->save();
                DB::commit();
                return redirect()->back()->with('success', 'Password regenerated successfully.');
            } else {
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => 'Failed to regenerate password.']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Domain not found.']);
        }
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
