<?php $affiliate = app('App\Models\Affiliate'); ?>
<?php $strHelper = app('App\Helpers\StrHelper'); ?>
<?php $FileHelper = app('App\Helpers\FileHelper'); ?>

<?php /**/ $pageTitle = (isset($contentBlock[1]) ? strip_tags($contentBlock[1]) : '') /**/ ?>

<?php /* <?php if(Route::getCurrentRoute()->uri() != '/'): ?>
    <?php $__env->startSection("header_picture"); ?>
        <?php echo $__env->make('pages._search-slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php endif; ?> */ ?>

<?php $__env->startSection('content'); ?>

    <?php
    $breadcrumbArray1 = (Request::has('preference') ? Request::get('preference') : ($userAuth && count
    ($user->preferences) >= 1 && $user->preferences != 'null' && $user->preferences != null ? json_decode($user->preferences) : array()));
    $breadcrumbArray2 = (Request::has('kitchen') ? Request::get('kitchen') : ($userAuth && count($user->kitchens) >= 1 && $user->kitchens != 'null' && $user->kitchens != null ? json_decode($user->kitchens) : array()));
    $breadcrumbArray3 = (Request::has('price') ? Request::get('price') : ($userAuth && count($user->price) >= 1 && $user->price != 'null' && $user->price != null ? json_decode($user->price) : array()));
    $breadcrumbArray4 = (Request::has('discount') ? Request::get('discount') : ($userAuth && count($user->discount) >= 1 && $user->discount != 'null' && $user->discount != null ? json_decode($user->discount) : array()));
    $breadcrumbArray5 = (Request::has('allergies') ? Request::get('allergies') : ($userAuth && count($user->allergies) >= 1 && $user->allergies != 'null' && $user->allergies != null ? json_decode($user->allergies) : array()));
    $arrayMerge = array_filter(array_merge($breadcrumbArray1, $breadcrumbArray2, $breadcrumbArray3, $breadcrumbArray4, $breadcrumbArray5));
    ?>


    <?php if($userAuth == FALSE): ?>
        <div class="clear"></div>

        <?php /*<h2  style="color: blue" class="home login header" data-type="login">"Meld je nu aan en spaar direct!"</h2>*/ ?>
        <div id="cities">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 tabs-content">
                        <?php echo isset($contentBlock[48]) ? $contentBlock[48] : ''; ?>

                        <?php foreach($cities as $city): ?>
                            <div class="col-sm-4 col-xs-12 col4">
                                <a href="<?php echo e(url('search?regio='.$city->slug)); ?>">
                                    <img class="ui image" src="<?php echo e($city->media); ?>" alt="<?php echo e($city->name); ?>">
                                    <p><?php echo e($city->name); ?></p>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="clear"></div>

                    <?php if(count($cities) > 6): ?>
                        <button id="loadMoreHome" class="more wr2" >
                            <i class="arrow cicle outline left down icon"></i>
                            MEER STEDEN BEKIJKEN
                        </button>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <?php if(count($affiliates) >= 1): ?>
            <section id="partners">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h1>SPAAR TOT WEL 10% BIJ 2000+ WEBSHOPS, O.A:</h1>
                            <?php foreach($affiliates as $data): ?>
                                <div class="col-md-2 col-sm-4 col-xs-12">
                                    <div class="partner">
                                        <a href="<?php echo e(url('tegoed-sparen/company/'.$data['name'])); ?>">
                                            <span class="partner2"><h1><?php echo e($data['comissions']); ?></h1>Max. spaartegoed</span>
                                            <?php $mediaUrl =  'images/affiliates/'. $data->affiliate_network .'/'.$data->program_id.'.'.$data->image_extension; ?>
                                            <?php if(isset($data->image_extension) && $FileHelper::is_url_exist(url($mediaUrl))): ?>
                                                <img src="<?php echo e(url($mediaUrl)); ?>" alt="more" />
                   
                                            <?php else: ?>
                                                <img src="<?php echo e(url('images/placeholdimage.png')); ?>" alt="p1"> 
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php else: ?>

        <div class="container">
            <?php if(count($arrayMerge) >= 1): ?>
                <div class="ui grid container blueseal-text">
                    <div class="left floated sixteen wide mobile ten wide computer column">
                        U zoekt nu op &nbsp;
                        <?php foreach($arrayMerge as $item): ?>
                            <div class="ui label"><?php echo e(urldecode(ucfirst($item))); ?></div>
                        <?php endforeach; ?>
                    </div>

                    <div class="right floated sixteen wide mobile two wide computer column">
                        <button id="homePrefrencesButton" class="ui display filter basic blue fluid tiny button">Aanpassen</button>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="<?php echo (Route::getCurrentRoute()->uri() !== '/') ? 'side_menus' : ''; ?>">
            <?php echo Form::open(array('url' => 'preferences?type=home', 'method' => 'post', 'class' => 'ui form')); ?>

            <?php if(Request::has('date')): ?>
                <input type="hidden" name="date" value="<?php echo Request::get('date'); ?>" />
            <?php endif; ?>

            <?php if(Request::has('time')): ?>
                <input type="hidden" name="time" value="<?php echo Request::get('time'); ?>" />
            <?php endif; ?>

            <?php if(Request::has('time')): ?>
                <input type="hidden" name="time_format" value="<?php echo date('Hi', strtotime(Request::get('time'))); ?>" />
            <?php endif; ?>
            <input type="hidden" id="typePage" name="typePage" value="1" />
            <input type="hidden" name="q" value="<?php echo Request::get('q'); ?>" />
            <?php if(Request::has('persons')): ?>
                <input type="hidden" name="persons" value="<?php echo Request::get('persons'); ?>" />
            <?php endif; ?>

            <div class="content">
                <div class="static-menu row">
                    <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <?php $data=''; ?>
                        <?php if(isset($preference[9])): ?>
                            <select name="discount[]" class = 'multipleSelect' id='city' onchange="javascript:handleSelect(this)">
                                <option value=""><a href="#" >Stad</a></option>
                                <?php foreach($preference[9] as $key=>$pre): ?>
                                    <option value="<?php echo e($key); ?>"><a href="#" ><?php echo e($pre); ?></a></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                    </div>
                    <div class="jsearch col-md-2 col-sm-2 col-xs-6" >
                        <?php echo e(Form::select('preference[]',
                                        (isset($preference[1]) ? $preference[1] : array()),
                                        (Request::has('preference') ? Request::get('preference') : ''),
                                        array('class' => 'multipleSelect', 'data-placeholder' => 'Voorkeuren', 'multiple' => 'multiple'))); ?>


                    </div>
                    <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <?php echo e(Form::select('kitchen[]',
                                        (isset($preference[2]) ? $preference[2] : array()),
                                        (Request::has('kitchen') ? Request::get('kitchen') : ($user && $user->kitchens != NULL ? json_decode($user->kitchens) : '')),
                                        array('class' => 'multipleSelect', 'data-placeholder' => 'Keuken', 'multiple' => 'multiple'))); ?>

                    </div>
                    <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <?php echo e(Form::select('price[]',
                                                (isset($preference[4]) ? $preference[4] : array()),
                                                (Request::has('price') ? Request::get('price') : ($user && $user->price != NULL ? json_decode($user->price) : '')),
                                                array('class' => 'multipleSelect', 'data-placeholder' => 'Soort', 'multiple' => 'multiple'))); ?>

                    </div>
                <!--
            <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                <?php echo e(Form::select('discount[]',
                                        (isset($preference[5]) ? $preference[5] : array()),
                                        (Request::has('discount') ? Request::get('discount') : ($user && $user->discount != NULL ? json_decode($user->discount) : '')),
                                        array('class' => 'multipleSelect', 'data-placeholder' => 'Korting', 'multiple' => 'multiple'))); ?>


                        </div>
