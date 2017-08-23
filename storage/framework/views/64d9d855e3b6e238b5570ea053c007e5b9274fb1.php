<?php foreach($data as $data): ?>
<?php 
$date = \Carbon\Carbon::create(
    date('Y', strtotime($data->date)), 
    date('m', strtotime($data->date)),
    date('d', strtotime($data->date)),
    date('H', strtotime($data->time)),
    date('i', strtotime($data->time)),
    0
);

$barcodeDate = \Carbon\Carbon::create(
    date('Y', strtotime($data->barcodeDate)), 
    date('m', strtotime($data->barcodeDate)),
    date('d', strtotime($data->barcodeDate)),
    0,
    0,
    0
);

if ($data->days != 'null' && $data->days != NULL && $data->days != '[""]') {
    foreach (json_decode($data->days) as $day) {
        $days[$day] = $day;
    }
}

$classBarcode = $barcodeDate->addYear(1)->isPast() ? '' : isset($days[date('N')]) ? 'active' : '';
?>
<tr class="<?php echo e($classBarcode); ?>">
    <td>
        <input type="number" class="changeTableNr" data-id="<?php echo e($data->id); ?>" value="<?php echo e($data->table_nr); ?>" name="0" max="999" min="1" style="width: 30px;">
    </td>
    <td>
        <?php echo e($date->formatLocalized('%d %B %Y')); ?> <?php echo e(date('H:i', strtotime($data->time))); ?>

    </td>
    <td><?php echo e($data->persons); ?></td>
    <td>
        <script type="text/javascript">
            var activateAjax = 'reservationadmin';

            $(document).ready(function(){
                $("#phone-email<?php echo e($data->id); ?>").hide();

                $("#name<?php echo e($data->id); ?>").click(function(){
                    $("#phone-email<?php echo e($data->id); ?>").hide();
                });

                $("#name<?php echo e($data->id); ?>").click(function(){
                    $("#phone-email<?php echo e($data->id); ?>").show();
                });
            });
        </script>

        <div class="strong" id="name<?php echo e($data->id); ?>" style="cursor: pointer"> <i class="user icon"></i>  <?php echo e($data->name); ?> </div>  <br />

        <div id="phone-email<?php echo e($data->id); ?>">
            <i class="envelope icon"></i> <?php echo e($data->email); ?><br>
            <i class="phone icon"></i> <?php echo e($data->phone); ?> <br>
        </div>

        <?php if(trim($data->source) != ''): ?>
        Via: <?php echo e($data->source); ?>

        <?php endif; ?>
    </td>
    <td>  <?php echo e($data->deal); ?></td>
        
    <td>
        <?php if($data->allergies != 'null' && $data->allergies != NULL && $data->allergies != '[""]'): ?>
        <div class="ui normal floating dropdown small labeled basic button">
            <span class="text">Open</span>
            <i class="dropdown icon"></i>
            
            <div class="menu">
                <div class="divider"></div>

                <div class="header">
                    <i class="tags icon"></i>
                    Allergie&euml;n
                </div>

                <div class="scrolling menu">
                    <?php if(is_array(json_decode($data->allergies))): ?>
                        <?php foreach(json_decode($data->allergies) as $allergies): ?>
                            <div class="item"><?php echo e($allergies); ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </td>
    <td>
        <?php if($data->preferences != 'null' && $data->preferences != NULL && $data->preferences != '[""]'): ?>
        <div class="ui normal floating dropdown small labeled basic button">
            <span class="text">Open</span>
            <i class="dropdown icon"></i>
            
            <div class="menu">
                <div class="divider"></div>

                <div class="header">
                    <i class="tags icon"></i>
                    Voorkeuren
                </div>

                <div class="scrolling menu">
                    <?php if(is_array(json_decode($data->preferences))): ?>
                        <?php foreach(json_decode($data->preferences) as $preferences): ?>
                            <div class="item"><?php echo e($preferences); ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </td>
    <td style="width: 50px;">
        <div style="width: 150px; overflow: hidden;"><?php echo e($data->comment); ?></div>
    </td>
    <td><?php echo e($data->saldo); ?></td>
    <td>
        <?php if(isset($days[date('N')]) && $data->discountCard == 1): ?> 
            <?php if($data->discount != 'null' && $data->discount != NULL && $data->discount != '[""]'): ?>
                echo urldecode(json_decode($data->discount)[0]);
            <?php endif; ?>
        <?php endif; ?>
    </td>
    <td style="text-align: center;">
    <?php 
    $dbDate = strtotime($data->date.' '.$data->time);
    $currentDate = strtotime(date('Y-m-d H:i'));
         if($currentDate > $dbDate){
        echo '<i class="icon green checkmark"></i>';
     }else{
        echo '<i class="icon red remove"></i>';
    }
    ?>
      <!--  <i class="icon <?php echo e($data->restaurant_is_paid  == 1 ? 'green checkmark' : 'red remove'); ?>"></i> -->
    </td>
    
    <?php if($company == NULL): ?>
    <td>
        <a href="<?php echo e(url('admin/reservations/clients/'.$data->companyId)); ?>"><?php echo e($data->companyName); ?></a>
    </td>
    <?php endif; ?>

    <td>
        <?php if(!Request::has('cancelled')): ?>
            <?php echo Form::open(array('class' => 'clientOptionsForm')); ?>
                <input value="<?php echo e($data->id); ?>" type="hidden" name="reservationId" />
                <input value="<?php echo e(Request::segment(5)); ?>" type="hidden" name="reservationDate" />

                <div class="ui">
                    <?php if(!$date->isPast()): ?>
                        <?php if($data->status == 'reserved-pending' OR $data->status == 'iframe-pending'): ?>
                            <div class="ui buttons">
                                <button value="<?php echo e($data->status); ?>" name="reservationSubmit" type="submit" class="ui fluid label">Accepteren</button>
                                <button value="refused" name="reservationSubmit" type="submit" class="ui red fluid label">Weigeren</button>
                            </div>
                            <br /><br />
                        <?php else: ?>
                            <?php if($data->status != 'present' && $data->status != 'iframe-present'): ?>
                            <a href="<?php echo e(url('reservation/edit/'.$data->id.'?company_page=1')); ?>" class="ui fluid icon small label">
                                <i class="pencil icon"></i> Wijzig
                            </a><br />
                            <?php endif; ?>

                            <?php if($data->status == 'present' OR $data->status == 'iframe-present'): ?>
                            <button style="margin-top: 5px;" value="<?php echo e($data->status == 'iframe' ? 'iframe-present' : 'present'); ?>" name="reservationSubmit" type="button" class="ui green icon fluid label">
                                Aanwezig
                            </button>
                            <?php else: ?>
                            <button style="margin-top: 5px;" value="<?php echo e($data->status == 'iframe' || $data->status == 'iframe-reserved' ? 'iframe-present' : 'present'); ?>" name="reservationSubmit" type="submit" class="ui fluid green label">
                             Aanwezig
                            </button>
                            <?php endif; ?>
                            
                            <?php if($data->status == 'reserved' || $data->status == 'iframe'): ?>
                            <button value="noshow" style="margin-top: 5px;" name="reservationSubmit" type="submit" class="ui fluid red label">No Show</button>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php echo Form::close(); ?>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>