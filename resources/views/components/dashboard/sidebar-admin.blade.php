 <div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <img src="/images/dashboard-store-logo.svg" alt="" class="my-4" />
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">Dashboard</a>
        <a href="" class="list-group-item list-group-item-action">Products</a>
        <a href="{{ route('admin.category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/dashboard/category*')) ? 'active' : '' }}">Categories</a>
        <a href="dashboard-settings.html" class="list-group-item list-group-item-action">Transaction</a>
        <a href="dashboard-account.html" class="list-group-item list-group-item-action">Users</a>
    </div>
</div>
