<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $hidden = [
        'guard_name', 'id',
    ];

    public const GUARDS = [
        'API' => 'api',
        'ADMIN' => 'admin',
    ];

    // User permissions.
    public const VIEW_ALL = 'view-all';
    public const AGENT = 'operations';
    public const MANAGE_OPERATE = 'manage-operations';
    public const ACCOUNTING = 'accounting';
    public const BLACKLIST_CUSTOMER = 'blacklist-customer';
    public const REFUND_TRANSACTION = 'refund-transaction';
    public const UPDATE_PREFERENCES = 'update-preferences';
  


    public static function getTypes(): array
    {
        return [
            ['name' => static::VIEW_ALL, 'description' => 'Can view all'],
            ['name' => static::AGENT, 'description' => 'Can attend to customers'],
            ['name' => static::MANAGE_OPERATE, 'description' => 'Can manage operations'],
            ['name' => static::ACCOUNTING, 'description' => 'Can account'],
        ];
    }



    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }

    public function scopeApi(Builder $query)
    {
        return $query->where('guard_name', self::GUARDS['API']);
    }

    public function scopeAdmin(Builder $query)
    {
        return $query->where('guard_name', self::GUARDS['ADMIN']);
    }
}
