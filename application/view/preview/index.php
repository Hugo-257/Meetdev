<main class="w-full bg-[#F8F8FA]">
    <div class="px-8 py-16 mx-auto max-w-7xl">
        <div class="w-full flex justify-between mb-4">
            <h1 class="text-3xl font-bold mb-12" id="explore">Events</h1>
            <div>
                <form action="<?php echo URL?>preview?option=search" method="post" class="flex space-x-4">
                    <select name="sort" placeholder="Sort by"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-28 p-2.5 pl-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected class="text-gray-300">Sort by</option>
                        <option value="date">Date</option>
                        <option value="name">Name</option>
                    </select>
                    <input name="search" type="" placeholder="Search text"
                        class=" w-[18rem] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <input type="submit" value="Find"   class="bg-white text-black border border-black rounded-md px-6 py-2 text-sm font-normal mr-4 hover:cursor-pointer" />
                </form>
            </div>
        </div>
        <div class="static grid grid-cols-3 grid-flow-row gap-8 px-20  ">
            <?php for ($i = 1; $i <= 6; $i++) { ?>
            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg pb-4">
                <img class="w-full" src="<?php echo URL; ?>img/ben-griffiths-gAe1pHGc6ms-unsplash.jpg"
                    alt="event-img" />
                <div class="px-6 py-4 flex">
                    <div class=" px-2  basis-1/5 flex flex-col justify-left items-center">
                        <p class="font-semibold text-base text-[#6C63FF] mb-2"><?php echo (substr(Helper::getMonthFromDate($event->date), 0, 3)) ?></p>
                        <p class="font-semibold text-base display-block ">15</p>
                    </div>
                    <div class="basis-4/5 justify-left">
                        <p class="text-medium font-medium mb-2"> PHP : Did it die? What’s next ! </p>
                        <p class="text-regular text-gray-400"> It is a long established fact that a reader will be
                            distracted by ... <span class="text-regular text-[#6C63FF]">more</span> </p>
                    </div>
                </div>
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