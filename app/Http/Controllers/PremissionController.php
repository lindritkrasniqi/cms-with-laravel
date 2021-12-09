<?php

namespace App\Http\Controllers;

use App\Http\Requests\PremissionRequest;
use App\Models\Premission;
use App\Models\Role;
use Illuminate\Validation\ValidationException;

class PremissionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PremissionRequest $request, Role $role)
    {
        $this->authorize('create', Role::class);

        if ($role->premissions()->where('policy', $request->policy)->count() != 0) {
            throw ValidationException::withMessages([
                'policy' => [__('The given policy already is applied on this role!')]
            ]);
        }

        $role->premissions()->create($request->validated());

        return redirect()->route('menage.roles.edit', $role->id)->with(['message' => 'Success!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PremissionRequest $request, Premission $premission)
    {
        $this->authorize('create', Role::class);

        $data = $request->validated();

        unset($data['policy']);

        $premission->update($data);

        return redirect()->route('menage.roles.edit', $premission->role_id)->with(['message' => 'Success!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Premission $premission)
    {
        $this->authorize('create', Role::class);

        $role_id = $premission->role_id;

        $premission->delete();

        return redirect()->route('menage.roles.edit', $role_id)->with(['message' => 'Success!']);
    }
}
