<li class="nav-item">
    <a href="{{ route('rentals.index') }}"
       class="nav-link {{ Request::is('rentals*') ? 'active' : '' }}">
        <p>Rentals</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>


