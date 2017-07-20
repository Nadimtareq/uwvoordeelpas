<?php
$st = \Carbon\Carbon::create(date('Y'), 1, 1, 0, 0, 0);
$dt = \Carbon\Carbon::create(date('Y') + 1, 12, 1, 0, 0, 0);
$dates = array();

while ($st->lte($dt)) {
    $dates[] = $st->copy()->format('Y-m');
    $st->addMonth();
}
?>


<?php $FileHelper = app('App\Helpers\FileHelper'); ?>


<?php $__env->startSection('slider'); ?>
<!-- Hide Slider from main -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="ui breadcrumb">
        <a href="<?php echo e(url('/')); ?>" class="section">Home</a>
        <i class="right chevron icon divider"></i>

        <a href="#" class="sidebar open">Menu</a>
        <i class="right chevron icon divider"></i>

        <div class="active section">Restaurants</div>
    </div></div>
<?php $discountHelper = app('App\Helpers\DiscountHelper'); ?>
<div class="tabss">
    <div class="container">
        <div class="main_gallery">
            <div class="left_side">
                <div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;">
                    <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 314px;">
                        <div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;">
                            <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 314px;">
                                <ul id="bxslider" style="width: 615%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                    <?php if($media != '[]'): ?>

                                    <?php foreach($media as $mediaItem): ?>
                                    <?php if(file_exists(public_path($mediaItem->disk. DIRECTORY_SEPARATOR . $mediaItem->id . DIRECTORY_SEPARATOR . $mediaItem->file_name))): ?>
                                    <li style="float: left; list-style: outside none none; position: relative; width: 674px;">
                                        <a href="<?php echo e(url($mediaItem->getUrl())); ?>" data-lightbox="roadtrip">
                                            <img class="ui image materialboxed rushy intialized" src="<?php echo e(url($mediaItem->getUrl())); ?>">
                                        </a>
                                        <?php else: ?>
                                    <li style="float: left; list-style: outside none none; position: relative; width: 674px;">
                                        <img src="<?php echo e(asset('images/s.jpg')); ?>" alt="s" class="materialboxed">
                                        <?php endif; ?>


                                        <?php echo $discountHelper->replaceKeys(
                                        $company,
                                        $company->days,
                                        (isset($contentBlock[44]) ? $contentBlock[44] : ''),
                                        'ribbon-wrapper thumb-discount-label'
                                        ); ?>

                                    </li>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <li style="float: left; list-style: outside none none; position: relative; width: 674px;">
                                        <img src="<?php echo e(asset('images/s1.jpg')); ?>" alt="s">
                                    </li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <div class="bx-controls bx-has-controls-direction">
                                <div class="bx-controls-direction">
                                    <a class="bx-prev disabled" href=""></a>
                                    <a class="bx-next" href=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bx-controls bx-has-controls-direction">
                        <div class="bx-controls-direction">
                            <a class="bx-prev disabled" href=""></a>
                            <a class="bx-next" href=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- The thumbnails -->
            <div class="r_side hidden-xs">
                <div class="bx-wrapper" style="max-width: 205px; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 323px;">
                        <ul id="bxslider-pager" style="width: auto; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                            <?php if($media != '[]'): ?>
                            <?php foreach($media as $key=> $mediaItem): ?>
                            <?php if(file_exists(public_path($mediaItem->disk. DIRECTORY_SEPARATOR . $mediaItem->id . DIRECTORY_SEPARATOR . $mediaItem->file_name))): ?>
                            <li data-slideindex="<?php echo e($key); ?>" data-slide-index="<?php echo e($key); ?>" style="float: none; list-style: outside none none; position: relative; width: 187px; margin-bottom: 3px;">
                                <a href="#">
                                    <img src="<?php echo e(url($mediaItem->getUrl())); ?>" alt="Alt">
                                </a>
                            </li>
                            <?php else: ?>
                            <li data-slideindex="<?php echo e($key); ?>" style="width: 140px;height:78px"><a href="#"><img src="<?php echo e(asset('images/s.png')); ?> " alt="Alternate"></a></li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <li data-slideindex="0" style="width: 140px;height:78px"><a href="#"><img src="<?php echo e(asset('images/s.png')); ?> " alt="Alt"></a></li>
                            <?php endif; ?>
                        </ul>
                    </div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev disabled" href=""><span></span></a><a class="bx-next disabled" href=""><span></span></a></div></div></div>
            </div>

            <div class="right_details calendar-ajax">
                <?php echo Form::open(['url' => 'restaurant/'.$company->slug, 'id' => 'reservationForm', 'class' => 'ui form']); ?>

                <?php echo e(Form::hidden('date_hidden')); ?>

                <?php echo e(Form::hidden('date', date('Y-m-d'))); ?>

                <?php echo e(Form::hidden('company_id', $company->id)); ?>

                <?php echo e(Form::hidden('year', date('Y'))); ?>

                <?php echo e(Form::hidden('month', date('m'))); ?>

                <?php echo e(Form::hidden('monthDate', date('m-Y'))); ?>

                <?php echo e(Form::hidden('reservation_url', URL::to('restaurant/reservation/'.$company->slug))); ?>

                <input type="hidden" name="deal" value="<?php echo e((@app('request')->input('deal'))?app('request')->input('deal'):''); ?>">



                                                        <!-- <div id="datepicker" class="right_calendar hasDatepicker"><div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">April</span>&nbsp;<span class="ui-datepicker-year">2017</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th class="ui-datepicker-week-end"><span title="Sunday">Su</span></th><th><span title="Monday">Mo</span></th><th><span title="Tuesday">Tu</span></th><th><span title="Wednesday">We</span></th><th><span title="Thursday">Th</span></th><th><span title="Friday">Fr</span></th><th class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">1</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">2</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">3</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">4</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">5</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">6</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">7</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">8</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">9</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">10</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">11</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">12</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">13</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">14</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">15</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">16</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">17</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">18</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">19</a></td><td class="  ui-datepicker-current-day" data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default ui-state-active" href="#">20</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">21</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">22</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">23</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">24</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">25</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">26</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">27</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">28</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="#">29</a></td></tr><tr><td class=" ui-datepicker-week-end  ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default ui-state-highlight" href="#">30</a></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td></tr></tbody></table></div></div>-->
                <div id="datepicker-calendar" class="right_calendar datepicker-calendar" data-lock=".calendar-ajax" data-datepicker-ajax="true" data-timeselect="#time-calendar" data-persons="#persons-calendar" ></div>

                <ul>
                    <li><img src="<?php echo e(asset('images/c1.png')); ?>" alt="m3">
                        <input type="hidden" name="ctime" value="<?php echo e(count(array_keys($reservationTimesArray)) >= 1 ? array_keys($reservationTimesArray)[0] : ''); ?>">
                        <select id="time-calendar" name="time" class="quantity2" >
                        </select>
                    </li>
                    <li><img src="<?php echo e(asset('images/c2.png')); ?>" alt="m4">
                        <input type="hidden" name="cpersons" value="<?php echo e(($userAuth && $userInfo->kids != 'null' && $userInfo->kids != NULL && $userInfo->kids != '[""]' ? $userInfo->kids : 1)); ?>">
                        <select id="persons-calendar"  name="persons" class="quantity2" >
                            <option value="0">Personen</option>
                            <?php $person_list = []; ?>
                            <?php
                            for ($i = 1; $i <= 10; $i++) {
                                if ($i == 2) {
                                    ?>
                                    <option value="<?php echo e($i); ?>" data-value="<?php echo e($i); ?>" selected="true"><?php echo e($i); ?> <?php echo e($i == 1 ? 'persoon' : 'personen'); ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo e($i); ?>" data-value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e($i == 1 ? 'persoon' : 'personen'); ?></option>
                                <?php } ?>
                                <?php $person_list[$i] = $i . " " . (($i == 1) ? 'persoon' : 'personen'); ?>
<?php } ?>
                        </select>
                    </li>
                </ul>

                <?php if($user): ?>
                <button  id="submitField"  class="more">Reserveer nu</button>
                <?php else: ?>
                <button id="submitField"  class="more login guestClick">Reserveer nu</button>
                <?php endif; ?>
                <?php echo Form::close(); ?>

            </div>
        </div>

        <div class="tabs-all">
            <ul class="tabs-link">
                <li><a href="#t1" class="">Over ons</a></li>
                <li><a href="#t2" class="active">Menu</a></li>
                <li><a href="#t3" class="">Details</a></li>
                <li><a href="#t4" class="">Contact</a></li>
                <li><a href="#t5" class="">Nieuws</a></li>
                <li><a href="#t6" class="">Groepen</a></li>
                <li><a href="#t7" class="">Reviews</a></li>
            </ul>
            <div class="tabs-content">

                <div id="t1" style="display: block;">
                    <div class="text3">
                        <strong><?php echo $company->name; ?></strong>
                        <span class="city"><i class="material-icons">place</i><?php echo e($company->city); ?></span>
                        <!-- <span class="stars"><img src="images/stars2.png" alt="stars2">4.50</span> -->
                        <p>	<?php echo $company->about_us; ?></p>
                    </div>
                </div>

                <div id="t2" style="display: none;">

                    <?php if(isset($deals) && count($deals)): ?>
                    <?php foreach($deals as $deal): ?>
                    <!-- Menu -->
                    <div class="menu deals-list-page">
                        <div class="left_m">
                            <h2><?php echo e($deal->name); ?></h2>
                            <?php if($deal->image!=''): ?>
                            <a   href="<?php echo e(url('future-deal/'.$company->slug).'?deal='.$deal->id); ?>"> <img src="<?php echo e(asset('images/deals/'.$deal->image)); ?>" alt="No Image Found" width="400px"></a>

                            <?php else: ?>
                            <a   href="<?php echo e(url('future-deal/'.$company->slug).'?deal='.$deal->id); ?>"> 										<img src="<?php echo e(asset('images/deals/no-img.jpg')); ?>" alt="No Image Found" width="400px">
                            </a>

                            <?php endif; ?>
                            <?php /*                            <ul class="price">
                            <li><span>Verkocht<i>  &euro; <?php echo e($deal->price_from); ?>  </i></span></li>
										<li><span>Korting<i>50%</i></span></li>
                                            </ul>*/ ?>
                                            </div>
                                            <div class="right_m">
                                                <span>&euro; <?php echo e($deal->price_from); ?><strong>&euro; <?php echo e($deal->price); ?></strong></span>
                                                <b class="up"><?php echo strip_tags( $deal->description ); ?></b>
                                            </div>

                                            <?php /*<?php echo e( ); ?>*/ ?>
                                            <?php if(!is_null($deal->getApprovedReviews)): ?>
                                                <?php
                                                $count = 1;
                                                $total = 0;
                                                ?>
                                                <?php foreach($deal->getApprovedReviews as $review): ?>
                                                <?php
                                                    $avg = floor(($review->food + $review->service + $review->decor)/3);
                                                    $total += $avg;
                                                ?>
                                                <div style="float: left;">
                                                    <div class="score">
                                                        Recencies:
                                                        <div class="ui star tiny rating no-rating disabled" data-rating="<?php echo e($total/$count); ?>">
                                                            <i class="icon-star active"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <?php $count++; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <?php if(count($deals)==1): ?>
                                            <div id="koop">
                                                <a class="more"  href="<?php echo e(url('future-deal/'.$company->slug).'?deal='.$deal->id); ?>">KOOP DEAL</a>
                                            <?php else: ?>
                                            <a class="more"  href="<?php echo e(url('future-deal/'.$company->slug).'?deal='.$deal->id); ?>">KOOP DEAL</a>
                                            <?php endif; ?>

                                            </div>

                                            <!-- Pagination -->
                                            <!-- <div class="pages">
                                                    <a href="#" class="prev2">&lt;</a>
                                                    <ul>
                                                            <li><a href="#">1</a></li>
                                                            <li><a href="#" class="active">2</a></li>
                                                            <li><a href="#">...</a></li>
                                                            <li><a href="#">8</a></li>
                                                    </ul>
                                                    <a href="#" class="next2">&gt;</a> -->
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                            </div>



                                            <div id="t3" style="display: none;">
                                                <div class="info">

                                                    <?php if($company->preferences != NULL && $company->preferences != NULL && $company->preferences != '[""]'): ?>
                                                    <span>Voorkeuren</span>
                                                    <strong>
                                                        <?php foreach(json_decode($company->preferences) as $id => $preferencesr): ?>
                                                        <?php if(isset($preferences[1][$preferencesr])): ?>
                                                        <?php echo e(ucfirst($preferences[1][$preferencesr])); ?>,
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </strong>
                                                    <?php endif; ?>

                                                    <?php if($company->kitchens != NULL && $company->kitchens != NULL && $company->kitchens != '[""]'): ?>
                                                    <span>Keuken</span>
                                                    <strong>
                                                        <?php foreach(json_decode($company->kitchens) as $id => $kitchen): ?>
                                                        <?php echo e(ucfirst($preferences[2][$kitchen])); ?>,
                                                        <?php endforeach; ?>
                                                    </strong>
                                                    <?php endif; ?>

                                                    <?php if($company->price != NULL && $company->price != NULL && $company->price != '[""]'): ?>
                                                    <span>Soort</span>
                                                    <strong>
                                                        <?php foreach(json_decode($company->price) as $id => $price): ?>
                                                        <?php echo e(ucfirst($preferences[4][$price])); ?>,
                                                        <?php endforeach; ?>
                                                    </strong>
                                                    <?php endif; ?>

                                                    <?php if($company->sustainability != NULL && $company->sustainability != NULL && $company->sustainability != '[""]'): ?>
                                                    <span>Duurzaamheid</span>
                                                    <strong>
                                                        <?php foreach(json_decode($company->sustainability) as $id => $sustainability): ?>
                                                        <?php echo e(ucfirst($preferences[8][$sustainability])); ?>,
                                                        <?php endforeach; ?>
                                                    </strong>
                                                    <?php endif; ?>
                                                    <?php $discount = json_decode($company->discount);
                                                    foreach($discount as $key=>$value)
                                                    {
                                                        if(is_null($value) || $value == 'NULL')
                                                            unset($discount[$key]);
                                                    }?>
                                                    <?php if(!empty($discount)): ?>
                                                    <span>Korting</span>
                                                    <strong>
                                                        <?php echo e($company->discount_comment); ?>

                                                        <?php foreach(json_decode($company->discount) as $id => $discount): ?>
                                                        <?php echo e($discount); ?>

                                                        <!-- 	<?php if(isset($preferences[5][$discount])): ?>
                                                        <?php echo e(ucfirst($preferences[5][$discount])); ?>%
                                                        <?php endif; ?> -->
                                                        <?php endforeach; ?>
                                                    </strong>

                                                    <span>Kortingsdagen</span>
                                                    <strong>
                                                        <?php $dayNames = Config::get('preferences.days'); ?>
                                                        <?php if($company->days != 'null' && $company->days != NULL && $company->days != '[""]'): ?>
                                                        <?php $i = 0; ?>
                                                        <?php foreach(json_decode($company->days) as $id => $days): ?>
                                                        <?php $i++; ?>
                                                        <?php echo e($dayNames[$days]); ?>

