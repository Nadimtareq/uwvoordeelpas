<?php $affiliate = app('App\Models\Affiliate'); ?>
<?php $strHelper = app('App\Helpers\StrHelper'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="ui breadcrumb">
            <a href="<?php echo e(url('/')); ?>" class="section">Home</a>
            <i class="right chevron icon divider"></i>

            <a href="#" class="sidebar open" data-activates="slide-out">Menu</a>
            <i class="right chevron icon divider"></i>

            <div class="active section">Mijn voordeelpas</div>
        </div>

        <div class="ui divider"></div>
        <div class="ui grid container">
            <span></span>
            <div class="center floated sixteen wide mobile ten wide computer column">
                uw persoonlijke link&nbsp;
                <div class="ui label">
                    <a href="<?php echo e(url("source?reference={$reference->reference_code}")); ?>" id="reference-code" style="opacity: 1;">
                        <?php echo e(url("source?reference={$reference->reference_code}")); ?>

                    </a>
                </div>
                <a href="javascript:;" class="ui green button mini" data-clipboard-target="#reference-code" id="clipboard">
                    <i class="clipboard icon"></i>
                    kopieer link
                </a>
            </div>
        </div>
        <div class="ui grid container">
            <div class="col-md-12">
                <table class="ui very basic sortable collapsing celled table list" style="width: 100%;">
                    <thead>
                        <tr><th>Naam</th><th>Geslacht</th><th>Telefoon</th><th>E-mailadres</th><th>Geregistreerd op</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach($friends as $friend): ?>
                            <tr>
                                <td><?php echo e(@$friend->user->name); ?></td>
                                <td>
                                    <?php if($friend->user->gender == 1): ?>
                                        <?php echo e('Man'); ?>

                                    <?php else: ?>
                                        <?php echo e('Vrouw'); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(@$friend->user->phone); ?></td>
                                <td><?php echo e(@$friend->user->email); ?></td>
                                <td><?php echo e(@$friend->user->created_at->format('d/m/Y h:i A')); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if(count($friends) == 0 ): ?>
                            <tr>
                                <td colspan="5">
                                    Helaas er zijn nog geen personen welke via uw link gekocht hebben.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var clipboard = new Clipboard('#clipboard');
            clipboard.on('success', function(e) {
                e.clearSelection();
                swal({
                    title: "link gekopieerd",
                    text: "Uw link is succesvol gekopieerd",
                    type: "success",
                    confirmButtonColor: "#6498eb",
                    closeOnConfirm: true
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>