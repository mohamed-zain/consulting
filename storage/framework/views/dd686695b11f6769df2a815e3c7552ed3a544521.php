<div>
    <div class="box-body">
        <div class="direct-chat-messages" wire:poll.10ms="mountComponent()">
        <?php if(filled($messages)): ?>

            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($message->user_id == auth()->user()->id): ?>
                    <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right"><?php echo e($message->user->name); ?></span>
                                <span class="direct-chat-timestamp pull-left"><?php echo e(\Carbon\Carbon::parse($message->created_at)->format('Y m d  g:i A')); ?></span>
                            </div><!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="<?php echo e(asset('dist/architect.png')); ?>" alt="message user image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                <?php echo e($message->message); ?>

                            </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                    <?php else: ?>
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left"><?php echo e($message->user->name); ?></span>
                                <span class="direct-chat-timestamp pull-right"><?php echo e(\Carbon\Carbon::parse($message->created_at)->format('Y m d  g:i A')); ?></span>
                            </div><!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="<?php echo e(asset('dist/img/bb.png')); ?>" alt="message user image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                <?php echo e($message->message); ?>

                            </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                لا توجد رسائل او ملاحظات
            <?php endif; ?>
        </div>
    </div>
    <div class="box-footer">
        <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
            <div wire:loading wire:target='SendMessage'>
                Sending message . . .
            </div>
            <div wire:loading wire:target="file">
                Uploading file . . .
            </div>

            
            
            <div class="input-group">
                <input wire:model="message"  placeholder="اكتب ملاحظاتك ....." class="form-control" required>
                <span class="input-group-btn">
                <button type="submit" class="btn btn-warning btn-flat" >ارسال</button>
            </span>
            </div>
        </form>
    </div>
</div>

<?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/livewire/show.blade.php ENDPATH**/ ?>