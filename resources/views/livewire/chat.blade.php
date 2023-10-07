<section class="py-6 bg-white sm:py-16 lg:py-20 h-auto sm:h-screen">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl h-full">
        <div class="flex flex-col sm:grid grid-cols-1 gap-y-8 lg:grid-cols-7 lg:gap-x-12 h-full ">
            <div class="lg:col-span-3">
                <div class="flex items-center gap-4 justify-between">
                    <p class="text-xl font-bold text-gray-900">Your chats</p>
                    
                </div>

                <div class="mt-6 space-y-5">
                    <div class="relative overflow-hidden transition-all duration-200 bg-white border border-gray-200 rounded-lg hover:shadow-lg hover:bg-gray-50 hover:-translate-y-1">
                        <div class="p-2 sm:p-4">
                            <div class="flex items-start">
                                <img class="object-cover w-20 h-20 rounded-lg shrink-0" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/sidebar-popular-posts/2/thumbnail-1.png" alt="" />
                                <div class="ml-5 w-full flex flex-col gap-2">
                                    <div class="flex items-start sm:items-center justify-between gap-0 sm:gap-4 w-full flex-col sm:flex-row">
                                        <p class="text-md leading-7 font-bold text-gray-900">
                                            <a href="#" title="" class=" leading-3">
                                                Andy Leverenz
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                            </a>
                                        </p>
                                        <p class="text-sm font-medium text-gray-900 flex items-center gap-3">07.10.23 <span class="font-bold">18:38</span></p>
                                    </div>

                                    <p class="text-sm font-medium text-gray-500 line-clamp-2">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta, facere sint. Obcaecati rem in fuga ratione officiis consequatur ab, dolor vero cumque ullam ipsum, itaque, accusantium et id quam quasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 space-y-5">
                    <div class="relative overflow-hidden transition-all duration-200 bg-white border border-gray-200 rounded-lg hover:shadow-lg hover:bg-gray-50 hover:-translate-y-1">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="grid grid-cols-2 gap-2 w-24 h-20">
                                    <img class="object-cover w-full h-full rounded-lg shrink-0" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/sidebar-popular-posts/2/thumbnail-1.png" alt="" />
                                    <img class="object-cover w-full h-full rounded-lg shrink-0" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/sidebar-popular-posts/2/thumbnail-1.png" alt="" />
                                    <img class="object-cover w-full h-full rounded-lg shrink-0" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/sidebar-popular-posts/2/thumbnail-1.png" alt="" />
                                    <div class="w-full h-full rounded-lg bg-gray-200 text-gray-900 flex items-center justify-center">
                                        +5
                                    </div>
                                </div>
                                <div class="ml-5 w-full flex flex-col gap-2">
                                    <div class="flex items-start sm:items-center justify-between gap-0 sm:gap-4 w-full flex-col sm:flex-row">
                                        <p class="text-md leading-7 font-bold text-gray-900">
                                            <a href="#" title="" class=" leading-3">
                                                Andy Leverenz
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                            </a>
                                        </p>
                                        <p class="text-sm font-medium text-gray-900 flex items-center gap-3">07.10.23 <span class="font-bold">18:38</span></p>
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

            <div class="bg-gray-100 lg:col-span-4 rounded-xl p-2 sm:p-6 sm:pb-4 relative flex flex-col justify-between overflow-auto order-first sm:order-last h-[80vh] sm:h-auto">
                <ul class="space-y-5">
                    
                    <li class="flex gap-x-2 sm:gap-x-4">
                        <img class="object-cover h-[2rem] w-[2rem] sm:h-[2.375rem] sm:w-[2.375rem] rounded-full shrink-0" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/sidebar-popular-posts/2/thumbnail-1.png" alt="" />
                
                        <div class="bg-white border border-gray-200 rounded-lg p-2 sm:px-4 space-y-3 text-xs sm:text-sm">
                            How can O help you?
                        </div>
                    </li>
       

                    @for ($i =0;$i<20;$i++)
                    <li class="max-w-2xl ml-auto flex justify-end gap-x-2 sm:gap-x-4">
                        <div class="grow text-end space-y-3">
                            <div class="inline-block bg-amber-600 rounded-lg p-2 sm:px-4 shadow-sm">
                                <p class="text-xs sm:text-sm text-white">
                                what's preline ui?
                                </p>
                            </div>
                        </div>
                
                        <span class="flex-shrink-0 inline-flex items-center justify-center h-[2rem] w-[2rem] sm:h-[2.375rem] sm:w-[2.375rem] rounded-full bg-gray-200">
                            <span class="text-sm font-medium text-gray-500 leading-none uppercase">AZ</span>
                        </span>
                    </li>
                    @endfor
                </ul>

                <footer class="max-w-4xl mx-auto w-full mt-8 sticky bottom-0 border-2 border-gray-200 rounded-lg">
                    <div class="relative">
                        <textarea class="p-2 sm:p-4 pb-8 sm:pb-12 block w-full bg-white rounded-lg text-sm outline-0 focus:outline-1 focus:outline-amber-500 focus:ring-amber-500" placeholder="Write a new message..."></textarea>
                        <div class="absolute bottom-px m-2 right-0 rounded-b-lg bg-white w-max">
                            <div class="flex justify-between items-center">
                                <div>

                                </div>

                                <div class="flex items-center gap-x-1">

        
                                    <button type="button" class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-white bg-amber-600 hover:bg-amber-500 focus:z-10 focus:outline-none focus:ring-2 focus:ring-amber-500 transition-all">
                                        <svg class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                                        </svg>
                                    </button>
                        
                                </div>

                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</section>