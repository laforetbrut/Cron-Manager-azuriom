@extends('admin.layouts.admin')

@section('title', 'Cron Manager')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ trans('cron::messages.admin.title') }}</h5>

            @php
                $lastDate = $lastExecution ? \Carbon\Carbon::parse($lastExecution) : null;
                $isOnline = $lastDate && $lastDate->diffInMinutes() < 10;
            @endphp

            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <h5 class="text-{{ $isOnline ? 'success' : ($lastDate ? 'danger' : 'warning') }} mb-1">
                        <i
                            class="fas fa-{{ $isOnline ? 'check-circle' : ($lastDate ? 'times-circle' : 'exclamation-triangle') }} fa-3x mb-3"></i><br>
                        {{ $isOnline ? trans('cron::messages.admin.status_online') : ($lastDate ? trans('cron::messages.admin.status_offline') : trans('cron::messages.admin.never')) }}
                    </h5>

                    @if($lastDate)
                        <p class="text-muted mb-0">
                            {{ trans('cron::messages.admin.last_execution', ['time' => $lastDate->diffForHumans()]) }}
                        </p>
                    @else
                        <p class="text-muted mb-0">
                            {{ trans('cron::messages.admin.status') }} : {{ trans('cron::messages.admin.never') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle"></i> {{ trans('cron::messages.admin.description') }}
            </div>

            <div class="form-group">
                <label for="cron-url">{{ trans('cron::messages.admin.url_label') }}</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="cron-url" value="{{ $url }}" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-info text-white" type="button" onclick="copyToClipboard()">
                            <i class="fas fa-copy"></i> {{ trans('cron::messages.admin.copy') }}
                        </button>
                    </div>
                </div>
                <small class="form-text text-muted">{{ trans('cron::messages.admin.url_help') }}</small>
            </div>

            <form action="{{ route('cron.admin.regenerate') }}" method="POST"
                onsubmit="return confirm('{{ trans('cron::messages.admin.regenerate_confirm') }}');">
                @csrf

                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-sync"></i> {{ trans('cron::messages.admin.regenerate_btn') }}
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('cron::messages.tutorial.title') }}</h6>
        </div>
        <div class="card-body">
            <p>{{ trans('cron::messages.tutorial.introduction') }}</p>

            <ol>
                <li>
                    {!! trans('cron::messages.tutorial.step1', ['url' => '<a href="https://console.cron-job.org" target="_blank">console.cron-job.org</a>']) !!}
                </li>
                <li>
                    {{ trans('cron::messages.tutorial.step2') }}
                </li>
                <li>
                    {{ trans('cron::messages.tutorial.step3') }}
                </li>
                <li>
                    {{ trans('cron::messages.tutorial.step4') }}
                </li>
            </ol>

            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i> {{ trans('cron::messages.tutorial.warning') }}
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            var copyText = document.getElementById("cron-url");
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            document.execCommand("copy");

            // Optional: Show a tooltip or toast
        }
    </script>
    <div class="text-center mt-4">
        <a href="https://www.arcadia-echoes-of-power.fr" target="_blank" class="text-muted mx-2">
            <i class="fas fa-globe"></i> Site Web
        </a>
        <a href="https://arcadia-echoes-of-power.fr/discord" target="_blank" class="text-muted mx-2">
            <i class="fab fa-discord"></i> Discord
        </a>
    </div>
@endsection