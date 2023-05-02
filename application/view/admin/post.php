<main class="">
    <div class="px-8 py-16 mx-auto max-w-7xl">
        <div class="w-full flex justify-between mb-4">
            <h1 class="text-3xl font-bold mb-4" id="explore"><?php echo(isset($event) ? 'Edit event' : 'New event') ?></h1>
        </div>
        <div>
            <form action="<?php echo ( URL . ($action=="post" ? 'admin/createEvent' :  'admin/saveUpdate')) ;?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php  echo(isset($event) ? $event->id : '') ?>" /> 
            <?php if(isset($event)) {?>
                <div
                    class="w-3/5 h-[25em]  mb-6  bg-cover bg-[url('<?php echo (URL . 'uploads/' . $event->image); ?>')]">
                </div>
            <?php }?>
            
                <div class="w-1/4 mb-4">
                    <label for="nom" class="block text-sm font-regular leading-6 text-gray-900">Nom de
                        l'évenement</label>
                    <div class="mt-2">
                        <input id="name" name="nom" required value="<?php echo(isset($event) ? $event->nom : '') ?>"
                            class="block w-full rounded-md border-0 px-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="w-1/4 mb-4">
                    <label for="place" class="block text-sm font-regular leading-6 text-gray-900">Place de l'évenement</label>
                    <div class="mt-2">
                        <input id="place" name="place" required value="<?php echo(isset($event) ? $event->place : '' ) ?>"
                            class="block w-full rounded-md border-0 px-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="w-3/4 mb-4">
                    <label for="description"
                        class="block mb-2 text-sm font-regular text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" rows="6 " name="description" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Description of the event"><?php echo (isset($event) ? $event->description : '' )?></textarea>
                </div>

                <div class="flex justify-between w-3/4">
                    <div>
                        <label class="block text-sm font-regular leading-6 text-gray-900">Date</label>
                        <div class="relative mb-3" data-te-datepicker-init 
                            data-te-input-wrapper-init>
                            <input type="text" id="myDatepicker" name="date" required
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                placeholder="Select a date" />
                            <label for="floatingInput"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Select
                                a date</label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-regular leading-6 text-gray-900">Heure Début</label>
                        <div class="relative" data-te-timepicker-init data-te-input-wrapper-init>
                            <input type="text" name="debut" required
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="form1" />
                            <label for="form1"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Select
                                a time</label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-regular leading-6 text-gray-900">Heure Fin</label>
                        <div class="relative" data-te-timepicker-init data-te-input-wrapper-init>
                            <input type="text" name="fin" required
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="form1" />
                            <label for="form1"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Select
                                a time</label>
                        </div>
                    </div>
                </div>

                <div class="w-1/3 mb-5">
                    <div >
                        <label for="formFile" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">Image
                            banner</label>
                        <div class="flex" >
                        <input
                            name="image" required
                            class="relative  mr-4 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                            type="file" id="formFile" />    
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <input type="submit" name="<?php echo (isset($event) ? 'updateEvent' : 'addEvent' )?>"  value="Post event" class="bg-white text-black border border-black rounded-md px-8 py-2 text-sm font-normal hover:cursor-pointer">
                    <!-- <input type="submit" value="Delete event" class="bg-red-600 text-white rounded-md px-8 py-2 text-sm font-normal hover:cursor-pointer"> -->
            </div>
            </form>
        </div>
    </div>
</main>