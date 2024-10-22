<x-layout>
    <x-slot name="title">Create Job</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">Create Job Listing</h2>
        <form method="POST" action="/jobs" enctype="multipart/form-data">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Job Info
            </h2>

            <x-inputs.text id="title" name="title" label="Job Title" placeholder="Software Engineer" />

            <x-inputs.text-area id="description" name="description" label="Description"
                placeholder="We are seeking for a skilled and motivated software developer..." />

            <x-inputs.text id="salary" name="salary" label="Salary" type="number" placeholder="90000" />

            <x-inputs.text-area id="requirements" name="requirements" label="Requirements"
                placeholder="Bachelor's Degree in Computer Science" />

            <x-inputs.text-area id="benefits" name="benefits" label="Benefits"
                placeholder="Health insurance, 401k, paid time off" />

            <x-inputs.text id="tags" name="tags" label="Tags (Comma-Separated)"
                placeholder="Development, Coding, Java, Python" />

            <x-inputs.select id="job_type" name="job_type" label="Job Type" value="{{ old('job_type') }}"
                :options="[
                    'Full-Time' => 'Full-Time',
                    'Part-Time' => 'Part-Time',
                    'Contract' => 'Contract',
                    'Temporary' => 'Temporary',
                    'Internship' => 'Internship',
                ]" />


            <x-inputs.select id="remote" name="remote" label="Remote" :options="[0 => 'No', 1 => 'Yes']" />

            <x-inputs.text id="address" name="address" label="Address" placeholder="123 Main St" />

            <x-inputs.text id="city" name="city" label="City" placeholder="Albany" />

            <x-inputs.text id="state" name="state" label="State" placeholder="NY" />

            <x-inputs.text id="zipcode" name="zipcode" label="Zipcode" placeholder="02214" />

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Company Info
            </h2>

            <x-inputs.text id="company_name" name="company_name" label="Company Name"
                placeholder="Enter Company Name" />

            <div class="mb-4">
                <label class="block text-gray-700" for="company_description">Company Description</label>
                <textarea id="company_description" name="company_description" class="w-full px-4 py-2 border rounded focus:outline-none"
                    placeholder="Company Description"></textarea>
            </div>

            <x-inputs.text-area id="company_description" name="company_description" label="Company Description"
                placeholder="Enter Company Description" />

            <x-inputs.text id="company_website" name="company_website" type="url" label="Company Website"
                placeholder="Enter Company Website" />

            <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone"
                placeholder="Enter Contact Phone" />

            <x-inputs.text id="contact_email" name="contact_email" type="email" label="Contact Email"
                placeholder="Enter Email Address" />

            <div class="mb-4">
                <label class="block text-gray-700" for="company_logo">Company Logo</label>
                <input id="company_logo" type="file" name="company_logo"
                    class="w-full px-4 py-2 border rounded focus:outline-none @error('company_logo') border-red-500 @enderror" />
                @error('company_logo')
                    <p class="text-red-500 text-sm mt-1"></p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                Save
            </button>
        </form>
    </div>
</x-layout>
