<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $tenants = Tenant::with('domains')->get();
        $tenants = Tenant::with(['domains', 'warehouse'])->latest()->paginate(1); // 👈 har page per 10 tenants


        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouses = Warehouse::all(); // saare warehouses central DB se lao
        return view('tenants.create', compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'domain_name' => 'required|string|max:255|unique:domains,domain',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'warehouse_id' => 'nullable|exists:warehouses,id',
            'status' => 'nullable',
        ]);

        // ✅ Tenant create with specific fields
        $tenant = Tenant::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'warehouse_id' => $validatedData['warehouse_id'] ?? null,
            'status' => $validatedData['status'] ?? 'active'    ,
        ]);

        // ✅ Domain create separately
        $tenant->domains()->create([
            'domain' => $validatedData['domain_name'] . '.' . config('app.domain'),
        ]);

        tenancy()->initialize($tenant);

        // 4️⃣ Tenant ke DB me admin user create karo
        User::create([
            'name' => 'Admin',
            'email' => 'admin@store.com',
            'password' => Hash::make('12345678'), // default password
            'role' => 'admin',
        ]);

        // 5️⃣ Tenancy cleanup
        tenancy()->end();

        // return response()->json([
        //     'message' => 'Tenant and admin user created successfully!',
        //     'domain' => $tenant->domains->first()->domain,
        // ]);

        return redirect()->route('tenants.index')->with('success', 'Tenant created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function plan(Tenant $tenant)
    {
        //
         $tenants = Tenant::with(['domains', 'warehouse'])->latest()->get();
        return view('plan.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant, $id)
    {
        //
        $tenant = Tenant::with(['domains', 'warehouse'])->findOrFail($id);
        $warehouses = Warehouse::all(); // saare warehouses central DB se lao
        return view('tenants.edit', compact('tenant', 'warehouses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);

        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email,' . $id,
            'domain_name' => 'required|string|max:255',
            'password' => 'nullable|min:6|confirmed',
            'warehouse_id' => 'nullable|exists:warehouses,id',
        ]);

        // Update tenant
        $tenant->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password']
                ? bcrypt($validated['password'])
                : $tenant->password, // keep old password if not entered
            'warehouse_id' => $validated['warehouse_id'] ?? null,
        ]);

        // Update tenant domain (assuming 1 domain per tenant)
        if ($tenant->domains()->exists()) {
            $tenant->domains()->update(['domain' => $validated['domain_name']]);
        } else {
            $tenant->domains()->create(['domain' => $validated['domain_name']]);
        }

        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        // Delete tenant domains first if using stancl/tenancy
        $tenant->domains()->delete();

        // Delete the tenant itself
        $tenant->delete();

        return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully!');
    }
}
