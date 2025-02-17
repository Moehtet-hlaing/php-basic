<?php include('./template/header.php'); ?>
<?php include('./template/sidebar.php'); ?>
<section class="  max-w-[800px] flex flex-col ">

    <form action="./product-save.php" method="post" enctype="multipart/form-data">
        <div class=" relative flex flex-col gap-5 max-w-sm p-4 ">
            
            <div class="">
                <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900 ">Product Name</label>
                <input type="text" id="product_name" name="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
            </div>
            <div class="">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
            </div>

            <div class="">
                <label for="product_rating" class="block mb-2 text-sm font-medium text-gray-900 ">Rating</label>
                <select id="product_rating" required name="product_rating" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600   dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="">Rate the product</option>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="mb-4">

                <label class="block mb-2 text-sm font-medium text-gray-900 " for="product_image">Product Image</label>
                <input class="block p-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400" id="product_image" name="product_image" type="file" required >

            </div>
            <div class=" ">
                <button type="submit" class="text-white absolute right-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save Product</button>
            </div>
        </div>
    </form>


</section>
<?php include('./template/footer.php'); ?>