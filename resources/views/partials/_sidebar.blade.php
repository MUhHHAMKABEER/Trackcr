<aside class="sidebar h-screen w-56 flex-shrink-0 bg-white border-r border-gray-200 text-sm">
    <div class="sidebar-header p-4 flex items-center">
        <div class="logo w-7 h-7 bg-purple-500 rounded-lg flex items-center justify-center">
            <span class="material-icons text-white text-base">play_arrow</span>
        </div>
        <span class="title text-lg font-semibold text-gray-800 ml-2">Tracker</span>
    </div>

    <nav class="flex-grow px-3 py-2">
        <ul class="space-y-1">
            <li>
                <a href=""
                   class="nav-item flex items-center px-4 py-2 rounded-md
                          {{ request()->routeIs('dashboard') ? 'bg-purple-100 text-purple-700 font-semibold border border-purple-400' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="material-icons mr-3 text-base">dashboard</span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href=""
                   class="nav-item flex items-center px-4 py-2 rounded-md
                          {{ request()->routeIs('device.history') ? 'bg-purple-100 text-purple-700 font-semibold border border-purple-400' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="material-icons mr-3 text-base">history</span>
                    <span>Tracking History</span>
                </a>
            </li>
            <li>
                <a href=""
                   class="nav-item flex items-center px-4 py-2 rounded-md
                          {{ request()->routeIs('device.reports') ? 'bg-purple-100 text-purple-700 font-semibold border border-purple-400' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="material-icons mr-3 text-base">report</span>
                    <span>Reports</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.devices.index') }}"
                class="nav-item flex items-center px-4 py-2 rounded-md
                        {{ request()->routeIs('admin.devices.index') ? 'bg-purple-100 text-purple-700 font-semibold border border-purple-400' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="material-icons mr-3 text-base">gps_fixed</span>
                    <span>Device Management</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"
                class="nav-item flex items-center px-4 py-2 rounded-md
                        {{ request()->routeIs('users.index') ? 'bg-purple-100 text-purple-700 font-semibold border border-purple-400' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="material-icons mr-3 text-base">group</span>
                    <span>User Management</span>
                </a>
            </li>
            <li>
                <a href=""
                   class="nav-item flex items-center px-4 py-2 rounded-md
                          {{ request()->routeIs('settings.index') ? 'bg-purple-100 text-purple-700 font-semibold border border-purple-400' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="material-icons mr-3 text-base">settings</span>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
