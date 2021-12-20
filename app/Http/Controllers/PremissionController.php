<?php

namespace App\Http\Controllers;

use App\Facades\Repositories\Roles;
use App\Http\Requests\PremissionRequest;
use App\Models\Premission;
use App\Models\Role;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

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
                'policy' => [__('role.applied', [
                    'role' => $role->role,
                    'policy' => Str::snake($request->policy, ' ')
                ])]
            ]);
        }

        $role->premissions()->create($request->validated());

        return back()->with([
            'message' => __('premission.stored', [
                'role' => $role->role,
                'policy' => Str::snake($request->policy, ' ')
            ])
        ]);
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

        return back()->with([
            'message' => __('premission.updated', [
                'role' => Roles::getRoleById($premission->role_id)->role,
                'policy' => Str::snake($premission->policy, ' ')
            ])
        ]);
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

        $premission->delete();

        return back()->with([
            'message' => __('premission.destroyed', [
                'role' => Roles::getRoleById($premission->role_id)->role,
                'policy' => Str::snake($premission->policy, ' ')
            ])
        ]);
    }
}
