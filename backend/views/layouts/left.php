<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/avatar2.jpeg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->firstname ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Онлайн</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Home', 'options' => ['class' => 'header']],
                    ['label' => 'Users', 'icon' => 'users', 'url' => ['/user/index']],
                    ['label' => 'Regions', 'icon' => 'map', 'url' => ['/regions/index']],
                    ['label' => 'Feedbacks', 'icon' => 'telegram', 'url' => ['/feedbacks/index']],
                    ['label' => 'Categories', 'icon' => 'th-list', 'url' => ['/categories/index']],
                    ['label' => 'Parties', 'icon' => 'shield', 'url' => ['/parties/index']],
                ],
            ]
        ) ?>
    </section>
</aside>
