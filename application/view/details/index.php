<main class="w-full bg-[#F8F8FA]">
    <div class="px-12 py-16 mx-auto max-w-6xl flex flex-col items-center">
        <div
            class="w-full  h-[30rem] rounded mb-20  bg-cover bg-[url('<?php echo URL . "uploads/" . $data["image"] ?>')]">
        </div>
        <div class="flex">
            <div class="basis-2/5">
                <h3 class="mb-4 font-bold text-md">Other events</h3>
                <?php foreach ($events as $otherEvent) { ?>
                    <a href="<?php echo URL . "details?id=" . $otherEvent->id ?>">
                        <div class="max-w-[70%] rounded-lg overflow-hidden shadow-lg mb-4">
                            <img class="w-full"  src="<?php echo (URL . 'uploads/' . $otherEvent->image); ?>"
                                alt="event-img" />
                            <div class="px-3 py-4 flex">
                                <div class="px-2  basis-1/5 flex flex-col justify-center items-center">
                                    <p class="font-semibold text-sm text-[#6C63FF]"><?php echo (substr(Helper::getMonthFromDate($event->date), 0, 3))?></p>
                                    <p class="font-semibold text-sm display-block "><?php echo (explode("-", $event->date)[2]) ?></p>
                                </div>
                                <div   class="flex flex-col justify-center items-center">
                                    <p class="text-sm font-regular mb-2"> <?php echo $event->nom ?>      </p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <div class="basis-3/5">
                <p class="mb-2 text-sm text-gray-500"><?php echo $data["timeIndication"] ?></p>
                <h3 class="mb-2 font-bold text-xl ">Topic : <?php echo $data["nom"] ?></h3>
                <p class="mb-4  text-sm text-gray-500">Place : <?php echo $data["place"]; ?></p>
                <p class="text-md text-gray-800 leading-6"><?php echo $data["description"]; ?></p>
            </div>
        </div>
    </div>
</main>