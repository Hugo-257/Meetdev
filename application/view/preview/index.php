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
        <?php foreach ($events as $event) { ?>
                        <div class="max-w-sm rounded-lg overflow-hidden shadow-lg pb-4 relative ">
                            <img class="w-full" src="<?php echo (URL . 'uploads/' . $event->image); ?>"
                                alt="event-img" />
                            <a href="<?php echo URL . 'myspace/' . (in_array($event->id, $favorites) ? 'remove?id=' : 'save?id=') . $event->id; ?>">
                                <div
                                    class=" absolute w-[2.5rem] h-[2.5rem] rounded-full bg-white  top-3 right-3 flex justify-center items-center">
                                    <img src="<?php echo URL . 'img/' . (in_array($event->id, $favorites) ? 'saved_icon.png' : 'save_icon.png') ; ?>" alt="save-icon" />
                                </div>
                            </a>
                            <a href="<?php echo URL . "details?id=" . $event->id ?>">

                                <div class="px-6 py-4 flex">
                                    <div class=" px-2  basis-1/5 flex flex-col justify-left items-center">
                                        <p class="font-semibold text-base text-[#6C63FF] mb-2"><?php echo (substr(Helper::getMonthFromDate($event->date), 0, 3)) ?></p>
                                        <p class="font-semibold text-base display-block "><?php echo (explode("-", $event->date)[2]) ?></p>
                                    </div>
                                    <div class="basis-4/5 justify-left">
                                        <p class="text-medium font-medium mb-2"> <?php echo $event->nom ?> </p>
                                        <p class="text-regular text-gray-400"> <?php echo substr($event->description, 0, 50) . '...' ?> <span class="text-regular text-[#6C63FF]">more</span> </p>
                                    </div>
                                </div>
                            </a>

                        </div>
            <?php } ?>
        </div>
    </div>
</main>