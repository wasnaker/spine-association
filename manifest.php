<?php

declare(strict_types=1);

/**
 * MANIFEST modul Association.
 *
 * 1 entity lokal: Association (asosiasi surveyor per provinsi).
 * Wilayah (Province/Regency) dipakai via module spine-region.
 *
 * @return array{menu: list<array{slug: string, label: string, icon: string, href: string, position: int, permission?: string}>, widgets: list<array{id: string, area: string, title: string, api: string}>, detail_tabs: list<array{slug: string, label: string, icon: string, api: string, position: int, permission?: string}>, rbac: array{permissions: list<string>, roles: list<array{name: string, label?: string, permissions: list<string>}>, grants: array<string, list<string>>}}
 */
return [
    'menu' => [
        [
            'slug'       => 'associations',
            'label'      => 'Associations',
            'icon'       => '🏛️',
            'href'       => '/associations',
            'position'   => 40,
            'permission' => 'association:view',
        ],
    ],

    'widgets' => [
        [
            'id'    => 'associations-items',
            'area'  => 'right-4',
            'title' => 'Associations',
            'api'   => '/api/v1/associations',
        ],
    ],

    'detail_tabs' => [
        [
            'slug'       => 'overview',
            'label'      => 'Overview',
            'icon'       => '👁️',
            'api'        => '/api/v1/associations/{id}',
            'position'   => 10,
            'permission' => 'association:view',
        ],
        [
            'slug'       => 'staffs',
            'label'      => 'Staff',
            'icon'       => '👥',
            'api'        => '/api/v1/associations/{id}/staffs',
            'position'   => 26,
            'permission' => 'association:view',
        ],
        [
            'slug'       => 'activity',
            'label'      => 'Activity',
            'icon'       => '🕐',
            'api'        => '/api/v1/associations/{id}/activity-logs',
            'position'   => 30,
            'permission' => 'association:view',
        ],
    ],

    'settings' => [
        [
            'slug'     => 'association',
            'label'    => 'Association',
            'icon'     => '🏛️',
            'position' => 50,
            'fields'   => [
                [
                    'key'     => 'association_start_number',
                    'label'   => 'Start Number',
                    'type'    => 'number',
                    'default' => '70104',
                ],
                [
                    'key'     => 'association_code_length',
                    'label'   => 'Code Length',
                    'type'    => 'number',
                    'default' => '4',
                ],
            ],
        ],
    ],

    'rbac' => [
        'permissions' => [
            'association:view', 'association:create', 'association:edit', 'association:delete',
        ],
        'roles' => [
            ['name' => 'association',              'label' => 'Association',
             'permissions' => ['association:view']],
            ['name' => 'association-admin',        'label' => 'Association Admin',
             'permissions' => ['association:*']],
        ],
        'grants' => [
            'staff' => ['association:view'],
        ],
    ],
];
