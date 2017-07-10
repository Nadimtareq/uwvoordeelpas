<?php $i = 0;
$deal2 = $deals[2];
//dd($deal2->company());
?>

<?php $discountHelper = app('App\Helpers\DiscountHelper'); ?>
<?php $companyReservation = app('App\Models\companyReservation'); ?>

<?php foreach($deals as $deal): ?>
    <?php

            $data = $deal->company();



    $media = isset($data) ? $data->getMedia('default') : '';

    ?>
    <div class="company hidden"
        data-kitchen="<?php if(isset($data->kitchens)): ?><?php echo e(is_array(json_decode($data->kitchens)) ? str_slug(json_decode($data->kitchens)[0]) : ''); ?> <?php endif; ?>"
        data-url="<?php echo e(url('restaurant/'.@$data->slug)); ?>"
        data-name="<?php echo e(@$data->name); ?>"
        data-address="<?php echo e(@$data->address); ?>"
        data-city="<?php echo e(@$data->city); ?>"
        data-zipcode="<?php echo e(@$data->zipcode); ?>">
        <div class="image">
            <div title="<?php echo e(@$data->name); ?>" class="computerImage">
                <?php if(isset($media[0])): ?>
                <a href="<?php echo e(url('restaurant/'.$data->slug)); ?>" title="<?php echo e($data->name); ?>">
                    <img src="<?php echo e(url($media[0]->getUrl('175Thumb'))); ?>" alt="<?php echo e($data->name); ?>" />
                </a>
                <?php else: ?>
                <a href="<?php echo e(url('restaurant/'.@$data->slug)); ?>" title="<?php echo e(@$data->name); ?>">
                    <img src="<?php echo e(url('images/placeholdimage.png')); ?>" alt="<?php echo e(@$data->name); ?>" style="width: 175px; height: 135px" />
                </a>
                <?php endif; ?>

                <?php echo $discountHelper->replaceKeys(
                        $data, 
                        @$data->days,
                        (isset($contentBlock[44]) ? $contentBlock[44] : ''),
                        'ui green label'
                    ); ?>

            </div>

            <!-- Mobile -->
            <div class="mobileImage">
                <a href="<?php echo e(url('restaurant/'.@$data->slug)); ?>" title="<?php echo e(@$data->name); ?>">
                    <?php if(isset($media[0])): ?>
                    <img src="<?php echo e(url($media[0]->getUrl('mobileThumb'))); ?>" />
                    <?php else: ?>
                    <img src="<?php echo e(url('images/placeholdimage.png')); ?>" />
                    <?php endif; ?>
                </a> 
                
                <?php echo $discountHelper->replaceKeys(
                        $data, 
                        @$data->days,
                        (isset($contentBlock[44]) ? $contentBlock[44] : ''),
                        'ribbon-wrapper thumb-discount-label'
                    ); ?>

            </div>
            
            <div class="mobileInfo">
                <div class="right">
                    <a href="<?php echo e(url('restaurant/'.@$data->slug)); ?>" title="<?php echo e(@$data->name); ?>">
                        <h2><?php echo e(@$data->name); ?></h2>
                    </a>

                    <a href="<?php echo e(url('search?q='.@$data->city)); ?>">
                        <span><i class="marker icon"></i> <?php echo e(@$data->city); ?>&nbsp;</span>
                    </a>

                    <?php
                    if(!is_null($data) && (
                        $data->kitchens != 'null' 
                        && $data->kitchens != NULL 
                        && $data->kitchens != '[""]'
                    )) {
                        $kitchens = json_decode($data->kitchens);
                        echo '<a href="'.url('search?q='.$kitchens[0]).'"><i class="food icon"></i> '.ucfirst($kitchens[0]).'</a>';                
                    }
                    ?>

                    <?php if(isset($onFavoritePage)): ?>
                    <a href="<?php echo e(url('account/favorite/companies/remove/'.$data->id.'/'.$data->slug)); ?>">
                        <span><i class="save red icon"></i> Verwijder van favorieten</span>
                    </a>
                    <?php else: ?>
                        <?php if($userAuth == TRUE): ?>
                        <a href="<?php echo e(url('account/favorite/companies/add/'.@$data->id.'/'.@$data->slug)); ?>">
                            <span><i class="save icon"></i> Bewaren</span>
                        </a>
                        <?php else: ?>
                        <a class="login button" 
                           href="<?php echo e(url('account/favorite/companies/add/'.@$data->id.'/'.@$data->slug)); ?>"
                           data-type-redirect="1"
                           data-type="login"
                           data-redirect="<?php echo e(url('account/favorite/companies/add/'.@$data->id.'/'.$data->slug)); ?>">
                            <span><i class="save icon"></i> Bewaren</span>
                        </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Mobile -->
        </div>

        <div class="text">
            <a href="<?php echo e(url('restaurant/'.@$data->slug)); ?>" title="<?php echo e(@$data->name); ?>">
                <h2><?php echo e(@$data->name); ?></h2>
            </a>
            <?php /*<span> Van: <strike><?php echo e($data->price_from); ?></strike> | Voor: <?php echo e($data->price); ?></span>*/ ?>
            <div class="info">
                <a href="<?php echo e(url('search?q='.@$data->city)); ?>"><span><i class="marker icon"></i> <?php echo e(@$data->city); ?>&nbsp;</span></a>
               
                    <?php
                    if(!is_null($data) && (
                        $data->kitchens != 'null' 
                        && $data->kitchens != NULL 
                        && $data->kitchens != '[""]'
                    )) {
                        $kitchens = json_decode($data->kitchens);
                        echo '<a href="'.url('search?q='.$kitchens[0]).'"><i class="food icon"></i> '.ucfirst($kitchens[0]).'</a>';                
                    }
                    ?>

                <?php if(isset($onFavoritePage)): ?>
                <a href="<?php echo e(url('account/favorite/companies/remove/'.$data->id.'/'.$data->slug)); ?>">
                    <span><i class="empty star red icon"></i> Verwijder van favorieten</span>
                </a>
                <?php else: ?>
                    <?php if($userAuth == TRUE): ?>
                    <a class="save button" href="<?php echo e(url('account/favorite/companies/add/'.@$data->id.'/'.@$data->slug)); ?>">
                        <span><i class="save icon"></i> Bewaren</span>
                    </a>
                    <?php else: ?>
                    <a class="login save button" 
                       href="<?php echo e(url('account/favorite/companies/add/'.$data->id.'/'.$data->slug)); ?>"
                       data-type-redirect="1"
                       data-type="login"
                       data-redirect="<?php echo e(url('account/favorite/companies/add/'.$data->id.'/'.$data->slug)); ?>">
                        <span><i class="save icon"></i> Bewaren</span>
                    </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            
            <p><?php echo e(str_limit(@$data->description, (isset($limitChar) ? $limitChar : 210))); ?></p>

            <?php echo $companyReservation->getTimeCarousel(
                    isset($reservationDate) ? $reservationDate : NULL,
                    $data,
                    Request::input('persons', 2),
                    isset($reservationTimesArray) ? $reservationTimesArray : '',
                    isset($tomorrowArray) ? $tomorrowArray : '',
                    Request::input('date'),
                    $deal
                ); ?>

        </div>
        <div class="clear"></div>
    </div>
<?php endforeach; ?>