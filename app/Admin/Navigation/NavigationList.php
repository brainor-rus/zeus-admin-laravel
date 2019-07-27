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
                    [
                        'url' => '/' . config('zeusAdmin.admin_url') . '/Permissions',
                        'icon' => 'fas fa-user-circle',
                        'text' => 'Привелегии'
                    ],
                    [
                        'url' => '/'.config('zeusAdmin.admin_url').'/TreeTest',
                        'icon' => 'fas fa-users',
                        'text' => 'Тест вложенности',
                        'noDirect' => true,
                        'nodes' => [
                            [
                                'url' => '/'.config('zeusAdmin.admin_url').'/Contacts',
                                'icon' => 'fas fa-phone',
                                'text' => 'Контакты'
                            ],
                        ]
                    ]
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