<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PackageController extends Controller
{

    public function showPackages(): \Illuminate\View\View
    {
        $packages = Package::paginate(10);
        return view('admin.packages', compact('packages'));
    }

    public function syncPackages()
    {
        DB::beginTransaction();
        try {
            $response = $this->API_packageList();
            if ($response && isset($response['list'])) {
                // Menyimpan data paket ke dalam database
                foreach ($response['list'] as $packageName) {
                    $detailPackage = $this->API_packageDetail($packageName);
                    Package::updateOrCreate(
                        ['name_package' => $packageName],
                        [
                            'name_package' => $packageName,
                            'bandwidth' => $detailPackage['bandwidth'] ?? "unknown",
                            'disk_space' => $detailPackage['quota'] ?? "-",
                            'max_subdomains' => $detailPackage['nsubdomains'] ?? 0,
                            'max_db_mysql' => intval($detailPackage['mysql'] ?? 0),
                            'status' => 'active'
                        ]
                    );
                }

                // Set packages not in API response to inactive
                Package::whereNotIn('name_package', $response['list'])
                    ->update(['status' => 'inactive']);
            }

            DB::commit();
            return redirect('admin/packages')->with('message', 'Packages synchronized successfully.');
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect('admin/packages')->withErrors(['error' => 'Failed to synchronize packages: ' . $e->getMessage()]);
        }
    }

    private function API_packageList()
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_PACKAGES_USER');
        return $response->successful() ?
            tap([], fn(&$packages) => parse_str($response->body(), $packages)) :
            null;
    }

    private function API_packageDetail($name)
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_PACKAGES_USER', [
            'package' => $name
        ]);
        return $response->successful() ?
            tap([], fn(&$package) => parse_str($response->body(), $package)) :
            null;

    }
}
