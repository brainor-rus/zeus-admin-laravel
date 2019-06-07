<?php

namespace App\Admin\Navigation;


class NavigationList
{
    public static function getNavigationList()
    {
        $navigation = [
            [
                'url' => '/'.config('zeusAdmin.admin_url').'/Users',
                'icon' => 'fas fa-users',
                'text' => 'Пользователи',
                'noDirect' => true,
                'nodes' => [
                    [
                        'url' => '/' . config('zeusAdmin.admin_url') . '/Users',
                        'icon' => 'fas fa-list',
                        'text' => 'Список'
                    ],
                    [
                        'url' => '/' . config('zeusAdmin.admin_url') . '/Roles',
                        'icon' => 'fas fa-user-circle',
                        'text' => 'Роли'
                    ],
                ]
            ],
            [
                'url' => '/'.config('zeusAdmin.admin_url').'/Cities',
                'icon' => 'fas fa-home',
                'text' => 'Города'
            ],
        ];

        return $navigation;
    }
}