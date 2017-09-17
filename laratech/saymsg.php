<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
<?php if ($_REQUEST['Digits'] == '1') { ?>
	<Say>Thankyou!</Say>
	<Sms from="+12568264404" to="+918927054384"><?php echo "Thankyou:".$_REQUEST['Digits'] ?></Sms>
<?php } elseif ($_REQUEST['Digits'] == '2') { ?>
	<Say>Sorry!</Say>
<?php } ?>

</Response>