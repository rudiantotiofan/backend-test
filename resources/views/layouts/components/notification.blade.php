<div class="row">
    <div class="col-xs-12">
        @if (session('message_success'))
            <p class="alert alert-success">
                {{ session('message_success') }}
            </p>
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning">
                <p>{{ session('warning') }}</p>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (count(session('validation_error')) > 0 )
            <div class="alert alert-danger">
                <ul>
                    @foreach (session('validation_error')->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>