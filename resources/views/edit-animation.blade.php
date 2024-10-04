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
        $thumb = url('storage') . '/' . $resource->thumbnail;
        $anim = url('storage') . '/' . $resource->path;
    @endphp



    <!-- End Navbar -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="grid md:grid-cols-12 gap-[30px]">
                <div class="lg:col-span-12 md:col-span-12">
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                        <h3 class="md:text-[30px] text-[26px] font-semibold text-center mb-4">Edit Animation</h3>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="">


                            <form action="{{ route('edit_animation') }}" method="POST" enctype="multipart/form-data"
                                class="py-6">

                                @method('PUT')

                                @csrf

                                <div class="space-y-5">
                                    <div>
                                        <label class="form-label font-medium">Title<span
                                                class="text-red-600">*</span></label>
                                        <input type="text"
                                            class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2"
                                            placeholder="Name:" id="name" name="name"
                                            value="{{ old('name', $resource->name) }}" required>
                                    </div>
                                    <br>


                                    <div class="space-x-3">
                                        <label class="form-label font-medium">Thumbnail<span
                                                class="text-red-600">*</span></label>
                                        <input type="file" id="input-file2" name="thumbnail" accept="image/*"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-400 transition duration-200 ease-in-out file:bg-gray-200 file:rounded-lg file:px-4 file:py-2 file:border-none file:cursor-pointer file:hover:bg-gray-300 dark:file:bg-gray-700 dark:file:hover:bg-gray-600"
                                            onchange="previewImage(event)">
                                    </div>
                                    <br>

                                    <div class="">
                                        @if (isset($thumb))
                                            <div class="w-[60px] h-[60px] bg-red-500">
                                                <img id="thumbnail-preview"
                                                    class="h-14 w-14 object-cover rounded border border-gray-300"
                                                    src="{{ $thumb }}" alt="Thumbnail">
                                            </div>
                                        @else
                                            <div id="thumbnail-preview-container" class="w-[60px] h-[60px] hidden">

                                                <img id="thumbnail-preview"
                                                    class="h-14 w-14 object-cover rounded border border-gray-300"
                                                    alt="Thumbnail">
                                            </div>
                                        @endif
                                    </div>

                                    <br>
                                    <br>
                                    <div>
                                        <label class="form-label font-medium">Category<span
                                                class="text-red-600">*</span></label>
                                        <select id="category" name="category" required
                                            class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2">
                                            <option value="" disabled>Select a category</option>
                                            @foreach ($categories as $cats)
                                                <option value="{{ $cats->id }}"
                                                    {{ $cats->id == $category->id ? 'selected' : '' }}>
                                                    {{ $cats->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <br>
                                    <div>
                                        <label class="form-label font-medium">Animation Type<span
                                                class="text-red-600">*</span></label>
                                        <select name="animation_type" required
                                            class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-full outline-none border border-gray-200 focus:border-violet-600 dark:border-gray-800 dark:focus:border-violet-600 focus:ring-0 mt-2">
                                            <option value="Video"
                                                {{ $resource->animation_type == 'Video' ? 'selected' : '' }}>Video
                                            </option>
                                            <option value="Lottie"
                                                {{ $resource->animation_type == 'Lottie' ? 'selected' : '' }}>Lottie
                                            </option>
                                        </select>
                                    </div>
                                    <br>

                                    <div class="flex items-center space-x-3">
                                        <label class="form-label font-medium">Animation<span
                                                class="text-red-600">*</span></label>
                                        @if ($resource->animation_type == 'Video')
                                            <input type="file" id="input-file" name="path"
                                                accept=".mp4, .avi, .mov, .flv, .webm"
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-400 transition duration-200 ease-in-out file:bg-gray-200 file:rounded-lg file:px-4 file:py-2 file:border-none file:cursor-pointer file:hover:bg-gray-300 dark:file:bg-gray-700 dark:file:hover:bg-gray-600" />
                                        @elseif ($resource->animation_type == 'Lottie')
                                            <input type="file" id="input-file" name="path" accept=".json"
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-400 transition duration-200 ease-in-out file:bg-gray-200 file:rounded-lg file:px-4 file:py-2 file:border-none file:cursor-pointer file:hover:bg-gray-300 dark:file:bg-gray-700 dark:file:hover:bg-gray-600" />
                                        @endif
                                    </div>

                                    <br>

                                    @if ($resource->animation_type == 'Video')
                                        <div id="video-preview" class="h-16 w-16 my-5 mb-2">
                                            <video src="{{ asset($anim) }}" controls
                                                class="rounded-md shadow dark:shadow-gray-700 w-48 h-48"></video>
                                        </div>
                                        <br>
                                    @elseif ($resource->animation_type == 'Lottie')
                                        <div id="lottie-preview" style="width: 256px; height: 256px;"></div>
                                    @endif

                                    <input style="display:none" name = "item_id" value="{{ $resource->id }}" />
                                    <br>
                                </div>
                                <br>
                                <br>
                                <br>

                                <div class="flex justify-end">
                                    <input type="submit" id="submit" name="send"
                                        class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full mt-5 "
                                        value="Update">
                                </div>
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
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('thumbnail-preview');
            const previewContainer = document.getElementById('thumbnail-preview-container');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden'); // Show the preview container
                }

                reader.readAsDataURL(file);
            }
        }
    </script>


    {{-- lottie --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>
    <script>
        // Function to display the initial preview
        function showInitialPreview() {
            const previewVideo = document.getElementById('video-preview');
            const lottiePreview = document.getElementById('lottie-preview');

            if (previewVideo) {
                previewVideo.classList.remove('hidden');
            }

            if (lottiePreview) {
                lottiePreview.classList.remove('hidden');
                lottie.loadAnimation({
                    container: lottiePreview, // the DOM element that will contain the animation
                    renderer: 'svg', // 'svg', 'canvas', 'html'
                    loop: true, // loop
                    autoplay: true, // autoplay
                    path: '{{ asset($anim) }}' // the path to the animation json
                });
            }
        }

        // Add event listener to the file input
        document.getElementById('input-file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewVideo = document.getElementById('video-preview');
            const videoElement = previewVideo ? previewVideo.querySelector('video') : null;
            const lottiePreview = document.getElementById('lottie-preview');

            // Reset visibility and remove previous sources
            if (previewVideo) {
                videoElement.src = ""; // Clear previous video source
                previewVideo.classList.add('hidden');
            }
            if (lottiePreview) {
                lottiePreview.innerHTML = ""; // Clear previous Lottie container content
                lottiePreview.classList.add('hidden');
            }

            if (file) {
                const fileType = file.type;

                if (fileType.startsWith('video/')) {
                    // Preview video
                    const videoURL = URL.createObjectURL(file);
                    if (videoElement) {
                        videoElement.src = videoURL;
                        previewVideo.classList.remove('hidden');
                    }
                } else if (fileType === 'application/json') {
                    // Preview Lottie animation
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const animationData = JSON.parse(e.target.result);
                        lottiePreview.classList.remove('hidden');
                        lottie.loadAnimation({
                            container: lottiePreview, // the DOM element that will contain the animation
                            renderer: 'svg', // 'svg', 'canvas', 'html'
                            loop: true, // loop
                            autoplay: true, // autoplay
                            animationData: animationData // the path to the animation json
                        });
                    };
                    reader.readAsText(file);
                }
            }
        });

        // Call the function to show the initial preview on page load
        showInitialPreview();
    </script>




    <!-- JAVASCRIPTS -->
</body>

</html>
