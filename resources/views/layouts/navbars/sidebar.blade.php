<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            {{-- <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a> --}}
            <a href="#" class="simple-text logo-normal">{{ __('DYNAMIC CERTIFICATE GENERATOR') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ url('/downloadcsv') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Download Sample Csv File') }}</p>
                </a>
                {{-- <a href="{{ url('/download-csv') }}">Download CSV</a> --}}

            </li>
            {{-- <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li> --}}

        </ul>
    </div>
</div>
