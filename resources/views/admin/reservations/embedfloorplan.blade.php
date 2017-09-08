<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" />
<link rel="stylesheet" href="{{ asset('css/dragndrop/owl-coursel.css') }}" />
<link rel="stylesheet" href="{{ asset('css/dragndrop/base.css?rand='.str_random(40)) }}">
<script src="{{ asset('js/dragndrop/jquery-git2.min.js') }}"></script>
<script src="{{ asset('js/dragndrop/jquery.event.drag-2.2.js') }}"></script>
<script src="{{ asset('js/dragndrop/jquery.event.drag.live-2.2.js') }}"></script>
<script src="{{ asset('js/dragndrop/jquery.event.drop-2.2.js') }}"></script>
<script src="{{ asset('js/dragndrop/jquery.event.drop.live-2.2.js') }}"></script>
<script src="{{ asset('js/dragndrop/excanvas.min.js') }}"></script>
<script src="{{ asset('js/dragndrop/watermark-polyfill.js') }}"></script>
<script src="{{ asset('js/dragndrop/main.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dragndrop/owl.carousel.js') }}"></script>
<style>
    #container-floor {
        -webkit-background-size:cover !important;
        background-size:cover !important;
    }
    .table {
        position: absolute;
        height: 50px;
        width: 75px;
        top: 0px;
    }
    .table div {
        font-size: 10px;
        margin-top: 55px;
        text-align: center;
        font-weight: bold;
    }
