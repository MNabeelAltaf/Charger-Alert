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
        $existingPriorities = array_column($priority_added_category, 'priority_value');
    @endphp
    <!-- End Navbar -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="grid md:grid-cols-12 gap-[30px]">
                <div class="lg:col-span-12 md:col-span-12">
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                        <h3 class="md:text-[30px] text-[26px] font-semibold text-center mb-4">Upcoming events</h3>
                        {{-- <p class="md:text-[10px] text-[16px] font-semibold text-center mb-4"><span>Add Event</span></p> --}}
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="">

                            <form action="{{ route('setPriority') }}" method="POST" enctype="multipart/form-data"
                                class="py-6">
                                @csrf
                                <div class="space-y-5">

                                    <div class="grid grid-cols-2 gap-4">
                                        <!-- Priority Dropdown -->
                                        <div>
                                            <label class="form-label font-medium">Category<span
                                                    class="text-red-600">*</span></label>
                                            <select name="category" required
                                                class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2">

                                                <option value="" disabled selected>Select a Category</option>
                                                <!-- Placeholder option -->

                                                @foreach ($filtered_categories as $index => $category)
                                                    @if ($index != 0)
                                                        <!-- Exclude index 0 -->
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>


                                        <!-- Category Dropdown -->
                                        <div>
                                            <label class="form-label font-medium">Set Priority<span
                                                    class="text-red-600">*</span></label>

                                            <select name="priority_value" required
                                                class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2">

                                                <option value="" disabled selected>Select Priority of category
                                                </option>

                                                @if (!empty($filtered_categories))
                                                    @foreach ($filtered_categories as $index => $priority)
                                                        @if ($index != 0 && !in_array($index, $existingPriorities))
                                                            <option value="{{ $index }}">{{ $index }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </select>

                                        </div>
                                    </div>

                                    <div>
                                        <input type="submit" id="submit" name="send"
                                            class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full mt-5"
                                            value="Set">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>



                @if ($priority_added_category && count($priority_added_category))
                    <div class="mx-6">
                        <h3 class="md:text-[30px] text-[26px] font-semibold text-center mb-4">Event-wise Categories</h3>
                        <br>

                        @php
                            usort($priority_added_category, function ($a, $b) {
                                return $a['priority_value'] <=> $b['priority_value'];
                            });
                        @endphp

                        <div class="flex flex-col items-start space-y-8"> <!-- Container for vertical alignment -->
                            @foreach ($priority_added_category as $category_names)
                                @php
                                    $randomColor = sprintf('#%06X', mt_rand(0, 0xffffff));
                                @endphp
                                <br><br>

                                <div class="flex items-center space-x-2">

                                    &nbsp;
                                    &nbsp;

                                    <span class="text-gray-600 ml-2">#{{ $category_names['priority_value'] }}</span>

                                    &nbsp;
                                    &nbsp;

                                    <a href="{{ route('category_animations', ['category_id' => $category_names['id']]) }}"
                                        class="btn rounded-lg transition duration-300 ease-in-out hover:bg-opacity-80"
                                        style="background-color: {{ $randomColor }}; border-color: {{ $randomColor }}; color: white;"
                                        title="{{ $category_names['category_name'] }}">
                                        {{ $category_names['category_name'] }}
                                    </a>
                                    &nbsp;
                                    &nbsp;

                                    <span
                                        class="flex items-center justify-center w-6 h-6 bg-red-600 border-2 text-white">
                                        <form
                                            action="{{ route('deletePriority', ['category_id' => $category_names['id']]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            <button type="submit" class="flex items-center justify-center">
                                                <i class="mdi mdi-delete" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </span>
                                </div>
                            @endforeach
                        </div>




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
