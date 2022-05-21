<div>
    <div wire:poll.10ms="mountComponent()">
        @if(filled($projectCode))

            <script type="text/javascript">
                var audio = document.getElementById("audioSuccess");
                audio.play();
            </script>
           {{--<div class="notify bottom-right do-show" data-notification-status="success" >
                <h6>{{ $code }} - {{ $mission }}</br></h6>
                <p><small>{{ $message }}</small></p>
                <p>{{ Carbon\Carbon::parse($name)->diffForHumans() }}</p>
            </div>--}}
            <div class="box" style="position: absolute; bottom: 50px; right: 50px;width: 400px;z-index: 999999;" id="{{ $name }}">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $code }} - {{ $mission }}</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {{ $message }}
                </div><!-- /.box-body -->
                <div class="box-footer">
                   {{ Carbon\Carbon::parse($name)->diffForHumans() }}
                </div><!-- /.box-footer-->
            </div>

        @endif
    </div>
</div>

