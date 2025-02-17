<?php include('./template/header.php'); ?>
<?php include('./template/sidebar.php'); ?>

<section>
    <div class=" max-w-sm p-6">
        <form action="./gallery-process.php" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="upload">Upload file</label>
                <input class="block p-2 w-full text-lg text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50  focus:outline-none dark:border-gray-600 " id="upload" name="upload[]" multiple type="file">
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Upload</button>

        </form>


        <hr>

        <?php
        $photos = array_filter(scandir("photos"), fn($el) => $el !== "." && $el !== "..");

        ?>
        <div class="mt-4 grid grid-cols-3 gap-4">
            <?php foreach ($photos as $photo): ?>
                <div class=" col-span-1 relative group">
                    <img src="photos/<?= $photo ?>" alt="" class="w-24">
                    <div class="absolute bottom-0 right-0 hidden group-hover:inline-block pointer-events-none group-hover:pointer-events-auto">
                    <a onclick="return confirm('Are you sure you want to delete this image?')" href="./gallery-delete-process.php?file_name=<?= $photo ?>" class="relative text-nowrap inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200   focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                        <span class="relative px-5 py-1 transition-all ease-in duration-75 bg-white  rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                            Delete
                        </span>
                    </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include('./template/footer.php'); ?>