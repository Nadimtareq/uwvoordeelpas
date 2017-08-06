<!DOCTYPE html>
<html>
<head>
	<title>Uwvoordeelpas</title>

    <link rel="stylesheet" href="<?php echo e(asset('public/css/app.css?rand='.str_random(40))); ?>">

    <style type="text/css">
    	body { background: rgba(0, 0, 0, 0)!important; }
    </style>
</head>
<body>
	<div class="ui icon warning message">
	  	<i class="warning icon"></i>

	  	<div class="content">
	    	<div class="header">
	      	Opgelet
	    	</div>
	    	<p>Deze widget is op dit moment inactief, omdat u uw agenda nog niet heeft ingesteld. <a href="<?php echo e(url('admin/reservations/update/'.$id)); ?>" target="_blank">Klik hier om het in te stellen</a></p>
	  	</div>
	</div>
</body>
</html>