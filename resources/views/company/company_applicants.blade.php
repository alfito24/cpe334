@extends('template_tailwind')
@section('title', 'Home')
@section('content')

<div class="flex h-screen mt-20 mb-20">
    <!-- Sidebar -->
    @include('company.sidebar')

    <!-- Content Area -->
<div class="antialiased font-sans">
  <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
      @include('company.applicants_table.pending_applicants')
      @include('company.applicants_table.accepted_applicants')
    </div>
  </div>
</div>

  </div>


<script src="https://cdn.tailwindcss.com"></script>
<script>
function toggleStipendRange() {
  // Get the checkbox and the input elements
  var checkbox = document.getElementById('stipend');
  var input = document.getElementById('start_year');

  // Toggle the disabled property and border style of the input based on the checkbox's checked state
  if (checkbox.checked) {
    input.disabled = true;
    input.classList.add('border-[#000000]'); // Add a class to remove the border
    input.classList.remove('border-[#0EA89B]', 'border-[#0EA89B]'); // Remove border classes
  } else {
    input.disabled = false;
    input.classList.remove('border-[#000000]'); // Remove the class that removes the border
    input.classList.add('border-2', 'border-[#0EA89B]'); // Add back the border classes
  }
}
document.addEventListener('DOMContentLoaded', function() {
        const skillsDropdown = document.getElementById('skillsDropdown');
        const selectedSkills = document.getElementById('selectedSkills');

        skillsDropdown.addEventListener('change', function() {
            if (selectedSkills.value) {
                selectedSkills.value += ', ' + this.value;
            } else {
                selectedSkills.value = this.value;
            }

            this.selectedIndex = 0;
        });
    });
</script>
@endsection

@section('internshiplist')
class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('internshiplist')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
