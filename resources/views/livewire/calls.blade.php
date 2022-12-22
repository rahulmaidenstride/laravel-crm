<div class="calls">
    {{--<h6 class="text-uppercase">{{ ucfirst(__('laravel-crm::lang.calls')) }}</h6>
    <hr />--}}
    @if($showForm)
        <form wire:submit.prevent="create" id="inputCreateForm">
            @include('laravel-crm::livewire.components.partials.call.form-fields')
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ ucfirst(__('laravel-crm::lang.save')) }}</button>
            </div>
        </form>
        <hr/>
    @endif
    <ul class="list-unstyled">
        @foreach($calls as $call)
            @livewire('call',[
                'call' => $call
            ], key($call->id))
        @endforeach
    </ul>
    @push('livewire-js')
        <script>
            $(document).ready(function () {
                $(document).on("change", "#inputCreateForm input[name='start_at']", function () {
                    @this.set('start_at', $(this).val());
                });

                $(document).on("change", "#inputCreateForm input[name='finish_at']", function () {
                    @this.set('finish_at', $(this).val());
                });

                window.addEventListener('callEditModeToggled', event => {
                    $('input[name="start_at"]').datetimepicker({
                     timepicker:true,
                     format: 'Y/m/d H:i',
                    });
                    $('input[name="finish_at"]').datetimepicker({
                        timepicker:true,
                        format: 'Y/m/d H:i',
                    });
                });

                window.addEventListener('callAddOn', event => {
                    $('.nav-activities li a#tab-calls').tab('show')
                    $('input[name="start_at"]').datetimepicker({
                        timepicker:true,
                        format: 'Y/m/d H:i',
                    });
                    $('input[name="finish_at"]').datetimepicker({
                        timepicker:true,
                        format: 'Y/m/d H:i',
                    });
                });
            });
        </script>
    @endpush
</div>


