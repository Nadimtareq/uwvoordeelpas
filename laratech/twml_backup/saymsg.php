<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
<?php if ($_REQUEST['Digits'] == '1') { ?>
	<Say>Thankyou!</Say>
<?php } elseif ($_REQUEST['Digits'] == '2') { ?>
	<Say>Sorry!</Say>
<?php } ?>
</Response>