<?php 

if (empty($_POST['amount']) || empty($_POST['from_currency']) || empty($_POST['to_currency'])) {
    header("Location: exchange.php");
    die();
}
// print_r($_POST);

$amount = $_POST['amount'];

$from_currency_array = explode("-", $_POST['from_currency']);
$from_currency_name = $from_currency_array[0];
$from_currency_rate = $from_currency_array[1];

$to_currency_array = explode("-", $_POST['to_currency']);
$to_currency_name = $to_currency_array[0];
$to_currency_rate = $to_currency_array[1];


$mmk = $amount * $from_currency_rate;
$to = $mmk / $to_currency_rate;

$fileName = "exchange-record.txt";
if(!file_exists($fileName)){
    touch($fileName);
};
$fileStream = fopen($fileName,"a");
fwrite($fileStream,"$amount $from_currency_name = $to $to_currency_name\n");
fclose($fileStream);

// echo $to;


?>

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
                <li class="inline-flex items-center">
                    <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" href="./exchange.php">
                    Exchange Calculator
                    </a>
                    <svg class="shrink-0 mx-2 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </li>

                <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate" aria-current="page">
                    Calculation Result
                </li>
            </ol>
        </div>

        <div class="flex flex-col">
            <p class=" font-semibold text-2xl max-w-sm text-center" >
                <?= round($to,2) ?><?= $to_currency_name ?>
            </p>
            <a href="./exchange.php" name="calc_btn" class="py-3 px-4 max-w-sm w-full mt-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none  ">
                Calculate Again
            </a>
            <a href="./exc-record-list.php" name="calc_btn" class="py-3 px-4 max-w-sm w-full mt-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border  border-gray-800 text-gray-800 hover:border-gray-900 focus:outline-none focus:border-gray-900 disabled:opacity-50 disabled:pointer-events-none  ">
                View Record List
            </a>
        </div>
    </section>
    <?php include('./template/footer.php'); ?>