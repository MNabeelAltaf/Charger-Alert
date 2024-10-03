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


    {{-- Modal for confirmation for deletion --}}
    <div id="deleteConfirmationModal" class="hidden fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
            <div class="fixed inset-0 bg-gray-500 opacity-75 dark:bg-gray-800 pointer-events-none"></div>
            <div
                class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-lg dark:bg-gray-900">
                <h3 class="text-lg font-medium leading-6 text-gray-500 dark:text-gray-400" id="modal-title">Confirm
                    Deletion</h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Are you sure you want to delete this animation?
                    </p>
                </div>
                <div class="mt-4 flex justify-end space-x-2">
                    <button type="button"
                        class="btn rounded-full text-gray-500 dark:text-gray-400 border-violet-600 hover:border-violet-700"
                        data-modal-toggle="deleteConfirmationModal" onclick="toggleModal(false)">
                        Cancel
                    </button>
                    &nbsp;
                    &nbsp;
                    <form action="{{ route('delete_animation', ['animation_id' => $resource->id]) }}" method="POST"
                        class="inline">
                        @csrf
                        <button type="submit"
                            class="btn rounded-full bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white dark:bg-red-500 dark:hover:bg-red-600">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Navbar -->

    @include('components.Navbar')


    @php
        $thumb = url('storage') . '/' . $resource->thumbnail;
        $anim = url('storage') . '/' . $resource->path;

        $extension = pathinfo($resource->path, PATHINFO_EXTENSION);

    @endphp

    <!-- Start -->

    <section class="relative pt-28 md:pb-24 pb-16">
        <div class="container">
            <div class="grid grid-cols-12 gap-6">
                <!-- Main Content: col-span-12 for full-width -->
                <div class="col-span-12">
                    <h5 class="md:text-2xl text-xl font-semibold text-center">{{ $resource->name }}</h5>
                    <br>
                    <br>
                    <span class="font-medium text-slate-400 block mt-2">Category:
                        <a href="#" class="text-violet-600">{{ $category->name }}</a>
                    </span>
                    <span class="font-medium text-slate-400 block mt-2">Animation type:
                        <a href="#" class="text-violet-600">{{ $resource->animation_type }}</a>
                    </span>

                    <!-- Two Columns for Video and Thumbnail -->


                    <div class="grid grid-cols-12 gap-6 mt-16">
                        <!-- Video Section: col-span-6 -->
                        <div class="col-span-12 lg:col-span-6">
                            <p class="mb-4">Animation</p>
                            <div
                                class="bg-gray-50 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 p-4 h-64 flex justify-center items-center">
                                @if ($extension != 'json')
                                    <video src="{{ $anim }}"
                                        class="rounded-md shadow dark:shadow-gray-700 w-64 h-64 object-cover" controls>
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <div id="lottie-animation" style="width: 256px; height: 256px;"></div>
                                @endif
                            </div>
                        </div>

                        <!-- Thumbnail Section: col-span-6 -->
                        <div class="col-span-12 lg:col-span-6">
                            <p class="mb-4">Thumbnail</p>
                            <div
                                class="bg-gray-50 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 p-4 h-64 flex justify-center items-center">
                                <img src="{{ $thumb }}"
                                    class="rounded-md shadow dark:shadow-gray-700 w-64 h-64 object-cover"
                                    alt="Thumbnail">
                            </div>
                        </div>
                    </div>
                    <br>


                    <!-- Buttons Section -->

                    <div class="mt-6 flex justify-start items-center space-x-4">
                        <!-- Edit Button -->
                        {{-- <div class="p-4 bg-gray-50 dark:bg-slate-900 rounded-md">
                            <form action="{{ route('edit_item', ['item_id' => $resource->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="btn rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                                    Edit
                                </button>
                            </form>
                        </div> --}}
                        &nbsp;
                        &nbsp;

                        <!-- Delete Button -->
                        <button type="button" data-modal-toggle="deleteConfirmationModal"
                            class="btn rounded-full bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white">
                            <i class="mdi mdi-bin"></i> Delete
                        </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.1/lottie.min.js"></script>
    <script>
        const animation = lottie.loadAnimation({
            container: document.getElementById('lottie-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: @json($anim)
        });
    </script>
    <!-- JAVASCRIPTS -->
</body>

</html>
