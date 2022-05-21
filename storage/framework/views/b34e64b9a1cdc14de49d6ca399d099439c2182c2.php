<div>
    <div wire:poll.10ms="mountComponent()">
        <?php if(filled($projectCode)): ?>

            <script type="text/javascript">
                var audio = document.getElementById("audioSuccess");
                audio.play();
            </script>
           
            <div class="box" style="position: absolute; bottom: 50px; right: 50px;width: 400px;z-index: 999999;" id="<?php echo e($name); ?>">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e($code); ?> - <?php echo e($mission); ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php echo e($message); ?>

                </div><!-- /.box-body -->
                <div class="box-footer">
                   <?php echo e(Carbon\Carbon::parse($name)->diffForHumans()); ?>

                </div><!-- /.box-footer-->
            </div>

        <?php endif; ?>
    </div>
</div>

<?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/livewire/project-manager-notification.blade.php ENDPATH**/ ?>