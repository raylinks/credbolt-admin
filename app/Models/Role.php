<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $guarded = [];

    protected $guard_name = 'api';

    public const ADMIN = 'admin';
    public const CEO = 'ceo';
    public const COO = 'coo';
    public const ACCOUNT_MANAGER = 'account_manager';
    public const CUSTOMER_SUPPORT = 'customer_support';
    public const LOAN_RECOVERY_MANAGER = 'staff';
}
