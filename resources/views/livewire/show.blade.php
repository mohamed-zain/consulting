<div>
    <div class="box-body">
        <div class="direct-chat-messages" wire:poll.10ms="mountComponent()">
        @if(filled($messages))

            @foreach($messages as $message)

                @if($message->user_id == auth()->user()->id)
                    <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right">{{ $message->user->name }}</span>
                                <span class="direct-chat-timestamp pull-left">{{ \Carbon\Carbon::parse($message->created_at)->format('Y m d  g:i A') }}</span>
                            </div><!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="{{ asset('dist/architect.png') }}" alt="message user image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{ $message->message }}
                            </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                    @else
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">{{ $message->user->name }}</span>
                                <span class="direct-chat-timestamp pull-right">{{ \Carbon\Carbon::parse($message->created_at)->format('Y m d  g:i A') }}</span>
                            </div><!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="{{ asset('dist/img/bb.png') }}" alt="message user image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{ $message->message }}
                            </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                    @endif
                @endforeach
            @else
                لا توجد رسائل او ملاحظات
            @endif
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

            {{--        <input type="hidden" id="username" value="{{ auth()->user()->id }}">--}}
            {{--        <input type="hidden" id="bennar" value="{{ $bennar }}">--}}
            <div class="input-group">
                <input wire:model="message"  placeholder="اكتب ملاحظاتك ....." class="form-control" required>
                <span class="input-group-btn">
                <button type="submit" class="btn btn-warning btn-flat" >ارسال</button>
            </span>
            </div>
        </form>
    </div>
</div>

