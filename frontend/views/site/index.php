<div class="content-wrapper">
    <div class="light-wrapper">
        <div class="container inner">
            <h1 class="text-center">Hududiy va mahalliy kengashlarga saylangan deputatarga kelgan murojaatlar</h1>
            <div class="blog list-view row">
                <div class="col-sm-8 blog-content">
                    <div class="blog-posts">
                        <div class="post">
                            <div class="post-content">
                                <?php foreach ($model as $item) { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="meta">
                                                <span class="date"><a href="#"><i
                                                                class="ion-calendar"></i><?= Yii::$app->formatter->asDate($item->created_at) ?></a></span>
                                                <span class="category"><a href="#"><i
                                                                class="ion-person"></i><?= $item->user->firstname . ' ' . $item->user->secount_name ?></a> <a
                                                            href="#">(<?= $item->user->part->name ?>)</a></span>
                                            </div>
                                            <h3 class="post-title"><a href="aaablog-post.html"><?= $item->category->name ?></a></h3>
                                            <p><?= $item->content ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <!--                    <div class="pagination">-->
                    <!--                        <ul>-->
                    <!--                            <li><a href="#"><i class="ion-chevron-left"></i></a></li>-->
                    <!--                            <li class="active"><a href="#"><span>1</span></a></li>-->
                    <!--                            <li><a href="#"><span>2</span></a></li>-->
                    <!--                            <li><a href="#"><span>3</span></a></li>-->
                    <!--                            <li><a href="#"><i class="ion-chevron-right"></i></a></li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                    <!-- /.pagination -->
                </div>
                <!-- /.blog-content -->

                <aside class="col-sm-4 sidebar">
                    <div class="sidebox widget">
                        <h4 class="widget-title">Qidiruv</h4>
                        <form class="searchform" method="get">
                            <input type="text" id="s1" name="s" value="Qidiruv so`zi" onfocus="this.value=''" onblur="this.value='Search something'">
                            <button type="submit" class="btn btn-default">Qidirish</button>
                        </form>
                    </div>
                    <!-- /.widget -->

                    <canvas id="pieChart"></canvas>

                    <div class="sidebox widget">
                        <h4 class="widget-title">Ko`p ko`rilgan murojaatlar</h4>
                        <ul class="post-list">
                            <?php foreach ($model as $item){?>
                            <li>
                                <div class="post-content">
                                    <div class="meta"><span class="date"><?= Yii::$app->formatter->asDate($item->created_at) ?></span></div>
                                    <p><a href="blog-post.html"><?= substr($item->content,0,20).'....' ?></a></p>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                        <!-- /.post-list -->
                    </div>
                    <!-- /.widget -->

                    <div class="sidebox widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="list-unstyled">
                            <?php foreach ($categories as $category){ ?>
                            <li><a href="#"><?=$category->name?></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                </aside>
                <!-- /column .sidebar -->

            </div>
            <!-- /.blog -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.light-wrapper -->

</div>
<!-- /.content-wrapper -->

