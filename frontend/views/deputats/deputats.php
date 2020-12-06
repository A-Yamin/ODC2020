<?php foreach ($model as $item): ?>
    <div class="light-wrapper">
        <div class="container inner">
            <h1 class="text-center"><?= $item->firstname .' '. $item->secount_name . ' ' . $item->last_name ?></h1>
            <div class="row">
                <div class="col-md-3">
                    <figure><img src="<?=$item->getThumbFileUrl('photo', 'lg')?>" alt=""></figure>
                </div>
                <div class="col-md-9">
                    <p><em>Partiyaga mansubligi:</em> <?=$item->part->name?></p>
                    <p><em>Telefon raqami: </em> <a href="tel:<?=$item->phone?>"><?=$item->phone?></a></p>
                    <p><em>Viloyat: </em>
                        <?php
                        $elem = json_decode(json_decode(file_get_contents('https://pm.gov.uz/oz/api/enums/get-regions')));
                        foreach ($elem as $value) {
                            if ($item->reg_id === $value->id) {
                                echo $value->title;
                            }
                        }
                        ?></p>
                    <p><em>Tuman: </em>
                        <?php
                        $elem = json_decode(json_decode(file_get_contents('https://pm.gov.uz/oz/api/enums/get-districts?region_id=' . $item->reg_id)));
                        foreach ($elem as $value) {
                            if ($item->district_id === $value->id) {
                                echo $value->title;
                            }
                        }
                        ?></p>
                    <p><em>Mahalla yoki okrug: </em>
                        <?php
                        $elem = json_decode(json_decode(file_get_contents('https://pm.gov.uz/oz/api/enums/get-mahalla?region_id=' . $item->reg_id . '&district_id=' . $item->district_id)));
                        foreach ($elem as $value) {
                            if ($item->mahalla_id === $value->id) {
                                echo $value->title;
                            }
                        }
                        ?></p>
                    <a href="<?=\yii\helpers\Url::to(['feedbacks/add'])?>" class="btn btn-success">Murojaat qilish</a>
                </div>

            </div>
            <!-- /.blog -->
        </div>
        <!-- /.container -->
    </div>
<?php endforeach ?>
