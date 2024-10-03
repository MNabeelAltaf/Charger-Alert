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


                                    <div class="flex items-center space-x-3">
                                        <label class="form-label font-medium">Thumbnail<span
                                                class="text-red-600">*</span></label>
                                        <input type="file" id="input-file2" name="thumbnail" accept="image/*"
                                            value="{{ $thumb }}"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-400 transition duration-200 ease-in-out file:bg-gray-200 file:rounded-lg file:px-4 file:py-2 file:border-none file:cursor-pointer file:hover:bg-gray-300 dark:file:bg-gray-700 dark:file:hover:bg-gray-600">



                                        {{-- @if (isset($thumb))
                                            <div class="w-[25px] h-[25px] flex items-center justify-center bg-red-500">
                                                <!-- Container with fixed size -->
                                                <img src="{{ $thumb }}" alt="Thumbnail"
                                                    class="w-full h-full object-cover rounded border border-gray-300">
                                            </div>
                                        @endif --}}
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

                                        {{-- <video src="{{ $anim }}"></video> --}}

                                    </div>
                                    <br>
                                    <div class="flex items-center space-x-3">
                                        <label class="form-label font-medium">Animation<span
                                                class="text-red-600">*</span></label>
                                        <input type="file" id="input-file" name="path" accept="video/*"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-400 transition duration-200 ease-in-out file:bg-gray-200 file:rounded-lg file:px-4 file:py-2 file:border-none file:cursor-pointer file:hover:bg-gray-300 dark:file:bg-gray-700 dark:file:hover:bg-gray-600" />
                                    </div>

                                    <p style="display:none" name = "item_id" value="{{  $resource->id }}"></p>
                                    <br>
                                </div>

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
    <!-- JAVASCRIPTS -->
</body>

</html>
