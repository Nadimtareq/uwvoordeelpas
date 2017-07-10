<?php /**/ $pageTitle = 'Nieuws' /**/ ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="ui breadcrumb">
		<a href="<?php echo e(url('/')); ?>" class="section">Home</a>
		<i class="right chevron icon divider"></i>
		<div class="active section"><h1>Nieuws</h1></div>
	</div>

	<div class="ui divider"></div> 

	<?php if($news->count() >= 1): ?>
		<div id="news">
			<?php foreach($news as $article): ?>
				<div class="item">
		    		<?php $media = $article->getMedia(); ?>
					<div class="image">
					    <?php if($media != '[]'): ?>
		                    <img src="<?php echo e(url('public'.$media->last()->getUrl('175Thumbstretch'))); ?>" />
		                <?php elseif(isset($companyImage[$article->company_id])): ?>
		                	<img class="ui small image" src="<?php echo e(url('public/'.$companyImage[$article->company_id])); ?>" />
		                <?php else: ?>
                			<img src="<?php echo e(url('public/images/placeholdimage.png')); ?>" />
		                <?php endif; ?>
					</div>
					
					<div class="item-content">
					   	<a href="<?php echo e(url('news/'. $article->slug)); ?>" class="header"><h3><?php echo e($article->title); ?></h3></a>
			           	<div class="description">Geplaatst op <?php echo e(date('d-m-Y H:i:s', strtotime($article->created_at))); ?></div><br />
			              
					  	<p><?php echo e(implode(' ', array_slice(explode(' ', strip_tags($article->content)), 0, 100))); ?>...</p>
					  	<a href="<?php echo e(url('news/'. $article->slug)); ?>">Lees meer</a><br><br>
					</div>
	   			</div>
		   	<?php endforeach; ?>
   		</div>
   		<?php echo $news->appends($paginationQueryString)->render(); ?>


   		<div style="clear: both"></div>
   	<?php else: ?>
   		Er zijn geen nieuwsberichten gevonden.
   	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>