<?php

namespace App\Policies;

use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionsPolicy
{
    use HandlesAuthorization;

    public function viewAll()
    {
        return auth()->user()->can(Permission::VIEW_ALL);
    }

    public function agent()
    {
        return auth()->user()->can(Permission::AGENT);
    }

    public function manageOperate()
    {
        return auth()->user()->can(Permission::MANAGE_OPERATE);
    }

    public function accounting()
    {
        return auth()->user()->can(Permission::ACCOUNTING);
    }
}
