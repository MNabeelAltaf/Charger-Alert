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
                <h3 class="md:text-[30px] text-[26px] font-semibold text-center">{{ $category_name }} <br> Animations
                </h3>
            </div>

            <form action="{{ route('move_animations') }}" id="moveAnimationsForm" method="POST">
                @csrf
                {{-- Move Category Code --}}
                <div class="flex flex-row justify-end items-end">
                    <div>
                        <select name="category" required
                            class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2">
                            <option value="" disabled selected>Select a Category</option>
                            @foreach ($all_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div>
                        <input type="submit" id="submit" name=""
                            class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full "
                            value="Move">
                    </div>
                </div>

                {{-- All Animations --}}
                <div id="animation-grid"
                    class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-10 gap-[30px]">
                    @foreach ($animations as $anim)
                        <div data-id="{{ $anim->id }}"
                            class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 h-80 flex flex-col">

                            <div class="mt-2">
                                <input type="checkbox" name="selected_animations[]" value="{{ $anim->id }}"
                                    class="checkbox ml-2">
                            </div>

                            <!-- Image and Name Section (Clickable Area) -->
                            <a href="{{ route('view_animation', ['animation_id' => $anim->id]) }}">
                                <div class="relative flex-grow overflow-hidden h-4/5">
                                    <img src="{{ url('storage') . '/' . $anim->thumbnail }}"
                                        class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500 h-full w-full object-cover"
                                        alt="">
                                </div>

                                <div class="flex-none h-1/5 mt-2">
                                    <div class="my-5">
                                        {{-- <a href="#"
                                            class="font-semibold hover:text-violet-600">{{ $anim->name }}</a> --}}
                                    </div>
                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>
            </form>


            <br>

            @if (!$animations->isEmpty())
                <div class="bg-red-500">
                    <div class="inline-flex space-x-1">
                        {{ $animations->withQueryString()->links('pagination::tailwind') }}
                    </div>
                </div>
            @endif

            <br>
            <br>

            <!--end grid-->
        </div>


        <!--end container-->
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


    {{-- dragable --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const grid = document.getElementById("animation-grid");

            const sortable = new Sortable(grid, {
                animation: 150,
                onEnd: function(evt) {
                    const items = Array.from(grid.children);
                    const order = items.map((item) => item.getAttribute("data-id"));



                    fetch('{{ route('update_animation_order') }}', {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                            body: JSON.stringify({
                                order: order
                            }),
                        })
                        .then((response) => response.json())
                        .then((data) => {

                            console.log(data);


                            if (data.success) {
                                // Swal.fire({
                                //     title: "Success!",
                                //     icon: "success",
                                //     draggable: true
                                // });
                            } else {
                                console.error("Failed to update order:", data.message);
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: "Error in order updation",
                                });
                            }
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                            Swal.fire({
                                icon: "error",
                                title: "Fail",
                                text: "Fail to update order",
                            });
                        });
                },
            });


            // move animation
            const checkboxes = document.querySelectorAll('.checkbox');
            const selectAllCheckbox = document.querySelector('#select-all');

            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    checkboxes.forEach((checkbox) => {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                });
            }


        });
    </script>



</body>

</html>