-->
                    <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <?php echo e(Form::select('allergies[]',
                                                (isset($preference[3]) ? $preference[3] : array()),
                                                (Request::has('allergies') ? Request::get('allergies') : ($user && $user->allergies != NULL ? json_decode($user->allergies) : '')),
                                                array('class' => 'multipleSelect', 'data-placeholder' => 'Allergieen',  'multiple' => 'multiple'))); ?>

                    </div>
                    <div class="jsearch col-md-2 col-sm-2 col-xs-12">
                        <input type="submit" class="ui bluelink fluid filter button" value="Filteren" />
                    </div>
                </div>

            </div>
            <?php echo Form::close() ?>
        </div>

        <section  id="prices" class="home_price_div">
            <div class="container">
                <div class="col-sm-12 col-ms1">
                    <div class="col-sm-3 col5">

                        <?php if(count($companies) >= 1): ?>

                            <?php echo $__env->make('company-list-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <div class="ui vertically divided grid container">
                                <div class="row mobile only">
                                    <div id="optionTwo" class="fourteen wide mobile seven wide tablet seven wide computer computer column">
                                        <h3 class="ui small header">Populairste nieuwsberichten</h3>
                                        <?php if(count($news) >= 1): ?>
                                            <div class="ui very relaxed divided selection list">
                                                <?php foreach($news as $article): ?>
                                                    <div class="item">
                                                        <i class="angle right icon"></i>
                                                        <div class="content">
                                                            <a href="<?php echo e(url('news/'. $article->slug)); ?>" class="header"><h4><?php echo e($article->title); ?></h4></a>
                                                            <div class="description">Geplaatst op <?php echo e(date('d-m-Y H:i:s', strtotime($article->created_at))); ?></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php else: ?>
                                            <?php echo "Er zijn geen nieuwsberichten gevonden"; ?>

                                        <?php endif; ?>
                                    </div>

                                    <div id="optionThree" class="fourteen wide mobile seven wide tablet seven wide computer column">
                                        <h3 class="ui small header">Populairste kortingscodes</h3>
                                        <?php if(count($affiliates) >= 1): ?>
                                            <div class="ui grid container">
                                                <?php foreach($affiliates as $data): ?>
                                                    <?php $media = $data->getMedia(); ?>
                                                    <div class="four columns row">
                                                        <div class="six wide mobile five wide computer column">
                                                            <a href="<?php echo e(url('tegoed-sparen/company/'.$data->slug)); ?>"><h4><?php echo e($data->name); ?></h4></a>
                                                        </div>

                                                        <div class="one wide right floated column">
                                                            <a href="<?php echo e(url('tegoed-sparen/company/'.$data->slug)); ?>"><i class="angle right grey large icon"></i></a>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php else: ?>
                                            <?php echo "Er zijn nog geen kortingscodes"; ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php echo $companies->appends($paginationQueryString)->render(); ?>


                            <div id="limitSelect" class="ui basic segment">
                                <div class="ui normal floating float-right icon selection dropdown">
                                    <i class="dropdown right floated icon"></i>
                                    <div class="text"><?php echo e($limit); ?> resultaten</div>

                                    <div class="menu">
                                        <a class="item" href="<?php echo e(url('/?'.http_build_query(array_add($queryString, 'limit', '15')))); ?>">15</a>
                                        <a class="item" href="<?php echo e(url('/?'.http_build_query(array_add($queryString, 'limit', '30')))); ?>">30</a>
                                        <a class="item" href="<?php echo e(url('/?'.http_build_query(array_add($queryString, 'limit', '45')))); ?>">45</a>
                                    </div>
                                </div>
                            </div>


                        <?php else: ?>
                            <?php echo "Er zijn geen restaurants gevonden met uw selectiecreteria."; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection("after_styles"); ?>
     <link href="<?php echo e(asset("css/custom.css")); ?>" rel="stylesheet"> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.theme',['search_header' => ($userAuth != FALSE) ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>