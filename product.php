<?php include('./template/header.php'); ?>
<?php include('./template/sidebar.php'); ?>
<section class=" max-w-[800px] flex flex-col items-end ">

    <div class=" ">
        <a href="./product-create.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Product</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-4 pl-6 w-full">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rating
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php include('./template/footer.php'); ?>

                <?php
                $productFolder = "products";
                $products = array_filter(scandir($productFolder), fn($el) => $el !== "." && $el !== "..");

                foreach ($products as $product): {
                        $data = file_get_contents($productFolder . "/" . $product);
                        $obj = json_decode($data);
                    }
                ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full object-cover" src="<?= $obj->product_image ?>" alt="">
                        </th>
                        <td class="px-6 py-4">
                            <?= $obj->product_name ?>
                        </td>
                        <td class="px-6 py-4">
                            $<?= $obj->price ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-1">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-4 <?php echo $i <= $obj->product_rating ? "fill-yellow-400" : "fill-gray-300"; ?>">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                    </svg>


                                <?php endfor; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="./product-delete.php?file_name=<?= $product ?>" class="font-medium text-red-600 dark:text-red-500 ">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</section>