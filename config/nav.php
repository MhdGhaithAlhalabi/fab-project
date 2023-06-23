<?php

return [
    [
        'icon' => 'nav-icon fas fa-tachometer-alt',
        'route' => 'dashboard.dashboard',
        'title' => 'لوحة التحكم',
        'active' => 'dashboard.dashboard',
    ],
    [
        'icon' => 'fas fa-tags nav-icon',
        'route' => 'dashboard.categories.index',
        'title' => 'الأصناف',
        // 'badge' => 'New',
        'active' => 'dashboard.categories.*',
        'ability' => 'categories.view',
    ],
    [
        'icon' => 'fas fa-box nav-icon',
        'route' => 'dashboard.products.index',
        'title' => 'المنتجات',
        'active' => 'dashboard.products.*',
        'ability' => 'products.view',
    ],
    [
        'icon' => 'fas fa-receipt nav-icon',
        'route' => 'dashboard.categories.index',
        'title' => 'الطلبات',
        'active' => 'dashboard.orders.*',
        'ability' => 'orders.view',
    ],
    [
        'icon' => 'fas fa-shield-alt nav-icon',
        'route' => 'dashboard.roles.index',
        'title' => 'القواعد',
        'active' => 'dashboard.roles.*',
        'ability' => 'roles.view',
    ],
    [
        'icon' => 'fas fa-users nav-icon',
        'route' => 'dashboard.users.index',
        'title' => 'المستخدمين',
        'active' => 'dashboard.users.*',
        'ability' => 'users.view',
    ],
    [
        'icon' => 'fas fa-users nav-icon',
        'route' => 'dashboard.admins.index',
        'title' => 'المدراء',
        'active' => 'dashboard.admins.*',
        'ability' => 'admins.view',
    ],
    [
        'icon' => 'fas fa-cog nav-icon',
        'route' => 'dashboard.setting.edit',
        'title' => 'الاعدادات',
        'active' => 'dashboard.setting.*',
        'ability' => 'settings.update',
    ],
];
