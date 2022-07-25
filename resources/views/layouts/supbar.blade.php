<ul class="nav supbar">
    <li class="nav-item">
        <a class="nav-link @if (Request::is('dashboard')) supbar-selected-link @endif" href="{{ route('dashboard') }}"
            title="Dashboard">
            <span class="text-light">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (Request::is('categories')) supbar-selected-link @endif"
            href="{{ route('categories.index') }}" title="Categories">
            <span class="text-light">Categories</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (Request::is('products')) supbar-selected-link @endif"
            href="{{ route('products.index') }}" title="Products">
            <span class="text-light">Products</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (Request::is('orders')) supbar-selected-link @endif"
            href="{{ route('orders.index') }}" title="Orders">
            <span class="text-light">Orders</span>
        </a>
    </li>
</ul>
