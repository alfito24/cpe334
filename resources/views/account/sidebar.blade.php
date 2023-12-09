<!-- Sidebar -->
<div class="w-64 px-4 py-6 bg-white shadow-md">
    <ul class="space-y-2">
        <li>
            <a href="/profile_edit" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                <span class="ml-2 text-sm font-medium {{ $active === 'profile_edit' ? 'text-[#0EA89B]' : '' }}">General
                    Information</span>
            </a>
        </li>
        <li>
            <a href="/profile_edit/experience" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                <span class="ml-2 text-sm font-medium {{ $active === 'experience_edit' ? 'text-[#0EA89B]' : '' }}">Add
                    Work Experiences</span>
            </a>
        </li>
        <li>
            <a href="/profile_edit/education" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                <span class="ml-2 text-sm font-medium {{ $active === 'education_edit' ? 'text-[#0EA89B]' : '' }}">Add
                    Education</span>
            </a>
        </li>
    </ul>
</div>
