@extends('template.theme')
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('public/js/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({
    selector: "textarea",
    theme: "modern",
    height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
}); 
</script>
@stop

@section('content')
<div class="content">
    @include('admin.template.breadcrumb')
    
	<?php echo Form::open(array('url' => 'admin/'.$slugController.'/create', 'method' => 'post', 'class' => 'ui edit-changes form')) ?>
    <div class="ui grid">
        <div class="eleven wide column">
            <div class="field">
                <label>Naam</label>
                <?php echo Form::text('name') ?>
            </div>      

            <div class="field">
                <label>Categorie</label>
                <?php echo Form::select('category', Config::get('preferences.content_blocks')) ?>
            </div>      

            <div class="field">
                <label>Inhoud</label>
                <?php echo Form::textarea('content') ?>
            </div>  
        </div>    

        <div class="five wide column">
            <h4 class="ui header">Commando's</h4>
            <div class="ui styled accordion">
                <div class="active title">
                    <i class="dropdown icon"></i>
                    %discount%
                </div>

                <div class="active content">
                    Geef de kortingspercentage weer
                </div>

                <div class="title">
                    <i class="dropdown icon"></i>
                    %days%
                </div>

                <div class="content">
                    Geef de kortingsdagen weer
                </div>

                <div class="title">
                    <i class="dropdown icon"></i>
                    %discout_comment%
                </div>

                <div class="content">
                    Geef de kortings opmerkingen weer
                </div>
            </div>
        </div>
    </div>  
     <div class="clear"></div><br />
	
	<button class="ui tiny button" type="submit"><i class="plus icon"></i> Aanmaken</button>
	<?php echo Form::close(); ?>
</div>
<div class="clear"></div>
@stop