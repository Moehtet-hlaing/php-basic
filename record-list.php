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
          Record List
        </li>
      </ol>
    </div>
    <div>
        <?php 
            $fileName = "saveRecord.txt";
            if (!file_exists($fileName)) {
              touch($fileName);
            }
            $fileStream = fopen($fileName, "r");
            while (!feof($fileStream)):
                $content = fgets($fileStream);
                if($content === "\n"){continue;}
            ?>
            <P class="p-3 font-mono text-md bg-gray-100 "> 
              <?= $content  ?>
            </P>
            <?php endwhile; ?>
            <?php
            fclose($fileStream);
        ?>
    </div>
  </section>
  <?php include('./template/footer.php'); ?>
