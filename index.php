
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
          Area Calculator
        </li>
      </ol>
    </div>
    <form action="./area.php" method="post" class="my-4">

      <div class="max-w-sm">
        <label for="home_width" class="block text-sm font-medium mb-1">Width</label>
        <input type="number" id="home_width" name="home_width" class="py-2 px-4 block w-full border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
      </div>

      <div class="max-w-sm">
        <label for="home_breadth" class="block text-sm font-medium mb-1">Breadth</label>
        <input type="number" id="home_breadth" name="home_breadth" class="py-2 px-4 block w-full border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
      </div>

      <button type="submit" name="calc_btn" class="py-3 px-4 max-w-sm w-full mt-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none  ">
        Calculate
      </button>

    </form>
  </section>

  <?php include('./template/footer.php'); ?>
