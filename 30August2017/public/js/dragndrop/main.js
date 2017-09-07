$(function($){
	$("#lock").hide();
	$("#totalDrop").val(0);
	var $divField = $('#container-floor');
	var totalDrop = $("#totalDrop").val();
	
	$('.drag2')
		.drag("start",function( ev, dd ){ 

			dd.limit = $divField.offset();
			dd.limit.top = 230;
			//alert(dd.limit.toSource());
			dd.limit.bottom = dd.limit.top + $divField.outerHeight() - $( this ).outerHeight();
			dd.limit.right = dd.limit.left + $divField.outerWidth() - $( this ).outerWidth();
			
			//alert($( this ).outerHeight());
			//alert($divField.outerHeight());
			
			var status = $(this).attr('status');
	        var number = $(this).attr('number');
	        if(totalDrop >= 12){
				totalDrop--;
	        	$("#totalDrop").val(totalDrop);
	        	$("#drag"+number).attr('status','0');
	        	$("#back"+number).css("visibility","hidden");

				$( this ).animate({
					top: $("#back"+number).attr('top'),
					left: $("#back"+number).attr('left')
				}, 420 );

		 	} else {
				if(status == 0){
		        	totalDrop++;
		        	$("#totalDrop").val(totalDrop);
		        	$(this).attr('status','1');
		       		$("#back"+number).css("visibility","visible");
		       		
		       		if(totalDrop == 11){
		       			$("#lock").show();
		       		} 
		        }
		        if($("#back"+number).attr('top') == ""){
		        	$("#back"+number).attr('top',dd.originalY);
		        }
		        if($("#back"+number).attr('left') == ""){
		        	$("#back"+number).attr('left',dd.originalX);
		        }
		        
		 	}

		})
		.drag(function( ev, dd ){ //alert('drop');
			$( this ).css({
				top: Math.min( dd.limit.bottom, Math.max( dd.limit.top, dd.offsetY ) ),
				left: Math.min( dd.limit.right, Math.max( dd.limit.left, dd.offsetX ) )
			});   
					
			
			var status = $(this).attr('status');
	        var number = $(this).attr('number');
	        if(totalDrop >= 12){
				totalDrop--;
	        	$("#totalDrop").val(totalDrop);
	        	$("#drag"+number).attr('status','0');
	        	$("#back"+number).css("visibility","hidden");

				$( this ).animate({
					top: $("#back"+number).attr('top'),
					left: $("#back"+number).attr('left')
				}, 420 );

		 	} else {
				if(status == 0){
		        	totalDrop++;
		        	$("#totalDrop").val(totalDrop);
		        	$(this).attr('status','1');
		       		$("#back"+number).css("visibility","visible");
		       		
		       		if(totalDrop == 11){
		       			$("#lock").show();
		       		} 
		        }
		        if($("#back"+number).attr('top') == ""){
		        	$("#back"+number).attr('top',dd.originalY);
		        }
		        if($("#back"+number).attr('left') == ""){
		        	$("#back"+number).attr('left',dd.originalX);
		        }
		        
		 	}

		})
		.drop('start', function(ev, dd) {
	        
	        var status = $(this).attr('status');
	        var number = $(this).attr('number');
	        if(totalDrop >= 12){
				totalDrop--;
	        	$("#totalDrop").val(totalDrop);
	        	$("#drag"+number).attr('status','0');
	        	$("#back"+number).css("visibility","hidden");

				$( this ).animate({
					top: $("#back"+number).attr('top'),
					left: $("#back"+number).attr('left')
				}, 420 );
		 	} else {
				if(status == 0){
		        	totalDrop++;
		        	$("#totalDrop").val(totalDrop);
		        	$(this).attr('status','1');
		       	    $("#back"+number).css("visibility","visible");
		        }
		        if($("#back"+number).attr('top') == ""){
		        	$("#back"+number).attr('top',dd.originalY);
		        }
		        if($("#back"+number).attr('left') == ""){
		        	$("#back"+number).attr('left',dd.originalX);
		        }
		        
		 	}

	    })
		.drag("end",function( ev, dd ){ 
			var status = $(this).attr('status');
	        var reservation_id = $(this).attr('reservation_id');
	        var table_id = $(this).attr('table_id');
	        var company_id = $("#company_id").val();
	        var pos = $(this).offset(); 
			//alert(pos.toSource());
			var pos_top = parseInt(pos.top -60);
			var pos_left = pos.left;
			
			var json_object = {"pageX": ev.pageX, "pageY":ev.pageY, "screenY":ev.screenY, "screenX":ev.screenX, "clientY":ev.clientY, "clientX":ev.clientX, "table_id":table_id, "company_id":company_id, "reservation_id":reservation_id, "offsetX":pos_top, "offsetY":pos_left};
			$.ajax({
				    headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
				url: "../updatefloorplans/"+company_id,
					data: {"mydata": json_object},
					
					dataType: 'json',
					type: 'POST',
					success: function(json_object) {
						console.log(json_object);
						$("#saved").text("Data has been saved.");
					},
					error: function(json_object) {
						console.log(json_object);
						$("#saved").text("Failed to save data !");
					}
			});
			
			if(totalDrop >= 12){
				totalDrop--;
	        	$("#totalDrop").val(totalDrop);
	        	$("#drag"+number).attr('status','0');
	        	$("#back"+number).css("visibility","hidden");

				$( this ).animate({
					top: $("#back"+number).attr('top'),
					left: $("#back"+number).attr('left')
				}, 420 );

		 	} else {
				if(status == 0){
		        	totalDrop++;
		        	$("#totalDrop").val(totalDrop);
		        	$(this).attr('status','1');
		       		$("#back"+number).css("visibility","visible");
		       		
		       		if(totalDrop == 11){
		       			$("#lock").show();
		       		} 
		        }
		        if($("#back"+number).attr('top') == ""){
		        	$("#back"+number).attr('top',dd.originalY);
		        }
		        if($("#back"+number).attr('left') == ""){
		        	$("#back"+number).attr('left',dd.originalX);
		        }
		        
		 	}
		});
		

		$('.boxclose').click(function(){ //alert('arun');
		
			var number = $(this).attr('number');
			var json_object = {"table_no": number};
			
			$.ajax({
				url: "removedata.php",
				data: {"mydata": json_object},
				dataType: 'json',
				type: 'POST',
				success: function(json_object) {
						
				},
				error: function(json_object) {
						//console.log(json_object);
				}
			});
			
			
			var status = $("#drag"+number).attr('status');
	        if(status == 1){
	        	totalDrop--;
	        	$("#totalDrop").val(totalDrop);
	        	$("#drag"+number).attr('status','0');
	        	$("#back"+number).css("visibility","hidden");
	        	if(totalDrop < 11){
		       		$("#lock").hide();
		       	} 
	        }

			$( '#drag'+number ).animate({
				top: $(this).attr('top'),
				left: $(this).attr('left')
			}, 420 );
		});

$(".imgDemo").on("click", function(){
		var status = $(this).attr('status');
		var company_id = $("#company_id").val();
		var background_src = $(this).children().attr("src");
		//var background_src = $(this).attr("src");
		$("#container-floor").attr("style", "background:url("+background_src+")");
		//if(confirm(background_src))
		{
			//var json_object = {"background_src":background_src};
			$.ajax({
				    headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
				url: "../updatebgfloor",
					data: {"background_src": background_src, "company_id":company_id},
					
					dataType: 'json',
					type: 'POST',
					success: function(json_object) {
						console.log(json_object);
						$("#saved").text("Data has been saved.");
					},
					error: function(json_object) {
						console.log(json_object);
						$("#saved").text("Failed to save data !");
					}
			});
		}
	});
});