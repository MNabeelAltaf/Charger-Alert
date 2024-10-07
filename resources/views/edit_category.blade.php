<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth" dir="ltr">

<head>

    @include('components.Header')

</head>

<body class="font-urbanist text-base text-black dark:text-white dark:bg-slate-900">
    <!-- Loader Start -->
    @include('components.Loader')
    <!-- Loader End -->

    <span
        class="fixed blur-[200px] w-[600px] h-[600px] rounded-full top-1/2 start-1/2 ltr:-translate-x-1/2 rtl:translate-x-1/2 -translate-y-1/2 bg-gradient-to-tl from-red-600/20 to-violet-600/20 dark:from-red-600/40 dark:to-violet-600/40"></span>

    <!-- Start Navbar -->

    @include('components.Navbar')


    @php
        $thumb = url('storage') . '/' . $category_data->thumb;
    @endphp



    <!-- End Navbar -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="grid md:grid-cols-12 gap-[30px]">
                <div class="lg:col-span-12 md:col-span-12">
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                        <h3 class="md:text-[30px] text-[26px] font-semibold text-center mb-4">Edit Category</h3>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="">

                            <form action="{{ route('edit_category_data') }}" method="POST"
                                enctype="multipart/form-data" class="py-6">

                                @method('PUT')

                                @csrf

                                <div class="space-y-5">
                                    <div>
                                        <label class="form-label font-medium">Name<span
                                                class="text-red-600">*</span></label>
                                        <input type="text"
                                            class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2"
                                            placeholder="Name:" id="name" name="name"
                                            value="{{ old('name', $category_data->name) }}" required>
                                    </div>
                                    <br>


                                    {{-- <div class="flex items-center space-x-3">
                                        <label class="form-label font-medium">Thumbnail<span
                                                class="text-red-600">*</span></label>
                                        <input type="file" id="input-file2" name="thumbnail" accept="image/*"
                                            value="{{ $category_data->thumb }}"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-400 transition duration-200 ease-in-out file:bg-gray-200 file:rounded-lg file:px-4 file:py-2 file:border-none file:cursor-pointer file:hover:bg-gray-300 dark:file:bg-gray-700 dark:file:hover:bg-gray-600">
                                    </div>


                                    <div class="flex items-center space-x-3 my-10" style="height: 140px;">
                                        <img src="{{ $thumb }}" alt="category thumbnail"
                                            style="height: 140px; width: 140px;">
                                    </div> --}}



                                    {{-- <div class="flex items-center space-x-3">
                                        <label class="form-label font-medium">Thumbnail<span
                                                class="text-red-600">*</span></label>
                                        <input type="file" id="input-file2" name="thumbnail" accept="image/*"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-400 transition duration-200 ease-in-out file:bg-gray-200 file:rounded-lg file:px-4 file:py-2 file:border-none file:cursor-pointer file:hover:bg-gray-300 dark:file:bg-gray-700 dark:file:hover:bg-gray-600">
                                    </div> --}}

                                    {{-- <div class="flex items-center space-x-3 my-10" style="height: 140px;">
                                        <img id="image-preview" src="{{ $thumb }}" alt="category thumbnail"
                                            style="height: 140px; width: 140px;">
                                    </div> --}}

                                    <input name="category_id" type="hidden" value={{ $category_data->id }} />

                                    <input type="submit" id="submit" name="send"
                                        class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full mt-5"
                                        value="Update">
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- End Footer -->
    <!-- Switcher -->

    @include('components.Switcher')


    <!-- Back to top -->

    @include('components.BacktoTop')
    <!-- Back to top -->

    <!-- JAVASCRIPTS -->
    @include('components.JSFiles')

    <script>
        const fileInput = document.getElementById('input-file2');
        const imagePreview = document.getElementById('image-preview');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    <!-- JAVASCRIPTS -->
</body>

</html>
