<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
<Gather input="speech dtmf" timeout="3" action="http://vps137395.vps.ovh.ca/laratech/saymsg.php" method="POST">
<Say>Hello mister there is a new reservation today at 19.00pm for 2 persons</Say>
<Say>do you wanna accept this press 1</Say>
<Say>dont you accept this press 2</Say>
  <Say>say ok for welcome</Say>
</Gather>
</Response>