</style>
<div style="position: relative">
    <div class="clearfix">
        <input type="hidden" id="totalDrop" value="0">
        <input type="hidden" name="redirectUrl" value="{{ url('admin/reservations/clients'.(isset($companyInfo->name) ? '/'.$companyInfo->id : '')) }}">
        <input type="hidden" name="company" id="company_id" value="{{ isset($companyInfo->id) ? $companyInfo->id : '' }}">
        <input type="hidden" name="date" value="{{ $date }}">
        <div id="lock"></div>
        {{--<div id="container-table" class="col-md-3"></div>--}}
        <div id="container-floor"></div>

    </div>
    <?php
    $arrName =  $arrTableId = $arrtable_number = $arrTable_status = $arrName_xposition = $arrName_yposition = $arrName_reservation_id=[null];
    $arrName_table = [null];
    $_cnt = 0;
    ?>
    @if(count($data) >= 1)
        @foreach($data as $data)
            <?php
            if(isset($data->floor_plan_position) && $data->floor_plan_position!= ''){
                $_floor_plan = json_decode($data->floor_plan_position);

                $xcords = (isset($_floor_plan->offsetX) && $_floor_plan->offsetX!='')?$_floor_plan->offsetX:0;
                $ycords = isset($_floor_plan->offsetY)?$_floor_plan->offsetY:0;

                array_push( $arrName_xposition,  $xcords );
                array_push( $arrName_yposition,  $ycords );
            } else {
                array_push( $arrName_xposition,  0 );
                array_push( $arrName_yposition,  0 );
            }
            if(isset($data->reservation_id) && $data->reservation_id!= ''){
                array_push( $arrName_reservation_id,  $data->reservation_id );
            } else {
                array_push( $arrName_reservation_id,  0 );
            }

            array_push( $arrName,  "Table-". $data->table_number );
            array_push( $arrTableId,  $data->table_id );
            array_push( $arrName_table,  $data->seating );
            array_push( $arrtable_number, $data->table_number );
            array_push( $arrTable_status, $data->table_status );
            $_cnt++;
            ?>
        @endforeach
    @else
        <div class="ui error message">Er is geen data gevonden.</div>
    @endif
    <?php

    $totalData  = $_cnt ;//count($data) - 1;
    $perGroup   = 2;
    $division   = ceil($totalData/$perGroup);
    $group      = [];
    $style_left = [];
    ?>
    @for($x=0;$x <= $division;$x++)
        <?php

        $style_left[$x] = 0;
        $group[$x] = [];
        ?>
        @if($x==0)
            <?php
            $z             = 1;
            $perGroupAfter = $perGroup;
            ?>
        @else
            <?php
            $z             = ($x*$perGroup)+1;
            $perGroupAfter = ($x*$perGroup)+$perGroup;
            ?>
        @endif
        @for($y=$z;$y<=$perGroupAfter;$y++)
            <?php
            array_push($group[$x],$y);
            ?>
        @endfor
    @endfor
    @for($i=1;$i<=$totalData;$i++)
        @for($x=0;$x<=$division;$x++)
            @if (in_array($i, $group[$x]))
                <?php
                $sl = $margin_top = 0 ;
                //print "<br> $i => ".($arrName_xposition[$i]);continue;
                if( $arrName_xposition[$i] > 0 ){
                    $margin_top      = ($arrName_yposition[$i]);
                    $sl              = $arrName_xposition[$i];
                }else{
                    $margin_top      = ($x*90);
                    $style_left[$x] += 0;
                    $sl              = $style_left[$x];
                }
                ?>
            @endif
        @endfor
        <div class="table" id="drag{{$i}}" table_id="{{  $arrTableId[$i] }}" table_number="{{  $arrtable_number[$i] }}" reservation_id="{{ $arrName_reservation_id[$i] }}" style="left:{{  $sl }}px;top:{{  $margin_top }}px;" status="{{ $arrTable_status[$i] }}"> <a class="boxclose" id="back{{  $i }}" number="{{  $i }}" top="" left=""  table_id="{{  $arrTableId[$i] }}" table_number="{{  $arrtable_number[$i] }}" reservation_id="{{ $arrName_reservation_id[$i] }}"> <img src="{{ url('images/dragndrop/back.png') }}" width="20"> </a>
            <div class="name">{{  $arrName[$i] }}</div>
        </div>
        <script>
            $(function($){
                setTimeout(function () {
                    var text = watermark.text;
                    //watermark([ '<?php echo url('images/dragndrop/table.png') ?>'])
                    watermark([ '<?php
                            if($arrTable_status[$i] == 0){
                                echo url('images/dragndrop/0/'.$arrName_table[$i].'.png');
                            } elseif($arrTable_status[$i] == 1) {
                                echo url('images/dragndrop/1/'.$arrName_table[$i].'.png');
                            }elseif($arrTable_status[$i] == 2) {
                                echo url('images/dragndrop/2/'.$arrName_table[$i].'.png');
                            }elseif($arrTable_status[$i] == 3) {
                                echo url('images/dragndrop/3/'.$arrName_table[$i].'.png');
                            }else {
                                echo url('images/dragndrop/4/'.$arrName_table[$i].'.png');
                            }
                            ?>'])
                            .image(text.center('{{  $i }}', '18px Josefin Slab', '#000', 1, 48))
                            .then(function (img) {
                                $('#drag{{  $i }}').css("background","url('"+img.src+"') no-repeat");
                            });

                }, 1000);
            });
        </script>
    @endfor
</div>

<script>
    /*var img = new Array("<?php echo url('images/dragndrop/bg/gray-1.jpg'); ?>","<?php echo url('images/dragndrop/bg/yellow-2.jpg'); ?>");
     var imgElement = document.getElementById("imgDemo");
     var i = 0;
     var imgLen = img.length;
     function nxt()
     {
     if(i < imgLen-1)
     {
     i++;
     }
     else{
     i=0;
     }

     imgElement.src = img[i];
     }

     function prvs()
     {
     if(i > 0)
     {
     i--;
     }
     else
     {
     i = imgLen-1;
     }
     imgElement.src = img[i];
     }*/
    var img = $("#imgDemo");
    <?php
    if(isset($saved_background_src) && $saved_background_src!=''){
        echo '$("#container-floor").attr("style", "background:url('.$saved_background_src.')");';
    }
    ?>

</script>