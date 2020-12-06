<div class="navbar navbar-default default extended centered" role="navigation">
    <div class="container">
        <!-- /.nav-header -->
    </div>
    <!--/.container -->
    <div class="navbar-collapse collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="aaa.html">Murojaatlar</a></li>
                <li><a href="aaadeputatlar.html">Deputatlar</span></a></li>
                <li><a href="<?=\yii\helpers\Url::to(['deputats/list']) ?>">Deputatlar view</a></li>
                <li><a href="<?=\yii\helpers\Url::to(['feedbacks/add'])?>" class="btn btn-border dark" style="line-height: 36px;margin-top: 7px;"><i class="ion-android-mail"></i>Murojaat qoldirish</a></li>
            </ul>
        </div>
        <!--/.container -->
    </div>
    <!--/.nav-collapse -->

</div>