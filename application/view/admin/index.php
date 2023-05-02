<main class="w-full bg-[#F8F8FA]">
    <div class="px-8 py-16 mx-auto max-w-7xl">
        <div class="w-full flex justify-between mb-4">
            <h1 class="text-3xl font-bold mb-12" id="explore">All posts</h1>
            <div>
            <a href="<?php echo URL ?>admin/post" class="bg-gradient-to-r from-[#F49867] via-[#D884A2] via-40% to-[#AE67FA]  text-white rounded-md px-10 py-3 text-base font-medium" >New Event</a>
            </div>

        </div>
        <div class="static grid grid-cols-3 grid-flow-row gap-8 px-20  ">
            <?php foreach ($events as $event) { ?>
                        <div class="max-w-sm rounded-lg overflow-hidden shadow-lg pb-4 relative ">
                    
                            <img class="w-full" src="<?php echo (URL . 'uploads/' . $event->image); ?>"
                            alt="event-img" />
                            <a href="#">
                                        <div
                                            class=" absolute w-[2.5rem] h-[2.5rem] rounded-full bg-white  top-3 right-3 flex justify-center items-center">
                                            <img  alt="edit-icon" />
                                        </div>
                                    </a>
                            <a href="<?php echo URL . "details?id=" . $event->id ?>">
                            <div class="px-6 py-4 flex">
                                <div class=" px-2  basis-1/5 flex flex-col justify-left items-center">
                                    <p class="font-semibold text-base text-[#6C63FF] mb-2"><?php echo strtoupper((substr(Helper::getMonthFromDate($event->date), 0, 3))) ?></p>
                                    <p class="font-semibold text-base display-block "><?php echo (explode("-", $event->date)[2]) ?></p>
                                </div>
                                <div class="basis-4/5 justify-left">
                                    <p class="text-medium font-medium mb-2"><?php echo $event->nom ?>  </p>
                                    <p class="text-regular text-gray-400"> <?php echo substr($event->description, 0, 50) . '...' ?>  <span class="text-regular text-[#6C63FF]">more</span> </p>
                                </div>
                            </div>
                        </a> 
                        </div>
            <?php } ?>
        </div>
        <div class="flex w-full justify-center items-center mt-12">
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    <a href="#"
                        class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                        class="z-10 px-3 py-2 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</main>