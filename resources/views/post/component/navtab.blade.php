<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->get('status') ? '' : 'active'}}" href="{{ route('post') }}" role="tab" aria-selected="true">
            Published
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->get('status') == 'draft' ? 'active' : ''}}" href="{{ route('post') }}?status=draft" aria-selected="false" tabindex="-1" role="tab">
            Drafts
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->get('status') == 'trash' ? 'active' : ''}}" href="{{ route('post') }}?status=trash" aria-selected="false" tabindex="-1" role="tab">
            Trashed
        </a>
    </li>
</ul>
