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
                    <h5
                        class="d-flex gap-2 align-items-center justify-content-center text-{{ $isOnline ? 'success' : ($lastDate ? 'danger' : 'warning') }} mb-1">
                        <i
                            class="bi bi-{{ $isOnline ? 'check-circle' : ($lastDate ? 'clock-history' : 'exclamation-triangle') }} fs-5"></i>
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
                <i class="bi bi-info-circle"></i> {{ trans('cron::messages.admin.description') }}
            </div>

            <div class="form-group">
                <label for="cron-url">{{ trans('cron::messages.admin.url_label') }}</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="cron-url" value="{{ $url }}" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" onclick="copyToClipboard('cron-url')">
                            <i class="bi bi-link"></i> {{ trans('cron::messages.admin.copy') }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="cron-key">{{ trans('cron::messages.admin.secret_key') }}</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="cron-key" value="{{ $key }}" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="button" onclick="copyToClipboard('cron-key')">
                            <i class="bi bi-key"></i> {{ trans('cron::messages.admin.copy') }}
                        </button>
                    </div>
                </div>
                <small class="form-text text-muted">{{ trans('cron::messages.admin.secret_key_desc') }}</small>
            </div>

            <form action="{{ route('cron.admin.regenerate') }}" method="POST"
                onsubmit="return confirm('{{ trans('cron::messages.admin.regenerate_confirm') }}');">
                @csrf

                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-arrow-clockwise"></i> {{ trans('cron::messages.admin.regenerate_btn') }}
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
                <li>
                    {{ trans('cron::messages.tutorial.step5') }}
                </li>
                <li>
                    {{ trans('cron::messages.tutorial.step6') }}
                </li>
            </ol>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/7q2Rd9w_FUI?si=XFEd1Wdrqno23pN7"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i> {{ trans('cron::messages.tutorial.warning') }}
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="https://discord.com/invite/xjF8Rtzyd4" target="_blank" class="text-muted mx-2">
            <i class="fab fa-discord"></i> Discord
        </a>
        <a href="https://www.arcadia-echoes-of-power.fr/" target="_blank" class="text-muted mx-2 text-decoration-none">
            <i class="fas fa-server"></i> Arcadia: Echoes of Power (Minecraft)
        </a>
    </div>
@endsection


@push('footer-scripts')
    <script>
        const URL = document.getElementById('cron-url')
        const BEARER = document.getElementById('cron-key')

        function copyToClipboard(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");

            if (id === 'cron-key') {
                var token = 'Bearer ' + copyText.value;
                navigator.clipboard.writeText(token);
            }
        }

        copyToClipboard(URL)
        copyToClipboard(BEARER)


    </script>
@endpush