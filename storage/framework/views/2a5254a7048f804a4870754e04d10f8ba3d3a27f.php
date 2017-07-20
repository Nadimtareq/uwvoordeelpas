<?php /**/ $pageTitle = 'Zoeken' /**/ ?>

<?php $__env->startSection('content'); ?>
<script type="javascript">
    var searchPage = 1;
</script>

<div class="side_menus">
    <?php echo Form::open(array('url' => 'preferences', 'method' => 'post', 'class' => 'ui form')); ?>

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
								(Request::has('kitchen') ? Request::get('kitchen') : ''),
								array('class' => 'multipleSelect', 'data-placeholder' => 'Keuken', 'multiple' => 'multiple'))); ?>

				</div>
				<div class="jsearch col-md-2 col-sm-2 col-xs-6">
				<?php echo e(Form::select('price[]',
                                        (isset($preference[4]) ? $preference[4] : array()),
                                        (Request::has('price') ? Request::get('price') : ''),
                                        array('class' => 'multipleSelect', 'data-placeholder' => 'Soort', 'multiple' => 'multiple'))); ?>

				</div>
				<!--<div class="jsearch col-md-2 col-sm-2 col-xs-6">
				 <?php echo e(Form::select('discount[]',
                                        (isset($preference[5]) ? $preference[5] : array()),
                                        (Request::has('discount') ? Request::get('discount') : ''),
                                        array('class' => 'multipleSelect', 'data-placeholder' => 'Korting', 'multiple' => 'multiple'))); ?>


				</div>-->
				<div class="jsearch col-md-2 col-sm-2 col-xs-6">
				<?php echo e(Form::select('allergies[]',
                                                (isset($preference[3]) ? $preference[3] : array()),
                                                (Request::has('allergies') ? Request::get('allergies') : ''),
                                                array('class' => 'multipleSelect', 'data-placeholder' => 'Allergieen',  'multiple' => 'multiple'))); ?>

				</div>
				<div class="jsearch col-md-2 col-sm-2 col-xs-12">
				  <input type="submit" class="ui bluelink fluid filter button" value="Filteren" />
				</div>
			</div>

		</div>
		 <?php echo Form::close() ?>
</div>
<!--
<section id="prices">
		<div class="container">
			<div class="col-sm-12 col-ms1">
				<div class="col-sm-3 col5">
					<ul>
						<li>
							<div class="ob"><img src="images/g1.jpg" alt="g1"><i>50%</i></div>
							<div class="text3">
								<strong>3 gangen keuzemenu met vlees / vis</strong>
								<span class="city"><i class="material-icons">place</i>New York, USA</span>
								<span class="stars"><img src="images/stars.png" alt="stars">5.00</span>
								<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
								<div class="wr">
									<b>Vandaag beschikbar voor 2 personen</b>
									<div class="calendar">
										<a href="#" class="prev"><img src="images/prev2.png" alt="prev2"></a>
										<ul>
											<li><a href="#">18:00</a></li>
											<li><a href="#">18:15</a></li>
											<li><a href="#">18:30</a></li>
											<li><a href="#">18:45</a></li>
											<li><a href="#">19:00</a></li>
										</ul>
										<a href="#" class="next"><img src="images/next2.png" alt="next2"></a>
									</div>
								</div>
								<span class="price">€ 12.95</span>
								<span class="price2">€ 12.95</span>
								<a href="#" class="more">Reserveer nu</a>
							</div>
						</li>

					</ul>
					<div class="pages">
						<a href="#" class="prev2">&lt;</a>
						<ul>
							<li><a href="#">1</a></li>
							<li><a href="#" class="active">2</a></li>
							<li><a href="#">...</a></li>
							<li><a href="#">8</a></li>
						</ul>
						<a href="#" class="next2">&gt;</a>
					</div>
				</div>
			</div>
		</div>
</section>
-->

<section  id="prices" >
  <div class="container">
    <div class="col-sm-12 col-ms1">
        <div class="col-sm-3 col5">
            <?php if(count($companies) >= 1): ?>
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

<?php echo $__env->make('template.theme', ['search_header' => 'true'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>