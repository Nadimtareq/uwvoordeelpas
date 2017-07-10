<?php $affiliateHelper = app('App\Helpers\AffiliateHelper'); ?>



<?php if(Request::has('category') OR Request::has('subcategory') OR Request::segment(2) == 'category'): ?>

<script type="text/javascript">

    var activateAjax = 'searchCashback';

</script>

<?php endif; ?>



<?php /**/ $pageTitle = 'Tegoed sparen' /**/ ?>





<div class="form">

    <div class="container container2">

        <form action="<?php echo url('tegoed-sparen/search'); ?>" method="GET" id="affiliateSearch-2" class="ui search">

            <!--<div id="affiliateSearch-2" class="ui search">-->

                <label for="search">

                    <input type="text" name="q" class="prompt" placeholder="Zoek webshop" />

                </label>

                <div class="results"></div>

            <!--</div>-->

            <span class="of">OF</span>

            <select name='category' class='category'>

                <option value='0' disabled="disabled" selected>Category</option>

                <?php foreach($categories as $category): ?>

                <?php if($category['countCategoryPrograms'] > 0): ?>

                <option value="<?php echo e($category['slug']); ?>"><?php echo e($category['name']); ?></option>

                <?php endif; ?>

                <?php endforeach; ?>

            </select>

            <select name='subcategory' class='subcategory'>

                <option value='0' disabled="disabled" selected>Subcategory</option>

            </select>

            <input type="submit" value='ZOEK' />

        </form>

    </div>

</div>

<script src="<?php echo e(asset('js/jquery-1.11.3.min.js')); ?> "></script>



<?php if(isset($mediaItems)): ?>

<?php foreach($mediaItems as $id => $ad): ?>

<div class="leaderboard">

    <a href="<?php echo e($page ? url($page->slug) : ''); ?>">

        <img src="<?php echo e(url(''.$ad->getUrl())); ?>" class="ui image">

    </a>

</div>

<?php endforeach; ?>

<?php endif; ?>



<div class="goods">

    <div class="container">

        <div class="left-sidebar">

            <?php foreach($categories as $i => $category): ?>

            <?php if($category['countCategoryPrograms'] > 0): ?>

            <section class="ac-container">

                <div>

                    <?php if(count($category['subcategories']) > 1 ): ?>

                    <input id="ac-<?php echo e($i); ?>" name="accordion-1" type="checkbox" />

                    <label for="ac-<?php echo e($i); ?>"><?php echo e($category['name']); ?></label>

                    <?php else: ?>



                    <a href="<?php echo e(url('tegoed-sparen/category/'.$category['id'].'/'.$category['slug'])); ?>" class="firstitem">

                        <?php echo e($category['name']); ?>


                    </a>

                    <?php endif; ?>



                    <article class="ac-small">

                        <?php foreach($category['subcategories'] as $subcategory): ?>

                        <?php if($subcategory['name'] != NULL && $subcategory['countSubCategoryPrograms'] >= 1): ?>

                        <a href="<?php echo e(url('tegoed-sparen/category/'.$subcategory['id'].'/'.$subcategory['slug'])); ?>" class="<?php echo e(($subcategory['id'] == Request::segment(3) ? 'active' : '')); ?> subitem">

                            <?php echo e($subcategory['name']); ?>


                        </a>

                        <?php endif; ?>

                        <?php endforeach; ?>

                    </article>

                </div>

            </section>

            <?php endif; ?>

            <?php endforeach; ?>

        </div>



        <div class="right-content">

            <div class="sort">
            &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- 
                <span class='ls'>Sort by:</span>

                <select>

                    <option value='0' disabled="disabled" selected>Max. spaartegoed</option>

                    <option>1</option>

                    <option>2</option>

                    <option>3</option>

                    <option>4</option>

                </select>
                -->

                <div class="r">

                    <span class='rs'>View</span>

                    <a href="#s1"><img src="<?php echo e(asset('images/one.png')); ?>" alt="one" /></a>

                    <a href="#s2"><img src="<?php echo e(asset('images/two.png')); ?>" alt="two" /></a>

                </div>

            </div>

            <div class="tabs-content">

                <ul class='lines' id='s2'>

                    <?php foreach($affiliates as $data): ?>

                    <li>

                        <span class="wrap"><img src="<?php echo e(asset('images/affiliates/'.$data['affiliate_network'].'/'.$data['program_id'].'.'.$data['image_extension'])); ?>" alt="<?php echo e($data['name']); ?>" /></span>

                        <div class="t"><i><?php echo e($data['name']); ?><strong><?php echo e($data['commissions']); ?></strong></i>

                        </div>

                        <a href="<?php echo e(url('tegoed-sparen/company/'.$data['slug'])); ?>"><?php echo e($data['name']); ?></a>

                    </li>

                    <?php endforeach; ?>

                </ul>

                <ul class='box' id='s1'>

                    <?php foreach($affiliates as $data): ?>

                    <li><a href="<?php echo e(url('tegoed-sparen/company/'.$data['slug'])); ?>"><span class="wrap"><img src="<?php echo e(asset('images/affiliates/'.$data['affiliate_network'].'/'.$data['program_id'].'.'.$data['image_extension'])); ?>" alt="<?php echo e($data['name']); ?>" /><b><?php echo e($data['name']); ?></b></span>

                            <p><?php echo e($data['name']); ?><strong><?php echo e($data['commissions']); ?></strong></p></a>

                    </li>

                    <?php endforeach; ?>

                </ul>

            </div>

            <div class="pages">

                <?php echo $affiliates->appends($paginationQueryString)->render(); ?>


            </div>

        </div>

    </div>

</div>



<script>

    $(document).ready(function() {



        $(".category").on('change', function(e) {

            slug=$("select.category option").filter(":selected").val();

            $.ajax({

                url: "tegoed-sparen/get-sub-cat/"+slug,

                type: 'GET',

                dataType: 'json', // added data type

                success: function(res) {

                    console.log(res['subcat'][0].name);

                    $('.subcategory option').remove();

                    $('.subcategory').append($('<option>').text('Subcategory').attr('value', 0));

                    $.each(res['subcat'], function(index, value) {

                        $('.subcategory').append($('<option>').text(value.slug).attr('value', value.name));

                    });

                }

            });

        });



    });

</script>