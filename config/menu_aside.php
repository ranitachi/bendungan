<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/dashboard',
            'new-tab' => false,
        ],

        // Custom
        [
            'section' => '  ',
        ],
        [
            'title' => 'Berita',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'line',
            'child' => 'article,category,tag,automation',
            'submenu' => [
                [
                    'title' => 'Articles',
                    'bullet' => 'dot',
                    'page' => '/admin/article',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Categories',
                    'bullet' => 'dot',
                    'page' => '/admin/category',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Tags',
                    'bullet' => 'dot',
                    'page' => '/admin/tag',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Automation',
                    'bullet' => 'dot',
                    'page' => '/admin/automation',
                    'new-tab' => false,
                ],
            ]
        ],
        [
            'title' => 'Kehutanan',
            'icon' => 'media/svg/icons/Home/Flower1.svg',
            'bullet' => 'line',
            'root' => true,
            'child' => 'wisata-alam,kehati,rehabilitasi,reboisasi',
            'submenu' => [
                [
                    'title' => 'Kawasan Hutan',
                    'bullet' => 'dot',
                    'child' => 'luaskawasan,pesisir',
                    'submenu' => [
                        [
                            'title' => 'Luas Kawasan',
                            'bullet' => 'dot',
                            'page' => '/admin/luaskawasan',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Pesisir',
                            'bullet' => 'dot',
                            'page' => '/admin/pesisir',
                            'new-tab' => false,
                        ]
                    ]
                ],
                [
                    'title' => 'Wisata Alam',
                    'bullet' => 'dot',
                    'page' => '/admin/wisata-alam',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Kehati',
                    'bullet' => 'dot',
                    'page' => '/admin/kehati',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Pemanfaatan Hutan',
                    'bullet' => 'dot',
                    'chile' => 'pemanfaatan-lahan,hasil-hutan',
                    'submenu' => [
                        [
                            'title' => 'Pemanfaatan Lahan',
                            'bullet' => 'dot',
                            'page' => '/admin/pemanfaatan-lahan',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Hasil Hutan',
                            'bullet' => 'dot',
                            'page' => '/admin/hasil-hutan',
                            'new-tab' => false,
                        ]
                    ]
                ],
                [
                    'title' => 'Rehabilitasi',
                    'bullet' => 'dot',
                    'page' => '/admin/rehabilitasi',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Reboisasi',
                    'bullet' => 'dot',
                    'page' => '/admin/reboisasi',
                    'new-tab' => false,
                ],
            ]
        ],
        [
            'title' => 'Lingkungan Hidup',
            'icon' => 'media/svg/icons/Home/Earth.svg',
            'bullet' => 'line',
            'root' => true,
            'child' => 'udara,perubahan-iklim,karhutla',
            'submenu' => [
                [
                    'title' => 'Air',
                    'bullet' => 'dot',
                    'child' => 'sungai-dan-danau,kualitas-air,sumber-air',
                    'submenu' => [
                        [
                            'title' => 'Sungai dan Danau',
                            'bullet' => 'dot',
                            'page' => '/admin/sungai-dan-danau',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Kualitas Air',
                            'bullet' => 'dot',
                            'page' => '/admin/kualitas-air',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Sumber Air',
                            'bullet' => 'dot',
                            'page' => '/admin/sumber-air',
                            'new-tab' => false,
                        ]
                    ]
                ],
                [
                    'title' => 'Udara',
                    'bullet' => 'dot',
                    'page' => '/admin/udara',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Sampah & Limbah',
                    'bullet' => 'dot',
                    'child' => 'limbah,pencemaran,sampah',
                    'submenu' => [
                        [
                            'title' => 'Limbah',
                            'bullet' => 'dot',
                            'page' => '/admin/limbah',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Pencemaran',
                            'bullet' => 'dot',
                            'page' => '/admin/pencemaran',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Sampah',
                            'bullet' => 'dot',
                            'page' => '/admin/sampah',
                            'new-tab' => false,
                        ]
                    ]
                ],
                [
                    'title' => 'Perubahan Iklim',
                    'bullet' => 'dot',
                    'page' => '/admin/perubahan-iklim',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Karhutla',
                    'bullet' => 'dot',
                    'page' => '/admin/karhutla',
                    'new-tab' => false,
                ]
            ]
        ],
        [
            'title' => 'Kebijakan & Tata Kelola',
            'icon' => 'media/svg/icons/Devices/Server.svg',
            'bullet' => 'line',
            'root' => true,
            'child' => 'regulasi,gakkum,perizinan,inovasi,pengembangan-sdm,kajian-strategis,audit,komunitas',
            'submenu' => [
                [
                    'title' => 'Regulasi',
                    'bullet' => 'dot',
                    'page' => '/admin/regulasi',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Gakkum',
                    'bullet' => 'dot',
                    'page' => '/admin/gakkum',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Perizinan',
                    'bullet' => 'dot',
                    'page' => '/admin/perizinan',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Inovasi',
                    'bullet' => 'dot',
                    'page' => '/admin/inovasi',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Pengembangan SDM',
                    'bullet' => 'dot',
                    'page' => '/admin/pengembangan-sdm',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Kajian Strategis',
                    'bullet' => 'dot',
                    'page' => '/admin/kajian-strategis',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Audit',
                    'bullet' => 'dot',
                    'page' => '/admin/audit',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Komunitas',
                    'bullet' => 'dot',
                    'page' => '/admin/komunitas',
                    'new-tab' => false,
                ]
            ]
        ],
        [
            'title' => 'Respons',
            'root' => true,
            'icon' => 'media/svg/icons/Tools/Angle Grinder.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/respons',
            'new-tab' => false,
        ],
        [
            'title' => 'Monitoring',
            'icon' => 'media/svg/icons/Devices/Display2.svg',
            'bullet' => 'line',
            'root' => true,
            'child' => 'monitoring,export-print',
            'submenu' => [
                [
                    'title' => 'Data Set',
                    'bullet' => 'dot',
                    'page' => '/admin/monitoring',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Export & Print',
                    'bullet' => 'dot',
                    'page' => '/admin/export-print',
                    'new-tab' => false,
                ],
            ]
        ],
        [
            'title' => 'Konfigurasi',
            'icon' => 'media/svg/icons/General/Settings-2.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Users, Roles, Permissions',
                    'bullet' => 'dot',
                    'root' => true,
                    'child' => 'all-users,role,permission',
                    'submenu' => [
                        [
                            'title' => 'Users',
                            'bullet' => 'dot',
                            'page' => '/admin/all-users',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Role',
                            'bullet' => 'dot',
                            'page' => '/admin/role',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Permissions',
                            'bullet' => 'dot',
                            'page' => '/admin/permission',
                            'new-tab' => false,
                        ],
                    ]
                ],
                [
                    'title' => 'Data Sets',
                    'bullet' => 'dot',
                    'root' => true,
                    'child' => 'group,master-data-strategic',
                    'submenu' => [
                        [
                            'title' => 'Group/Category',
                            'bullet' => 'dot',
                            'page' => '/admin/group',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Data Strategic',
                            'bullet' => 'dot',
                            'page' => '/admin/master-data-strategic',
                            'new-tab' => false,
                        ],
                    ]
                ],
                [
                    'title' => 'Administrative',
                    'bullet' => 'dot',
                    'root' => true,
                    'child' => 'province,regency,district',
                    'submenu' => [
                        [
                            'title' => 'Province',
                            'bullet' => 'dot',
                            'page' => '/admin/province',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Regencies',
                            'bullet' => 'dot',
                            'page' => '/admin/regency',
                            'new-tab' => false,
                        ],
                        [
                            'title' => 'Disricts',
                            'bullet' => 'dot',
                            'page' => '/admin/district',
                            'new-tab' => false,
                        ],
                    ]
                ],
            ]
        ],
        [
            'title' => 'Administrasi',
            'icon' => 'media/svg/icons/Design/Edit.svg',
            'bullet' => 'line',
            'root' => true,
            'child' => 'page,infographic',
            'submenu' => [
                [
                    'title' => 'Halaman',
                    'bullet' => 'dot',
                    'page' => '/admin/page',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Slider & Infographic',
                    'bullet' => 'dot',
                    'page' => '/admin/infographic',
                    'new-tab' => false,
                ],
            ]
        ],
        [
            'title' => 'Setting',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Settings4.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/setting',
            'new-tab' => false,
        ],
    ]

];
