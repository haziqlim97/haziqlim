<?php

return [
    'role_structure' => [
        'admin' => [
            'customer' => 'c,r,u,d',
            'package' => 'c,r,u,d',
            'order' => 'r,u',
            'user' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'permission' => 'c,r,u,d'
        ],
        'staff' => [
            'customer' => 'c,r,u',
            'package' => 'c,r,u',
            'order' => 'r,u'
        ],
        'customer' => [
            'order' => 'c'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
