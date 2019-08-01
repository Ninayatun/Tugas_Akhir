<?php
use app\models\User;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../web/gambar/admin.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php if (User::isAdmin()) { ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Home', 'icon' => 'dashboard','url' => ['site/index'],],
                    ['label' => 'Master Data', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Data Pemasukan',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Zakat', 'icon' => 'book','url' => ['zakat/index'],],
                            ['label' => 'Jenis Zakat', 'icon' => 'list','url' => ['jenis-zakat/index'],],
                            ['label' => 'Infaq', 'icon' => 'book','url' => ['infaq/index'],],
                            ['label' => 'Shadaqah', 'icon' => 'book','url' => ['shadaqah/index'],],
                        ],
                    ],
                    ['label' => 'Pengeluaran', 'icon' => 'book','url' => ['pengeluaran/index'],],
                    ['label' => 'Laporan', 'icon' => 'file-pdf-o','url' => ['zakat/laporan'],],
                    ['label' => 'Artikel', 'options' => ['class' => 'header']],
                    ['label' => 'Artikel', 'icon' => 'font','url' => ['artikel/index'],],
                    ['label' => 'User', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Data Pengguna',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Mustahik', 'icon' => 'user', 'url' => ['mustahik/index'],],
                            ['label' => 'Jenis Mustahik', 'icon' => 'list','url' => ['jenis-mustahik/index'],],
                            ['label' => 'Muzaki', 'icon' => 'user', 'url' => ['muzaki/index'],],
                            ['label' => 'User', 'icon' => 'users', 'url' => ['user/index'],],
                            ['label' => 'User Role', 'icon' => 'list-ol', 'url' => ['user-role/index'],],
                        ],
                    ],                    
                ],
            ]
        ) ?>
        <?php } elseif (User::isMuzaki()) { ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Home', 'icon' => 'dashboard','url' => ['site/index'],],
                    ['label' => 'Rekening Zakat', 'options' => ['class' => 'header']],
                    ['label' => 'Informasi Rekening', 'icon' => 'book','url' => ['site/rekening'],],
                    ['label' => 'Kalkulator Zakat', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Kalkulator Zakat',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Zakat Penghasilan', 'icon' => 'book','url' => ['site/penghasilan'],],
                            ['label' => 'Zakat Mal', 'icon' => 'book','url' => ['site/mal'],],
                            ['label' => 'Zakat Perdagangan', 'icon' => 'book','url' => ['site/perdagangan'],],
                        ],
                    ],
                    ['label' => 'Pembayaran', 'options' => ['class' => 'header']],
                    ['label' => 'Bayar Zakat', 'icon' => 'book','url' => ['zakat/create'],],
                    ['label' => 'Shadaqah', 'icon' => 'book','url' => ['shadaqah/create'],],
                    ['label' => 'Laporan Keuangan', 'options' => ['class' => 'header']],
                    ['label' => 'Laporan', 'icon' => 'file-pdf-o','url' => ['zakat/laporan'],],
                    ['label' => 'Data Muzaki', 'options' => ['class' => 'header']],
                    ['label' => 'Profil', 'icon' => 'book','url' => ['muzaki/view', 'id' => Yii::$app->user->identity->id_muzaki],],
                    ['label' => 'Contact', 'icon' => 'book','url' => ['site/contact'],],

                ],
            ]
        ) ?>
        <?php } ?>

    </section>

</aside>
