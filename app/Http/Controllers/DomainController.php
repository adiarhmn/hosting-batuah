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

    public function domainDetail($id)
    {
        $domain = Domain::findOrFail($id);
        if (!$domain) {
            return redirect()->back()->withErrors(['error' => 'Domain not found.']);
        }

        // Fetch additional details from the API
        try {

            $apiDetails = $this->API_domainDetail($domain->username, $domain->name);
            $subdomainDetails = $this->API_subdomains($domain->username, $domain->code . config('app.hosting.client_code'), $domain->name);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to fetch domain details from the API.']);
        }


        return view('admin.domain-detail', compact('domain', 'apiDetails', 'subdomainDetails'));
    }


    public function activateDomain($id): \Illuminate\Http\RedirectResponse
    {
        $domain = Domain::findOrFail($id);
        $domain->status = 'active';
        $domain->save();

        return redirect()->back()->with('message', 'Domain activated successfully.');
    }

    public function deactivateDomain($id): \Illuminate\Http\RedirectResponse
    {
        dd('DomainController@deactivateDomain called');
    }


    private function API_domainDetail($username_domain, $domain = null)
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get("https://" . $domain . ":" . config('app.hosting.port') . '/CMD_API_SHOW_USER_USAGE', [
            'user' => $username_domain
        ]);
        return $response->successful() ?
            tap([], fn(&$domain) => parse_str($response->body(), $domain)) :
            null;
    }

    private function API_subdomains($username_domain, $password, $domain)
    {
        $response = Http::withBasicAuth(
            $username_domain,
            $password
        )->get("https://" . $domain . ":" . config('app.hosting.port') . '/CMD_API_SUBDOMAINS', [
            'domain' => $domain
        ]);
        return $response->successful() ?
            tap([], fn(&$subdomain) => parse_str($response->body(), $subdomain)) :
            [
                'error' => 'Failed to retrieve subdomains',
            ];
    }
}
