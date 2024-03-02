<header id="header">
    <?php

    use app\modules\UserManagement\components\GhostNav;
    use app\modules\UserManagement\UserManagementModule;
    use yii\bootstrap4\NavBar;
    use yii\bootstrap4\Html;

    $username = '';
    if (!Yii::$app->user->isGuest) {
        if (!Yii::$app->user->isSuperadmin) {
            $username = Yii::$app->user->identity->username;

            $roles = Yii::$app->user->identity->roles;

            $roleNames = array_map(function ($role) {
                return strtolower($role->name);
            }, $roles);

            $rolesString = implode(', ', $roleNames);
        } else {
            $username = Yii::$app->user->identity->username;
            $rolesString = 'Superadmin';
        }
    }

    $username = strtolower($username);

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-darkx fixed-top no-print', 'style' => 'background-color: #2970cc;']
    ]);
    echo GhostNav::widget([
        'options' => ['class' => 'navbar-nav'],
        'encodeLabels' => false,
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'], 'visible' => true],
            [
                'label' => 'Master',
                'url' => '#',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Pegawai', 'url' => ['/pegawai/index']],
                    ['label' => 'Status Pegawai', 'url' => ['/statuspegawai/index']],
                    ['label' => 'Pendidikan Pegawai', 'url' => ['/pendidikanpegawai/index']],
                    ['label' => 'Jenis Pegawai', 'url' => ['/jenispegawai/index']],
                    ['label' => 'Hari', 'url' => ['/hari/index']],
                    ['label' => 'Jenis Presensi', 'url' => ['/presensi-siswa-jenispresensi/index']],
                    ['label' => 'Jadwal Presensi', 'url' => ['/presensi-siswa-jadwal/index']],
                ],
            ],
            [
                'label' => 'Presensi',
                'url' => '#',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Generate Data Presensi', 'url' => ['/presensi-siswa-data/generate']],
                    ['label' => 'Data Presensi', 'url' => ['/presensi-siswa-data/index']],
                    ['label' => 'Log Presensi', 'url' => ['/presensi-siswa-log/index']],
                ],
            ],
            [
                'label' => 'Cuti',
                'url' => '#',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Data Cuti', 'url' => ['/cuti-pegawai-data/index']],
                    ['label' => 'Jenis Cuti', 'url' => ['/cuti-pegawai-jeniscuti/index']],
                ],
            ],
            [
                'label' => 'Izin',
                'url' => '#',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Data Izin', 'url' => ['/izin-pegawai-data/index']],
                    ['label' => 'Jenis Izin', 'url' => ['/izin-pegawai-jenisizin/index']],
                ],
            ],
            [
                'label' => 'Laporan',
                'url' => '#',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Laporan Presensi Harian', 'url' => ['/laporan/laporan-harian']],
                    ['label' => 'Laporan Presensi Bulanan', 'url' => ['/laporan/laporan-bulanan']],
                ],
            ],
            [
                'label' => 'User Management',
                'url' => '#',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => UserManagementModule::menuItems(),
            ],
            ['label' => 'Exit Login', 'url' => ['/user-management/auth/exit-login-as'], 'visible' => (bool) Yii::$app->session->get('user.olduser', null)],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/user-management/auth/login'], 'visible' => true]
                :
                [
                    'label' => 'Logout (' . $username . ')',
                    'url' => ['/user-management/auth/logout'],
                    'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                    'visible' => true,
                    'items' => [
                        '<div class="cardx" style="width: 18xrem;">
                            <div class="card-body">
                                ' . Html::img('@web/img/user.jpg', ['class' => 'img-circle mb-3', 'style' => 'width: 3rem;', 'alt' => 'User Image']) . '
                                <h5 class="card-title mb-0">' . $username . '</h5>
                                <h7 class="card-subtitle mb-2 text-muted">' . $rolesString . '</h7>
                                <p class="card-text"></p>
                                <div class="d-flex justify-content-aroundx">
                                ' . Html::a("Ubah Password", ["/user-management/auth/change-own-password"], ["data-method" => "post", "class" => "btn btn-primary btn-sm nowrap mr-2"]) . '
                                ' . Html::a("Logout", ["/user-management/auth/logout"], ["data-method" => "post", "class" => "btn btn-warning btn-sm nowrap"]) . '
                                </div>
                            </div>
                        </div>',
                    ]
                ]
        ]
    ]);
    NavBar::end();
    ?>
</header>