<?php echo ($i < count(json_decode($company->days)) ? '-' : ''); ?>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </strong>
                                                    <?php endif; ?>

                                                </div>
                                                <a href="#" class="more">Een Tafel Reserveren</a>
                                            </div>


                                            <div id="t4" style="display: none;">
                                                <div class="map">
                                                    <h3><?php echo $company->zipcode; ?>  <?php echo $company->city; ?></h3>
                                                    <span><?php echo $company->address; ?><br /></span>
                                                    <span><a href="tel:<?php echo $company->phone; ?>" target="_blank"><?php echo $company->phone; ?> </a>
                                                        <?php if($company->website): ?>
                                                        <a href="http://<?php echo $company->website; ?>" target="_blank"><?php echo " | ".$company->website; ?> </a>
                                                        <?php endif; ?>
                                                    </span>

                                                    <?php if(trim($company->contact_email) != '' || trim($company->email) != ''): ?>
                                                    <div class="send">
                                                        <?php echo e(Form::open(array('url' => 'contact/'.$company->slug, 'method' => 'post', 'class' => 'form'))); ?>

                                                        <label for="name">
                                                            <span>Naam</span>
                                                            <?php echo e(Form::text('name', (Sentinel::check() ? Sentinel::getUser()->name : ''), [ 'id' => 'name'])); ?>

                                                        </label>


                                                        <label for="email">
                                                            <span>E-mail</span>
                                                            <?php echo e(Form::text('email',  (Sentinel::check() ? Sentinel::getUser()->email : ''), ['id' =>'email'])); ?>

                                                        </label>

                                                        <label for="subject">
                                                            <span>Onderwerp</span>
                                                            <?php echo e(Form::text('subject',null,['id' => 'subject' ])); ?>

                                                        </label>

                                                        <label for="content">
                                                            <span>Bericht</span>
                                                            <?php echo e(Form::textarea('content',null, ['id' => 'content'])); ?>

                                                        </label>

                                                        <label class="two fields">
                                                            <!-- <div class="six wide field"> -->
                                                            <?php echo captcha_image_html('ContactCaptcha'); ?>

                                                            <!-- </div> -->

                                                            <label>
                                                                <span>Typ de beveiligingscode over:</span>
                                                                <?php echo e(Form::text('CaptchaCode', '', array('id' => 'CaptchaCode', 'placeholder' => 'beveiligingscode' ))); ?>

                                                            </label>
                                                        </label>

                                                        <button type="submit" class="ui small blue button">VERZENDEN</button>
                                                        <?php echo e(Form::close()); ?>

                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="maps">
                                                        <div id="map"
                                                             data-kitchen="<?php echo e(is_array(json_decode($company->kitchens)) ? str_slug(json_decode($company->kitchens)[0]) : ''); ?>"
                                                             data-url="<?php echo e(url('restaurant/'.$company->slug)); ?>"
                                                             data-name="<?php echo e($company->name); ?>"
                                                             data-address="<?php echo e($company->address); ?>"
                                                             data-city="<?php echo e($company->city); ?>"
                                                             data-zipcode="<?php echo e($company->zipcode); ?>"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- News -->
                                            <div id="t5" style="display: none;">
                                                <?php if($news->count() >= 1): ?>
                                                <?php foreach($news as $article): ?>
                                                    <?php $newsMedia = $article->getMedia(); ?>
                                                <!-- News -->
                                                <div class="news">
                                                    <div class="ob">
                                                        <?php if($newsMedia != '[]'): ?>
                                                        <img class="ui small image" src="<?php echo e(url('public/'.$newsMedia->last()->getUrl())); ?>" />
                                                        <?php elseif($media != '[]'): ?>
                                                        <img class="ui small image" src="<?php echo e(url('public/'.$media->last()->getUrl())); ?>" />
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="in">
                                                        <h2><a href="<?php echo e(url('news/'. $article->slug)); ?>" class="header"><?php echo e($article->title); ?></a></h2>

                                                        <span>Geplaatst op <?php echo e(date('d-m-Y H:i:s', strtotime($article->created_at))); ?></span>
                                                        <p><?php echo e(implode(' ', array_slice(explode(' ', strip_tags($article->content)), 0, 100))); ?>... <a href="<?php echo e(url('news/'. $article->slug)); ?>">Read more</a></p>
                                                    </div>
                                                </div>
                                                <!-- Pages -->
                                                <?php echo $news->appends($paginationQueryString)->render(); ?>


                                                <!--<div class="pages">
                                                        <a href="#" class="prev2">&lt;</a>
                                                        <ul>
                                                <li><a href="#">1</a></li>
                                                                <li><a href="#" class="active">2</a></li>
                                                                <li><a href="#">...</a></li>
                                                                <li><a href="#">8</a></li>
                                                        </ul>
                                                        <a href="#" class="next2">&gt;</a>
                                                </div> -->
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <span>Er zijn geen nieuwsberichten gevonden.</span>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Send -->
                                            <div id="t6" style="display: none;">
                                                <div class="send">

                                                    <?php echo Form::open(array('id' => 'reservationForm', 'url' => 'restaurant/reservation/'.$company->slug, 'method' => 'PUT', 'class' => 'form')); ?>

                                                    <?php echo e(Form::hidden('group_reservation', 1)); ?>

                                                    <?php echo e(Form::hidden('setTimeBack', 0)); ?>

                                                    <?php echo Form::hidden('company_id', $company->id); ?>

                                                    <?php echo e(Form::hidden('date')); ?>


                                                    <?php echo isset($contentBlock[59]) ? $contentBlock[59] : ''; ?>



                                                    <label for="date">
                                                        <span>Datum</span>
                                                        <?php echo e(Form::text('date_input', '', array('data-datepicker-ajax' => 'true','data-timeselect' => '#time-dropdown', 'data-group' => '1', 'data-persons' => '#persons-dropdown','id' => 'datepicker-dropdown'))); ?>


                                                    </label>

                                                    <label for="time-dropdown">
                                                    <span>Tijm</span>
                                                    <div class="details">
                                                        <?php echo e(Form::select("time",[],Request::get('time'),[ 'class' => 'quantity2', 'id' => 'time-dropdown'])); ?>

                                                        <!-- <select id="time-dropdown" name="time" class="quantity2"></select>-->
                                                    </div>
                                                    </label>

                                                    <label for="persons">
                                                        <span>Personen</span>
                                                        <div class="details">
                                                            <?php echo e(Form::select("persons",$person_list,1,[ 'class' => 'quantity2', 'id' => 'persons-dropdown'])); ?>

                                                        </div>
                                                        <!-- Form::text('persons') -->
                                                    </label>

                                                    <label for="name">
                                                        <span>Naam</span>
                                                        <?php echo Form::text('name', (Sentinel::check() ? Sentinel::getUser()->name : '')); ?>

                                                    </label>

                                                    <label for="email">
                                                        <span>E-mail</span>
                                                        <?php echo Form::text('email',  (Sentinel::check() ? Sentinel::getUser()->email : '')); ?>

                                                    </label>

                                                    <label for="phone">
                                                        <span>Telefoon</span>
                                                        <?php echo Form::text('phone',  (Sentinel::check() ? Sentinel::getUser()->phone : '')); ?>

                                                    </label>


                                                    <label for="comment">
                                                    <span>Opmerking</span>
                                                    <?php echo Form::textarea('comment'); ?>

                                                    </label>

                                                    <button type="submit" class="ui small blue button">Reserveren</button>
                                                    <?php echo e(Form::close()); ?>


                                                </div>
                                            </div>

                                            <!-- Reviews -->
                                            <div id="t7" style="display: none;">
                                                <?php if(count($reviews) >= 1): ?>
                                                <?php foreach($reviews as $review): ?>
                                                <div class="reviews">
                                                    <div class="avatar">
                                                        <div class="wr"><img src="images/a1.png" alt="a"></div>
                                                        <span><?php echo e($review->name); ?></span>
                                                        <span><?php echo e($reviewModel->countReviews($review->user_id)); ?> <?php echo e($reviewModel->countReviews($review->user_id) == 1 ? 'recensie' : 'recensies'); ?></span>
                                                    </div>
                                                    <div class="rev">
                                                        <p><?php echo e($review->content); ?></p>
                                                        <div class="rr">
                                                            <span><?php echo e(date('d-m-Y', strtotime($review->created_at))); ?></span>
                                                            <i><?php echo e($reviewModel->getAverage(array($review->food,  $review->service, $review->decor))); ?></i>
                                                            <div class="score">
                                                                Eten <div class="ui star tiny orange rating no-rating" data-rating="<?php echo e($review->food); ?>"></div><br />
                                                                Service <div class="ui star tiny orange rating no-rating" data-rating="<?php echo e($review->service); ?>"></div><br />
                                                                decor <div class="ui star tiny orange rating no-rating" data-rating="<?php echo e($review->decor); ?>"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <label>
                                                    Er zijn nog geen recensies gegeven. Hier gegeten? Laat je recensie achter!
                                                </label>
                                                <?php endif; ?>
                                                <div class="send_review">
                                                    <?php if($user): ?>
                                                    <?php echo e(Form::open(array('url' => 'restaurant/reviews/'.$company->slug, 'method' => 'post','id' => 'reviews', 'class' => 'form'))); ?>



                                                    <?php echo e(Form::hidden('food', 1)); ?>

                                                    <?php echo e(Form::hidden('service', 1)); ?>

                                                    <?php echo e(Form::hidden('decor', 1)); ?>

                                                    <?php echo e(Form::hidden('dealId', !empty($_GET['deal']) ? $_GET['deal'] : '')); ?>

                                                    <input type="hidden"  id="csrf-token" value="<?php echo e(csrf_token()); ?>">

                                                    <div>
                                                        <h5>SCHRIJF EEN BEOORDELING</h5>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            Eten
                                                            <i id="food" class="ui star rating" data-rating="1"></i>
                                                        </div>
                                                        <div>
                                                            Service
                                                            <i id="service" class="ui star rating" data-rating="1"></i>
                                                        </div>
                                                        <div>
                                                            Decor
                                                            <i id="decor" class="ui star rating" data-rating="1"></i>
                                                        </div>
                                                    </div>

                                                    <label for="idcontent">
                                                        <span>Recensie</span>
                                                        <span id="msg"></span>
                                                        <?php echo e(Form::textarea('content',NULL,['id' => 'idcontent'])); ?>

                                                    </label>


                                                    <button type="button" onclick='checkWords();' class="ui small blue button" id="reviewsSubmit">VERZENDEN</button>

                                                    <?php echo e(Form::close()); ?>

                                                    <?php else: ?>
                                                    <p><strong>U moet eerst ingelogd zijn om te kunnen reageren.</strong></p>
                                                    <a href="<?php echo e(url('restaurant/'.$company->slug)); ?>"
                                                       data-redirect="<?php echo e(url('restaurant/'.$company->slug)); ?>"
                                                       data-type="login"
                                                       class="ui login button">
                                                        Inloggen
                                                    </a><br />
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <style>
                                                .more {
                                                    background: #333399 none repeat scroll 0 0;
                                                    border-radius: 5px;
                                                    box-shadow: 3px 4px 5px 0 rgba(0, 0, 0, 0.15);
                                                    color: #fff;
                                                    display: inline-block;
                                                    font: 18px "LatoRegular";
                                                    margin-top: 5px;
                                                    padding: 11px 31px;
                                                    position: relative;
                                                    text-align: center;
                                                    text-transform: uppercase;
                                                    top: -10px;
                                                }
                                                #msg{
                                                    color: red;
                                                }
                                            </style>

                                            <div class="clear"></div>
                                            <script>
                                                var activateAjax = 'restaurant';
                                    //		$('body').on('keydown','#idcontent',function(){
                                                function checkWords() {
                                                    var data = $('#reviews').serializeArray();
                                                    console.log(data);
                                                    var token = $('#csrf-token').val();

                                                    $.ajax({
                                                        type: 'post',
                                                        data: data,
                                                        url: "<?php echo e(url('restaurant/unwanted/getUnwantedWords')); ?>",
                                                        dataType: "json"
                                                    }).done(function (result) {
                                                        if (result.length > 0) {
                                                            $('#msg').html('Please Remove the unwanted words');
                                                            $(this).css('color', 'red');
                                                        } else {
                                                            console.log("abcd");
                                                            $('#reviews').submit();
                                                        }
                                                    }).fail(function () {

                                                    });

                                                }

                                            </script>

                                            <?php $__env->stopSection(); ?>

                                            <?php $__env->startSection('scripts'); ?>
                                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5751e9a264890504"></script>

                                            <?php $__env->stopSection(); ?>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>