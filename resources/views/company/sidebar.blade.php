<!-- Sidebar -->
<!-- Existing sidebar code here... -->
@if (auth()->user() && auth()->user()->company_review == 'accepted')
    <div class="w-64 px-4 py-6 bg-white shadow-md">
        <ul class="space-y-2">
            <li>
                <a href="/company_dashboard" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <span
                        class="ml-2 text-sm font-medium {{ $active === 'dashboard' ? 'text-[#0EA89B]' : '' }}">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/company_detail" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <span
                        class="ml-2 text-sm font-medium {{ $active === 'company_detail' ? 'text-[#0EA89B]' : '' }}">Profile</span>
                </a>
            </li>
            <li>
                <a href="/add_internship" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <span
                        class="ml-2 text-sm font-medium {{ $active === 'add_internship' ? 'text-[#0EA89B]' : '' }}">Post
                        Internship</span>
                </a>
            </li>
            <li>
                <a href="/company_internship" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <span
                        class="ml-2 text-sm font-medium {{ $active === 'company_internship' ? 'text-[#0EA89B]' : '' }}">All
                        Internship</span>
                </a>
            </li>
            <li>
                <a href="/company_applicants" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <span
                        class="ml-2 text-sm font-medium {{ $active === 'company_applicants' ? 'text-[#0EA89B]' : '' }}">Applied
                        Candidates</span>
                </a>
            </li>
        </ul>
    </div>
@endif
