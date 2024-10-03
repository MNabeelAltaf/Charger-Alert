<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth" dir="ltr">

@include('components.Header')

<body class="font-urbanist text-base text-black dark:text-white dark:bg-slate-900">
    <!-- Loader Start -->
    @include('components.Loader')
    <!-- Loader End -->

    <span
        class="fixed blur-[200px] w-[600px] h-[600px] rounded-full top-1/2 start-1/2 ltr:-translate-x-1/2 rtl:translate-x-1/2 -translate-y-1/2 bg-gradient-to-tl from-red-600/20 to-violet-600/20 dark:from-red-600/40 dark:to-violet-600/40"></span>

    <!-- Start Navbar -->
    @include('components.Navbar')
    <!-- End Navbar -->




    <section class="relative md:py-24 py-16">
        <div class="container">

            <div class="flex flex-col items-center">
                <h3 class="md:text-[30px] text-[26px] font-semibold text-center">Discover Items</h3>
                <div class="w-full flex justify-end">
                    <p class="text-right">
                        <a href="{{ route('add_new_animation') }}"
                            class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full">
                            Add New Animation
                        </a>
                    </p>
                </div>
            </div>

            <br>

            <br>
            <div class="flex flex-col items-center">
                <h3>Categories</h3>
            </div>
            <br>

            <br>


            <!--end grid-->
            {{-- all categories --}}
            <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-10 gap-[30px]">
                @foreach ($all_categories as $categories)
                    <div
                        class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 h-80 flex flex-col">

                        <a href="{{ route('category_animations', ['category_id' => $categories->id]) }}">
                            <div class="relative flex-grow overflow-hidden h-4/5">
                                <img src="{{ url('storage') . '/' . $categories->thumb }}"
                                    class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500 h-full w-full object-cover"
                                    alt="">
                            </div>


                            <div class="flex-none h-1/5 mt-2">
                                <div class="my-3">
                                    <a href="#" class="font-semibold hover:text-violet-600">
                                        {{ $categories->name }}
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!--end grid-->


            <div class="grid grid-cols-1 mt-6">
                <div class="text-center">
                    {{-- pagination --}}
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section> <!--end section-->
    <!-- End -->

    <!-- Start Footer -->
    @include('components.Footer')
    <!-- End Footer -->
    <!-- Switcher -->
    @include('components.Switcher')


    <!-- Back to top -->
    @include('components.BacktoTop')
    <!-- Back to top -->

    @include('components.JSFiles')

</body>

</html>
