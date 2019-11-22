<?php 
use app\models\User;
// use dektrium\user\models\User;
// $model = User::find()->orderBy(['id'=>SORT_DESC])->one();
// echo '<pre>';
// print_r($model);
// echo '</pre>';
 ?>
<aside class="main-sidebar">

    <section class="sidebar">
        <?php if (!Yii::$app->user->isGuest): ?>
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>

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
        <?php endif ?>
        
        <?php 
        use hscstudio\mimin\components\Mimin;
        $menuItems = [
                ['label' => 'E-Learning', 'options' => ['class' => 'header']],
                ['label' => 'User Management','icon' => 'user','url' => '#','items' => [
                        ['label' => 'User', 'icon' => 'users', 'url' => '#','items' => [
                                ['label' => 'Manage', 'icon' => 'users', 'url' => ['/user/admin/index'],'visible' => User::findOne(Yii::$app->user->id)->isAdmin,],
                                ['label' => 'Account', 'icon' => 'user', 'url' => ['/user/settings/account'],],
                                ['label' => 'Profile', 'icon' => 'user-o', 'url' => ['/user/settings/profile'],],
                            ],
                        ],
                        ['label' => 'Role', 'icon' => 'dashboard', 'url' => ['/mimin/role'],],
                        ['label' => 'Route', 'icon' => 'dashboard', 'url' => ['/mimin/route'],],
                    ],
                ],
                ['label' => 'Courses','icon' => 'book','url' => '#','items' => [
                        ['label' => 'Course', 'icon' => 'users', 'url' => ['/course/index'],],
                        ['label' => 'Subject', 'icon' => 'file-code-o', 'url' => ['/subject/index'],],
                        ['label' => 'Level', 'icon' => 'list-ol', 'url' => ['/level/index'],],
                    ],
                ],
                ['label' => 'Institution','icon' => 'graduation-cap','url' => '#','items' => [
                        ['label' => 'Institution', 'icon' => 'list-ul', 'url' => ['/institution/index'],],
                        // ['label' => 'Institution Instructor', 'icon' => 'list-ul', 'url' => ['/institution-instructor/index'],],
                        // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    ],
                ],
                ['label' => 'Some tools','icon' => 'share','url' => '#','items' => [
                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    ],
                ],
            ];
        $menuItems = Mimin::filterMenu($menuItems);
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
