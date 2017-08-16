<?php /**/ $pageTitle = 'Zoeken' /**/ ?>
<?php $__env->startSection("header_picture"); ?>
   <?php echo $__env->make('pages._search-slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
    
    <script type="javascript">
        var searchPage = 1;
    </script>
    <div class="clearfix"></div>
     <?php echo $__env->make('pages.search-filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="clearfix"></div>
    <?php /*<!--*/ ?>
    <?php /*<section id="prices">*/ ?>
            <?php /*<div class="container">*/ ?>
                <?php /*<div class="col-sm-12 col-ms1">*/ ?>
                    <?php /*<div class="col-sm-3 col5">*/ ?>
                        <?php /*<ul>*/ ?>
                            <?php /*<li>*/ ?>
                                <?php /*<div class="ob"><img src="images/g1.jpg" alt="g1"><i>50%</i></div>*/ ?>
                                <?php /*<div class="text3">*/ ?>
                                    <?php /*<strong>3 gangen keuzemenu met vlees / vis</strong>*/ ?>
                                    <?php /*<span class="city"><i class="material-icons">place</i>New York, USA</span>*/ ?>
                                    <?php /*<span class="stars"><img src="images/stars.png" alt="stars">5.00</span>*/ ?>
                                    <?php /*<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>*/ ?>
                                    <?php /*<div class="wr">*/ ?>
                                        <?php /*<b>Vandaag beschikbar voor 2 personen</b>*/ ?>
                                        <?php /*<div class="calendar">*/ ?>
                                            <?php /*<a href="#" class="prev"><img src="images/prev2.png" alt="prev2"></a>*/ ?>
                                            <?php /*<ul>*/ ?>
                                                <?php /*<li><a href="#">18:00</a></li>*/ ?>
                                                <?php /*<li><a href="#">18:15</a></li>*/ ?>
                                                <?php /*<li><a href="#">18:30</a></li>*/ ?>
                                                <?php /*<li><a href="#">18:45</a></li>*/ ?>
                                                <?php /*<li><a href="#">19:00</a></li>*/ ?>
                                            <?php /*</ul>*/ ?>
                                            <?php /*<a href="#" class="next"><img src="images/next2.png" alt="next2"></a>*/ ?>
                                        <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<span class="price">€ 12.95</span>*/ ?>
                                    <?php /*<span class="price2">€ 12.95</span>*/ ?>
                                    <?php /*<a href="#" class="more">Reserveer nu</a>*/ ?>
                                <?php /*</div>*/ ?>
                            <?php /*</li>*/ ?>

                        <?php /*</ul>*/ ?>
                        <?php /*<div class="pages">*/ ?>
                            <?php /*<a href="#" class="prev2">&lt;</a>*/ ?>
                            <?php /*<ul>*/ ?>
                                <?php /*<li><a href="#">1</a></li>*/ ?>
                                <?php /*<li><a href="#" class="active">2</a></li>*/ ?>
                                <?php /*<li><a href="#">...</a></li>*/ ?>
                                <?php /*<li><a href="#">8</a></li>*/ ?>
                            <?php /*</ul>*/ ?>
                            <?php /*<a href="#" class="next2">&gt;</a>*/ ?>
                        <?php /*</div>*/ ?>
                    <?php /*</div>*/ ?>
                <?php /*</div>*/ ?>
            <?php /*</div>*/ ?>
    <?php /*</section>*/ ?>
    <?php /*-->*/ ?>

    <section  id="search-list" >
        <div class="container">
            <div class="col-sm-12 col-ms1">
                <div class="col-sm-3 col5">
                    <?php if(count($companies) >= 1): ?>
<?php /*  
                        <div class="search-layout">
                            <div class="pull-right">

                                <span class="rs">View</span>

                                <a href="<?php echo e(url("search?regio=eindhoven&layout=grid")); ?>" class="active">
                                    <img src="<?php echo e(url("images/one.png")); ?>" alt="one">
                                </a>

                                <a href="<?php echo e(url("search?regio=eindhoven")); ?>">
                                    <img src="<?php echo e(url("images/two.png")); ?>" alt="two">
                                </a>

                            </div>
                        </div>  */ ?>

                        <?php echo $__env->make('company-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php if(count($recommended) >= 1): ?>
                            <h3 class="ui header">Zie ook</h3>

                            <?php echo $__env->make('company-list-more', ['viewType' => 'more'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>

                        <?php if($countCompanies >= 16): ?>
                            <div id="limitSelect" class="ui basic segment">
                                <div class="ui normal floating icon selection dropdown">
                                    <i class="dropdown right floated icon"></i>
                                    <div class="text"><?php echo e($limit); ?> resultaten weergeven</div>

                                    <div class="menu">
                                        <a class="item" href="<?php echo e(url('search?'.http_build_query(array_add($queryString, 'limit', '15')))); ?>">15</a>
                                        <a class="item" href="<?php echo e(url('search?'.http_build_query(array_add($queryString, 'limit', '30')))); ?>">30</a>
                                        <a class="item" href="<?php echo e(url('search?'.http_build_query(array_add($queryString, 'limit', '45')))); ?>">45</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php echo $companies->appends($paginationQueryString)->render(); ?>

                    <?php else: ?>
                        Er zijn geen restaurants gevonden met uw selectiecreteria.
                    <?php endif; ?>
                </div>
            </div>

            <?php /*   <div class="right section">
               <?php echo $__env->make('template.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             </div>  */ ?>
        </div>
    </section>

    <div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("after_styles"); ?>
    <link href="<?php echo e(asset("css/custom.css")); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>