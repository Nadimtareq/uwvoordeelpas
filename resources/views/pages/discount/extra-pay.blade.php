<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <script type="text/javascript" src="{{ asset('js/app.js?rand='.str_random(40)) }}"></script>

        <!--[if lt IE 9]>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>
        <?php echo Form::open(array('id' => 'formList', 'url' => 'payment/pay?buy=pay_extra_for_deal', 'method' => 'post', 'class' => 'ui form')) ?>
        <input id="actionMan" type="hidden" name="action">
        <input type="hidden" name="amount" class="amount" id="charge_amount" value="<?php  echo $amount; ?>">
        <input type="hidden" name="temp_reservation_id" value="<?php  echo $temp_reservation_id; ?>">
        <?php echo Form::close(); ?>
        <script type="text/javascript">
            $(function(){
                $('#formList').submit();              
            });
        </script>
    </body>
</html>






