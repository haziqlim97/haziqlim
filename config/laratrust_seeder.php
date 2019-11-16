<?php

return [
    'role_structure' => [
        'admin' => [
            'roles' => 'c,r,u,d',
            'package' => 'c,r,u,d',
            'order' => 'r,u'
        ],
        'staff' => [
            'package' => 'c,r,u',
            'order' => 'r,u'
        ],
        'user' => [
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
