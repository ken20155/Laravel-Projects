
<div class="tab">
    <ul class="nav nav-tabs nav-justified customtab" role="tablist">
            <?php 
            $categories = ['All', 'Plants', 'Tools', 'Feed', 'Flowers', 'Fruits', 'Vegetables'];
            foreach ($categories as $category) {
                echo ' <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#home2" role="tab" aria-selected="true">'.$category.'</a></li>';
            }    
            ?>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="home2" role="tabpanel">
            <div class="pd-20">
                <div class="gallery-wrap">
                    <ul class="row">
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?= env('APP_URL_USER') ?>public/plugins/img/product-1.jpg" alt="" />
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a
                                                        href="<?= env('APP_URL_USER') ?>public/plugins/img/product-1.jpg"
                                                        data-fancybox="images"
                                                        ><i class="fa fa-picture-o"></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?= env('APP_URL_USER') ?>public/plugins/img/product-2.jpg" alt="" />
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a
                                                        href="<?= env('APP_URL_USER') ?>public/plugins/img/product-2.jpg"
                                                        data-fancybox="images"
                                                        ><i class="fa fa-picture-o"></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?= env('APP_URL_USER') ?>public/plugins/img/product-3.jpg" alt="" />
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a
                                                        href="<?= env('APP_URL_USER') ?>public/plugins/img/product-3.jpg"
                                                        data-fancybox="images"
                                                        ><i class="fa fa-picture-o"></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?= env('APP_URL_USER') ?>public/plugins/img/product-4.jpg" alt="" />
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a
                                                        href="<?= env('APP_URL_USER') ?>public/plugins/img/product-4.jpg"
                                                        data-fancybox="images"
                                                        ><i class="fa fa-picture-o"></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?= env('APP_URL_USER') ?>public/plugins/img/product-1.jpg" alt="" />
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a
                                                        href="<?= env('APP_URL_USER') ?>public/plugins/img/product-1.jpg"
                                                        data-fancybox="images"
                                                        ><i class="fa fa-picture-o"></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?= env('APP_URL_USER') ?>public/plugins/img/product-2.jpg" alt="" />
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a
                                                        href="<?= env('APP_URL_USER') ?>public/plugins/img/product-2.jpg"
                                                        data-fancybox="images"
                                                        ><i class="fa fa-picture-o"></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?= env('APP_URL_USER') ?>public/plugins/img/product-3.jpg" alt="" />
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a
                                                        href="<?= env('APP_URL_USER') ?>public/plugins/img/product-3.jpg"
                                                        data-fancybox="images"
                                                        ><i class="fa fa-picture-o"></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?= env('APP_URL_USER') ?>public/plugins/img/product-4.jpg" alt="" />
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a
                                                        href="<?= env('APP_URL_USER') ?>public/plugins/img/product-4.jpg"
                                                        data-fancybox="images"
                                                        ><i class="fa fa-picture-o"></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?= env('APP_URL_USER') ?>public/plugins/img/product-1.jpg" alt="" />
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                                            </h5>
                                            <ul class="clearfix">
                                                <li>
                                                    <a
                                                        href="<?= env('APP_URL_USER') ?>public/plugins/img/product-1.jpg"
                                                        data-fancybox="images"
                                                        ><i class="fa fa-picture-o"></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile2" role="tabpanel">
            <div class="pd-20">
                Lorem ipsum dolor sit amet, consectetur adipisicing
                elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                non proident, sunt in culpa qui officia deserunt mollit
                anim id est laborum.
            </div>
        </div>
        <div class="tab-pane fade" id="contact2" role="tabpanel">
            <div class="pd-20">
                Lorem ipsum dolor sit amet, consectetur adipisicing
                elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                non proident, sunt in culpa qui officia deserunt mollit
                anim id est laborum.
            </div>
        </div>
    </div>
</div>



