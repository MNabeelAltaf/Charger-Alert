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
        $existingPriorities = array_column($priority_added_category, 'priority_value'); // id's of added items
        $availablePriorities = array_filter(range(1, $all_categories_count), function ($number) use (
            $existingPriorities,
        ) {
            return !in_array($number, $existingPriorities);
        });
    @endphp
    <!-- End Navbar -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="grid md:grid-cols-12 gap-[30px]">
                <div class="lg:col-span-12 md:col-span-12">
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                        <h3 class="md:text-[30px] text-[26px] font-semibold text-center mb-4">Set Priority</h3>
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
                                        <!-- Category Dropdown -->
                                        <div>
                                            <label class="form-label font-medium">Category<span
                                                    class="text-red-600">*</span></label>
                                            <select name="category" required
                                                class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2">

                                                <option value="" disabled selected>Select a Category</option>
                                                @foreach ($filtered_categories as $index => $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <!-- Priority Dropdown -->
                                        <div>
                                            <label class="form-label font-medium">Set Priority<span
                                                    class="text-red-600">*</span></label>

                                            <select name="priority_value" required
                                                class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2">
                                                <option value="" disabled selected>Select Priority of category
                                                </option>
                                                @if (!empty($filtered_categories))
                                                    @foreach ($availablePriorities as $priority)
                                                        <option value="{{ $priority }}">{{ $priority }}
                                                        </option>
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
                        <h3 class="md:text-[30px] text-[26px] font-semibold text-center mb-4">Priority-wise Categories
                        </h3>
                        <br>
                        @php
                            usort($priority_added_category, function ($a, $b) {
                                return $a['priority_value'] <=> $b['priority_value'];
                            });
                        @endphp

                        <div class="flex flex-col items-start space-y-8">

                            <table class="table-auto border-collapse border border-gray-300 w-full">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border border-gray-300 px-4 py-2 text-left">Priority Value</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Category Name</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                    @foreach ($priority_added_category as $category_names)
                                        @php
                                            $randomColor = sprintf('#%06X', mt_rand(0, 0xffffff));
                                        @endphp
                                        <br><br>
                                        <tr>
                                            <td class="border px-4 py-2 text-gray-600">
                                                #{{ $category_names['priority_value'] }}
                                            </td>

                                            <td class="border px-4 py-2">
                                                <a href="{{ route('category_animations', ['category_id' => $category_names['id']]) }}"
                                                    class="btn rounded-lg transition duration-300 ease-in-out hover:bg-opacity-80"
                                                    style="background-color: {{ $randomColor }}; border-color: {{ $randomColor }}; color: white;"
                                                    title="{{ $category_names['category_name'] }}">
                                                    {{ $category_names['category_name'] }}
                                                </a>
                                            </td>

                                            <td class="border  px-4 py-2">
                                                <form
                                                    action="{{ route('deletePriority', ['category_id' => $category_names['id']]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to reset priority?');">
                                                    @csrf
                                                    <button type="submit"
                                                        class="flex items-center justify-center bg-red-600 text-white rounded border-2 border-red-500 px-4 py-2">
                                                        <p>Reset Priority</p>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
