<?php
if (empty($_POST['home_width']) || empty($_POST['home_breadth'])) {
    header("Location: index.php");
    die();
}
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
                    <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" href="./index.php">
                    Area Calculator
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
            <div>
                <?php
                $width = $_POST['home_width'];
                $breadth = $_POST['home_breadth'];
                $area = $width * $breadth;

                $fileName = "saveRecord.txt";
                if (!file_exists($fileName)) {
                    touch($fileName);
                  }
                $fileStream = fopen($fileName, "a");
                fwrite($fileStream, "$width * $breadth = $area" . "\n");
                fclose($fileStream);
                ?>
                <h1 class=" max-w-sm text-5xl text-gray-800 text-center ">
                    <?= $area . " Sqft"; ?>
                </h1>
            </div>
            <a href="./index.php" name="calc_btn" class="py-3 px-4 max-w-sm w-full mt-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none  ">
                Calculate Again
            </a>
            <a href="./record-list.php" name="calc_btn" class="py-3 px-4 max-w-sm w-full mt-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border  border-gray-800 text-gray-800 hover:border-gray-900 focus:outline-none focus:border-gray-900 disabled:opacity-50 disabled:pointer-events-none  ">
                View Record List
            </a>
        </div>
    </section>
    <?php include('./template/footer.php'); ?>
