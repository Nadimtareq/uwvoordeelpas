<?php use App\Http\Controllers\HomeController; $i = 0; ?>

<?php $discountHelper = app('App\Helpers\DiscountHelper'); ?>
<?php $companyReservation = app('App\Models\companyReservation'); ?>
<?php $FileHelper = app('App\Helpers\FileHelper'); ?>
<style>
	.home_price_div{
		padding-top: 0px !important;
	}
	.company1{
		clear: both;

	}
	.col5 .ob {
		margin-top: 10px;
	}
</style>
 <ul>


<?php foreach($companies as $data): ?>

    <?php foreach($data->ReservationOptions2()->get() as $deal): ?>
	<li>
        <?php

        $media = $data->getMedia('default');

        $getRec        = HomeController::getPersons($deal->id);
        $count_persons = $getRec[0]->total_persons;

        ?>
        <div class="company1"
             data-kitchen="<?php echo e(is_array(json_decode($data->kitchens)) ? str_slug(json_decode($data->kitchens)[0]) : ''); ?>"
             data-url="<?php echo e(url('restaurant/'.$data->slug)); ?>"
             data-name="<?php echo e($data->name); ?>"
             data-address="<?php echo e($data->address); ?>"
             data-city="<?php echo e($data->city); ?>"
             data-zipcode="<?php echo e($data->zipcode); ?>">


            <div class="ob">
                    <?php if(isset($media[0]) && isset($media[0]->file_name) && file_exists(public_path($media[0]->disk. DIRECTORY_SEPARATOR . $media[0]->id . DIRECTORY_SEPARATOR . $media[0]->file_name)) ): ?>

					<?php if($count_persons >= $deal->total_amount): ?>
						<img width="420" src="<?php echo e(url('media/'.$media[0]->id.'/'.$media[0]->file_name)); ?>" alt="<?php echo e($data->name); ?>"  class="thumbnails" />

					<?php else: ?>
						<a href="<?php echo e(url('restaurant/'.$data->slug).'?deal='.$deal->id); ?>" title="<?php echo e($data->name); ?>" >
							<img width="420" src="<?php echo e(url('media/'.$media[0]->id.'/'.$media[0]->file_name)); ?>" alt="<?php echo e($data->name); ?>"  class="thumbnails" />
						</a>
						<?php endif; ?>
                    <?php else: ?>


