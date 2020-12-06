<?php foreach ($model as $item): ?>
    <div class="light-wrapper">
        <div class="container inner">
            <h1 class="text-center"><?= $item->firstname .' '. $item->secount_name . ' ' . $item->last_name ?></h1>
            <div class="row">
                <div class="col-md-3">
                    <figure><img src="style/images/art/ct1.jpg" alt=""></figure>
                </div>
                <div class="col-md-9">
                    <p><em>Ish joyi va lavozimi:</em> Wordda bor danniyla.</p>
                    <p><em>Partiyaga mansubligi:</em> O`zbekiston "Adolat" ... partiyasi</p>
                    <p><em>Telefon raqami: </em> +998(90)111-22-33</p>
                    <p><em>Xudud: </em> Toshkent shahri</p>
                </div>

            </div>
            <!-- /.blog -->
        </div>
        <!-- /.container -->
    </div>
<?php endforeach ?>
