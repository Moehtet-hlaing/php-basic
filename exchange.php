<?php include('./template/header.php'); ?>
<?php include('./template/sidebar.php'); ?>

<section class=" bg-gray-50 p-6 mb-6 rounded-lg">
    <div class="mb-6 py-4 overflow-hidden">
        <ol class="flex items-center ">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" href="#">
                    Home
                </a>
                <svg class="shrink-0 mx-2 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </li>
            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate" aria-current="page">
                Exchange Calculator
            </li>
        </ol>
    </div>

<?php 
    // $content = file_get_contents("http://forex.cbm.gov.mm/api/latest");
    // echo $content;
    $ch = curl_init("http://forex.cbm.gov.mm/api/latest");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");

$content = curl_exec($ch);
curl_close($ch);

// echo $content;
$obj = json_decode($content);
// var_dump($obj -> rates);
    
?>

    <form action="./exchange-process.php" method="post">
        <div class="grid grid-cols-2 gap-5 max-w-sm ">
            <div class="col-span-full">
                <div>
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 ">Currency Amount</label>
                    <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
            </div>
            <div class="col-span-1">
                <div class="max-w-sm mx-auto">
                    <label for="from_currency"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">From Currency</label>
                    <select id="from_currency" name="from_currency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm dark:text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">From Currency</option>
                        <?php foreach ($obj -> rates as $key => $rate) : ?>
                            <option value="<?= $key ?>-<?= $rate ?>"><?= $key ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <div class="col-span-1 ">
                <div class="max-w-sm mx-auto">
                    <label for="to_currency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">To Currency</label>
                    <select id="to_currency" name="to_currency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm dark:text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>To Currency</option>
                        <?php foreach ($obj -> rates as $key => $rate) : ?>
                            <option value="<?= $key ?>-<?= $rate ?>"><?= $key ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
        </div>
        <button type="submit" class="py-3 px-4 max-w-sm mx-auto w-full mt-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none  ">
        Calculate
        </button>

    </form>

</section>

<?php include('./template/footer.php'); ?>