<?php /*					<?php if($count_persons >= $deal->total_amount): ?>

						<img src="<?php echo e(url('images/placeholdimagerest.png')); ?>" alt="<?php echo e($data->name); ?>" class="thumbnails"  />

					<?php else: ?>

                        <a href="<?php echo e(url('restaurant/'.$data->slug).'?deal='.$deal->id); ?>" title="<?php echo e($data->name); ?>" data-url="">
                            <img src="<?php echo e(url('images/placeholdimagerest.png')); ?>" alt="<?php echo e($data->name); ?>" class="thumbnails"  />
                        </a>
						<?php endif; ?>
                    <?php endif; ?>*/ ?>


						<?php if($deal->image != null  &&  file_exists(public_path('images/deals/'  . $deal->image))): ?>
							<a href="<?php echo e(url('restaurant/'.$data->slug).'?deal='.$deal->id); ?>"
							   title="<?php echo e($data->name); ?>" data-url="" style="position: relative;">
								<img src="<?php echo e(url('images/deals/' . $deal->image)); ?>" alt="<?php echo e($data->name); ?>" class="thumbnails" />

							</a>
						<?php else: ?>
							<a href="<?php echo e(url('restaurant/'.$data->slug).'?deal='.$deal->id); ?>"
							   title="<?php echo e($data->name); ?>" data-url="" style="position: relative;">
								<img src="<?php echo e(url('images/placeholdimagerest.png')); ?>" alt="<?php echo e($data->name); ?>"
									 class="thumbnails"/>
							</a>
					<?php endif; ?>
					<?php endif; ?>





                    <?php echo $discountHelper->replaceKeys(
                            $data,
                            $data->days,
                            (isset($contentBlock[44]) ? $contentBlock[44] : ''),
                            'ui green label'
                        ); ?>


					 <!--  After change template, it was on mobile section
						<?php if(isset($onFavoritePage)): ?>
                            <a href="<?php echo e(url('account/favorite/companies/remove/'.$data->id.'/'.$data->slug)); ?>">
                                <span><i class="save red icon"></i> Verwijder van favorieten</span>
                            </a>
                        <?php else: ?>
                            <?php if($userAuth == TRUE): ?>
                                <a href="<?php echo e(url('account/favorite/companies/add/'.$data->id.'/'.$data->slug)); ?>">
                                    <span><i class="save icon"></i> Bewaren</span>
                                </a>
                            <?php else: ?>
                                <a class="login button"
                                   href="<?php echo e(url('account/favorite/companies/add/'.$data->id.'/'.$data->slug)); ?>"
                                   data-type-redirect="1"
                                   data-type="login"
                                   data-redirect="<?php echo e(url('account/favorite/companies/add/'.$data->id.'/'.$data->slug)); ?>">
                                    <span><i class="save icon"></i> Bewaren</span>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?> -->
             </div>

            <div class="text3" style="min-height: 310px;">
                <strong>
                    <?php if($count_persons >= $deal->total_amount): ?>
                        <?php echo e($deal->name); ?>

                    <?php else: ?>
                        <a href="<?php echo e(url('restaurant/'.$data->slug).'?deal='.$deal->id); ?>" title="<?php echo e($data->name); ?>"><?php echo e($deal->name); ?></a>

                    <?php endif; ?>
				</strong>
                <?php /*<span> Van: <strike><?php echo e($data->price_from); ?></strike> | Voor: <?php echo e($data->price); ?></span>*/ ?>

			    <span class="city">
					<a href="<?php echo e(url('search?q='.$data->city)); ?>"><?php echo e($data->name); ?> | <span>
					   <i class="marker icon"></i> <?php echo e($data->city); ?>&nbsp;</span>
					</a>
				</span>

				<span class="stars"><img src="<?php echo e(asset('images/stars.png')); ?>" alt="stars">5.00</span>

				<?php
				if( $data->kitchens != 'null' && $data->kitchens != NULL && $data->kitchens != '[""]')
				{
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
						<a class="save button" href="<?php echo e(url('account/favorite/companies/add/'.$data->id.'/'.$data->slug)); ?>">
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

              <p class="hidden-xs"><?php echo $deal->description; ?></p>
              <?php if($count_persons < $deal->total_amount): ?>
			  <div class="wr">
			  <?php
             	  $returnval = $companyReservation->getTimeCarouselHTML(
                        isset($reservationDate) ? $reservationDate : NULL,
                        $data,
                        Request::input('persons', 2),
                        $reservationTimesArray,
                        $tomorrowArray,
                        Request::input('date'),
                        Request::input('deal', $deal->id)
                    )
                    ?>
                    <?php echo $returnval; ?>

			  </div>
			   <?php endif; ?>
			    <?php
                    $getRec        = HomeController::getPersons($deal->id);
                    $count_persons = $getRec[0]->total_persons;
                ?>

			   <?php if($deal->price_from >= 1): ?>
			   <span class="price">
			     &euro; <?php echo e($deal->price_from); ?>

			   </span>
			    <?php else: ?>
			    <span class="price price_min_box">

			    </span>
			    <?php endif; ?>


			  <span class="price2">
			     &euro; <?php echo e($deal->price); ?>

			  </span>
				<?php if($count_persons >= $deal->total_amount): ?>
					<a class="more"  href="javascript:void(0)">Uitverkocht</a>
				<?php else: ?>
					<?php if($returnval != '<div class="ui tiny text-danger"> <i class="clock icon"></i> Helaas, er zijn momenteel geen plaatsen beschikbaar.</div>'): ?>
						<div class="d-inline-block">
							<a class="more"  href="<?php echo e(url('restaurant/'.$data->slug).'?deal='.$deal->id); ?>">MEER INFO</a>&nbsp;
							<a class="more"  href="<?php echo e(url('future-deal/'.$data->slug).'?deal='.$deal->id); ?>">KOOP DEAL</a>
						</div>
					<?php endif; ?>
				<?php endif; ?>

           </div>

	  </li>
    <?php endforeach; ?>
<?php endforeach; ?>
  </ul>
