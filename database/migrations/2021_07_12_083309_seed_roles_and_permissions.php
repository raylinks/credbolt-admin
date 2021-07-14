<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class SeedRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            $permissions = collect(Permission::getTypes())->map(function ($permission) {
                return ['name' => $permission['name'], 'description' => $permission['description'], 'guard_name' => 'web'];
            });

            Permission::insert($permissions->toArray());

            collect($this->getPermissionsByRole())->each(function ($value, $role) {
                Role::updateOrCreate(['name' => $role], ['description' => $value['description']])
                    ->givePermissionTo($value['permissions']);
            })->toArray();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(function () {
            collect($this->getPermissionsByRole())->each(function ($value, $role) {
                $role = Role::where('name', $role)->first();

                $role->revokePermissionTo($value['permissions']);
                if ($role->name === 'admin') { //admin role already exists
                    return $role->update(['description' => 'Admin']);
                }

                $role->delete();
            })->toArray();

            Permission::whereIn('name', collect(Permission::getTypes())->pluck('name')->toArray())->delete();
        });
    }

    /**
     * Get all permissions by role.
     *
     * @return void
     */
    private function getPermissionsByRole(): array
    {
        return [
            Role::CEO => [
                'description' => 'Ceo',
                'permissions' => collect(Permission::getTypes())->pluck('name')->toArray(),
            ],
            Role::ADMIN => [
                'description' => 'Administrator',
                'permissions' => collect(Permission::getTypes())
                    ->reject(fn ($permission) => $permission['name'] === Permission::UPDATE_PREFERENCES)
                    ->pluck('name')
                    ->toArray(),
            ],
            Role::COO => [
                'description' => 'Coo',
                'permissions' => collect(Permission::getTypes())
                    ->reject(fn ($permission) => $permission['name'] === Permission::UPDATE_PREFERENCES)
                    ->pluck('name')
                    ->toArray(),
            ],
            Role::CUSTOMER_SUPPORT => [
                'description' => 'Customer Support/Operations',
                'permissions' => collect(Permission::getTypes())
                    ->filter(function ($permission) {
                        return in_array(
                            $permission['name'],
                            [Permission::AGENT, Permission::BLACKLIST_CUSTOMER, Permission::REFUND_TRANSACTION]
                        );
                    })
                    ->pluck('name')
                    ->toArray(),
            ],
            Role::LOAN_RECOVERY_MANAGER => [
                'description' => 'Loan  manager',
                'permissions' => collect(Permission::getTypes())
                    ->filter(function ($permission) {
                        return in_array(
                            $permission['name'],
                            [Permission::AGENT, Permission::BLACKLIST_CUSTOMER, Permission::REFUND_TRANSACTION]
                        );
                    })
                    ->pluck('name')
                    ->toArray(),
            ],
        ];
    }
}
