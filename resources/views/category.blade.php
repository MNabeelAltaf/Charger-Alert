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


    <!-- End Navbar -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="grid md:grid-cols-12 gap-[30px]">
                <div class="lg:col-span-12 md:col-span-12">
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                        <h3 class="md:text-[30px] text-[26px] font-semibold text-center mb-4">Add category</h3>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="">

                            <form action="{{ route('add_category') }}" method="POST" enctype="multipart/form-data"
                                class="py-6">
                                @csrf
                                <div class="space-y-5">
                                    <div>
                                        <label class="form-label font-medium">Name<span
                                                class="text-red-600">*</span></label>
                                        <input type="text"
                                            class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2 "
                                            placeholder="Category name:" id="category" name="category" required>
                                    </div>
                                    <br>

                                    {{-- <div>
                                        <label class="form-label font-medium">Thumbnail<span
                                                class="text-red-600">*</span></label>

                                        <input type="file" id="thumbnail" name="thumbnail" accept=".jpg,.jpeg,.png"
                                            placeholder="Category Thumbnail:"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-400 transition duration-200 ease-in-out file:bg-gray-200 file:rounded-lg file:px-4 file:py-2 file:border-none file:cursor-pointer file:hover:bg-gray-300 dark:file:bg-gray-700 dark:file:hover:bg-gray-600"
                                            required>

                                    </div> --}}

                                    <div>
                                        <input type="submit" id="submit" name="send"
                                            class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full mt-5"
                                            value="Add">
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>


                @if ($all_categories && $all_categories->count())
                    <div class="mx-6">
                        <h3 class="md:text-[30px] text-[26px] font-semibold text-center mb-4">All Categories</h3>
                        @foreach ($all_categories as $category_names)
                            @php
                                $randomColor = sprintf('#%06X', mt_rand(0, 0xffffff));
                            @endphp
                            <div class="relative inline-block">
                                <span
                                    class="absolute top-1 right-1 flex items-center justify-center w-6 h-6 bg-violet-600 rounded-full text-white">
                                    <a href="{{ route('edit_category_view', ['category_id' => $category_names->id]) }}"
                                        class="flex items-center justify-center">
                                        <i class="mdi mdi-pencil" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <a href="{{ route('category_animations', ['category_id' => $category_names->id]) }}"
                                    class="btn rounded-full mt-5 transition duration-300 ease-in-out hover:bg-opacity-80"
                                    style="background-color: {{ $randomColor }}; border-color: {{ $randomColor }}; color: white;"
                                    title="{{ $category_names->name }}">
                                    {{ $category_names->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="mx-6">
                        <h3 class="md:text-[30px] text-[26px] font-semibold text-center mb-4">No Categories Available
                        </h3>
                    </div>
                @endif




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
    <!-- JAVASCRIPTS -->
</body>

</html>
