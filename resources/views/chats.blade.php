@extends('layouts.main')

@section('content')

<section class="py-12 bg-white sm:py-16 lg:py-20">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-7 lg:gap-x-12">
            <div class="lg:col-span-3">
                <p class="text-xl font-bold text-gray-900">Your chats</p>

                <div class="mt-6 space-y-5">
                    <div class="relative overflow-hidden transition-all duration-200 bg-white border border-gray-200 rounded-lg hover:shadow-lg hover:bg-gray-50 hover:-translate-y-1">
                        <div class="p-4">
                            <div class="flex items-start">
                                <img class="object-cover w-20 h-20 rounded-lg shrink-0" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/sidebar-popular-posts/2/thumbnail-1.png" alt="" />
                                <div class="ml-5 w-full">
                                    <div class="flex items-center justify-between gap-4 w-full">
                                        <p class="text-md leading-7 font-bold text-gray-900">
                                            <a href="#" title="">
                                                Andy Leverenz
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                            </a>
                                        </p>
                                        <p class="text-sm font-medium text-gray-900">April 09, 2022</p>
                                    </div>

                                    <p class="text-sm font-medium text-gray-500 line-clamp-2">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta, facere sint. Obcaecati rem in fuga ratione officiis consequatur ab, dolor vero cumque ullam ipsum, itaque, accusantium et id quam quasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 lg:col-span-4 rounded-xl">
                <div class="px-4 py-5 sm:p-6 h-96"></div>
            </div>
        </div>
    </div>
</section>


@endsection