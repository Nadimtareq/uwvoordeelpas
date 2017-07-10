<?php $affiliate = app('App\Models\Affiliate'); ?>
<?php $strHelper = app('App\Helpers\StrHelper'); ?>

<?php /**/ $pageTitle = (isset($contentBlock[1]) ? strip_tags($contentBlock[1]) : '') /**/ ?>

<?php $__env->startSection('content'); ?>
    <?php
    $breadcrumbArray1 = (Request::has('preference') ? Request::get('preference') :($userAuth && count($user->preferences) >= 1 && $user->preferences != 'null' && $user->preferences != null ? json_decode($user->preferences) : array()));
    $breadcrumbArray2 = (Request::has('kitchen') ? Request::get('kitchen') : ($userAuth && count($user->kitchens) >= 1 && $user->kitchens != 'null' && $user->kitchens != null ? json_decode($user->kitchens) : array()));
    $breadcrumbArray3 = (Request::has('price') ? Request::get('price') : ($userAuth && count($user->price) >= 1 && $user->price != 'null' && $user->price != null ? json_decode($user->price) : array()));
    $breadcrumbArray4 = (Request::has('discount') ? Request::get('discount') : ($userAuth && count($user->discount) >= 1 && $user->discount != 'null' && $user->discount != null ? json_decode($user->discount) : array()));
    $breadcrumbArray5 = (Request::has('allergies') ? Request::get('allergies') : ($userAuth && count($user->allergies) >= 1 && $user->allergies != 'null' && $user->allergies != null ? json_decode($user->allergies) : array()));
    $arrayMerge = array_filter(array_merge($breadcrumbArray1, $breadcrumbArray2, $breadcrumbArray3, $breadcrumbArray4, $breadcrumbArray5));
    ?>

    <?php if($userAuth == FALSE): ?>
        <div class="clear"></div>
        <?php /*<h2  style="color: blue" class="home login header" data-type="login">"Meld je nu aan en spaar direct!"</h2>*/ ?>

        <div class="container">
            <?php echo isset($contentBlock[48]) ? $contentBlock[48] : ''; ?>


            <div class="ui three column stackable grid">
                <?php foreach($cities as $city): ?>
                    <?php $media = $city->getMedia(); ?>
                    <div class="column">
                        <div class="card">
                            <a href="<?php echo e(url('search?regio='.$city->slug)); ?>">
                                <?php if(isset($media[0])): ?>
                                    <img class="ui image" src="<?php echo e(url(''.$media[0]->getUrl('thumb'))); ?>" alt="<?php echo e($city->name); ?>">
                                <?php else: ?>
                                    <img class="ui image" src="<?php echo e(url('images/placeholdimage.png')); ?>" alt="<?php echo e($city->name); ?>">
                                <?php endif; ?>
                                
                                <h4><?php echo e($city->name); ?></h4>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><br />

            <?php if(count($cities) > 6): ?>
            <div class="ui three column centered grid">
                <div class="column">
                    <button id="loadMoreHome" class="ui fluid blue labeled icon button">
                        <i class="arrow cicle outline left down icon"></i>
                        Meer steden laden
                    </button>
                </div>
            </div>
            <?php endif; ?>

            <div class="clear"></div>
        </div>
    <?php else: ?>
    <div class="container">
        <?php if(count($arrayMerge) >= 1): ?>
        <div class="ui grid container">
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

    <div class="content">
        <div class="ui equal width responsive grid container">
            <div class="column">
                <?php echo isset($contentBlock[2]) ? $contentBlock[2] : ''; ?>

            </div>
            <div class="column">
                <?php echo isset($contentBlock[3]) ? $contentBlock[3] : ''; ?>

            </div>
        </div> 

        <div id="typeBar" class="ui basic segment"> 
            <select id="typePage" class="multipleSelect">
                <option value="1" selected>Restaurant</option>
                <option value="2">Nieuwsberichten</option>
                <option value="3">Kortingscodes</option>
                <option value="4">Tegoed sparen</option>
                <option value="5">Veelgestelde vragen</option>
            </select>
        </div>
    </div>

    <div class="container">
        <div class="filter toolbar">
            <?php echo Form::open(array('url' => 'preferences?type=home', 'method' => 'post', 'class' => 'ui form')); ?>
            <div class="six fields">
                <div class="field">
                    <?php 
                    echo Form::select(
                        'preference[]', 
                        (isset($preference[1]) ? $preference[1] : array()),  
                        (Request::has('preference') ? Request::get('preference') : ($user && $user->preferences != NULL ? json_decode($user->preferences) : '')), 
                        array('class' => 'multipleSelect', 'data-placeholder' => 'Voorkeuren', 'multiple' => 'multiple')
                    ); 
                    ?>
                </div>

                <div class="field">
                    <?php 
                    echo Form::select(
                        'kitchen[]', 
                        (isset($preference[2]) ? $preference[2] : array()),  
                        (Request::has('kitchen') ? Request::get('kitchen') : ($user && $user->kitchens != NULL ? json_decode($user->kitchens) : '')), 
                        array('class' => 'multipleSelect', 'data-placeholder' => 'Keuken', 'multiple' => 'multiple')
                    ); 
                    ?>
                </div>

                <div class="field">
                    <?php 
                    echo Form::select(
                        'price[]', 
                        (isset($preference[4]) ? $preference[4] : array()),  
                        (Request::has('price') ? Request::get('price') : ($user && $user->price != NULL ? json_decode($user->price) : '')), 
                        array('class' => 'multipleSelect', 'data-placeholder' => 'Soort', 'multiple' => 'multiple')
                    ); 
                    ?>
                </div>

                <div class="field">           
                    <?php 
                    echo Form::select(
                        'discount[]', 
                        (isset($preference[5]) ? $preference[5] : array()),  
                        (Request::has('discount') ? Request::get('discount') : ($user && $user->discount != NULL ? json_decode($user->discount) : '')), 
                         array(
                            'class' => 'multipleSelect', 
                            'data-placeholder' => 'Korting', 
                            'multiple' => 'multiple'
                        )
                    ); 
                    ?>
                </div>

                <div class="field">
                    <?php echo Form::select(
                        'allergies[]', 
                        (isset($preference[3]) ? $preference[3] : array()),  
                        (Request::has('allergies') ? Request::get('allergies') : ($user && $user->allergies != NULL ? json_decode($user->allergies) : '')), 
                        array('class' => 'multipleSelect', 'data-placeholder' => 'Allergieen',  'multiple' => 'multiple')
                    ); ?>
                </div>

                <div class="field">
                    <input type="submit" class="ui blue fluid filter button" value="Filteren" />
                </div>
            </div>
            <?php echo Form::close() ?>
        </div>
        <div class="clear"></div>
    </div>

    <div id="companies" class="content">
        <div class="left section">
            <div id="optionOne" class="companies home">
                <?php echo $__env->make('deal-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><br />
            </div>

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
                        Er zijn geen nieuwsberichten gevonden
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
                            Er zijn nog geen kortingscodes
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="right section">
<?php /*            <?php echo $__env->make('template.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
        </div>

        <div class="ui grid container">
            <div class="left floated sixteen wide mobile ten wide computer column">
                <?php echo with(new \App\Presenter\Pagination($companies->appends($paginationQueryString)))->render(); ?>

            </div>

            <div class="right floated sixteen wide mobile sixteen wide tablet three wide computer column">
                <div id="limitSelect">
                    <div class="ui normal floating icon selection fluid dropdown">
                        <i class="dropdown right floated icon"></i>
                        <div class="text"><?php echo e($limit); ?> resultaten</div>
                                 
                        <div class="menu">
                            <a class="item" href="<?php echo e(url('/?'.http_build_query(array_add($queryString, 'limit', '15')))); ?>">15</a>
                            <a class="item" href="<?php echo e(url('/?'.http_build_query(array_add($queryString, 'limit', '30')))); ?>">30</a>
                            <a class="item" href="<?php echo e(url('/?'.http_build_query(array_add($queryString, 'limit', '45')))); ?>">45</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>