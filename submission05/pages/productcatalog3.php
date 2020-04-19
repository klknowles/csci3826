<?php include("../common/document_head.html"); ?>
  <!-- estore.php -->
  <body class="Body w3-auto">
    <header class="w3-container">
      <?php
        include("../common/banner.php");
        include("../common/menus.html");
      ?>
  </header>
    <main class="w3-container">
      <div class="w3-container w3-border-left w3-border-right w3-border-black w3-light-grey">
        <div class="w3-center">
          <h2>Home.</h2>
        </div>
         <table>
         <tr>
          <th>Product Image</th>
          <th>Product Name</th>
          <th>Price</th>
          <th># in Stock</th>
          <th>Purchase?</th>
         </tr>
         <tr>
           <td>
             <img height='70' width='70' src='images/products/drill.jpg' alt='drill'>
           </td>
           <td style='text-align: left;'>Drill</td>
           <td>$24.99</td>
           <td>76</td>
           <td><a class='w3-button' title="not active" href="pages/sorry.html">Buy this item</a>
               <a class='w3-button' href="pages/productcatalog.php">Return to list of product categories</a>
           </td>
         </tr>
         <tr>
           <td>
             <img height='70' width='70' src='images/products/Hammer.jpg' alt='hammer'>
           </td>
           <td style='text-align: left;'>Hammer</td>
           <td>$34.99</td>
           <td>76</td>
           <td><a class='w3-button' title="not active" href="pages/sorry.html">Buy this item</a>
               <a class='w3-button' href="pages/productcatalog.php">Return to list of product categories</a>
           </td>
         </tr>
         <tr>
           <td>
             <img height='70' width='70' src='images/products/PowerSaw.jpg' alt='power saw'>
           </td>
           <td style='text-align: left;'>Power Saw</td>
           <td>$44.99</td>
           <td>76</td>
           <td><a class='w3-button' title="not active" href="pages/sorry.html">Buy this item</a>
               <a class='w3-button' href="pages/productcatalog.php">Return to list of product categories</a>
           </td>
         </tr>
         <tr>
           <td>
             <img height='70' width='70' src='images/products/TableSaw.jpg' alt='table saw'>
           </td>
           <td style='text-align: left;'>Table Saw</td>
           <td>$54.99</td>
           <td>76</td>
           <td><a class='w3-button' title="not active" href="pages/sorry.html">Buy this item</a>
               <a class='w3-button' href="pages/productcatalog.php">Return to list of product categories</a>
           </td>
         </tr>
         <tr>
           <td>
             <img height='70' width='70' src='images/products/Toolbox.jpg' alt='tool box'>
           </td>
           <td style='text-align: left;'>Tool Box</td>
           <td>$64.99</td>
           <td>76</td>
           <td><a class='w3-button' title="not active" href="pages/sorry.html">Buy this item</a>
               <a class='w3-button' href="pages/productcatalog.php">Return to list of product categories</a>
           </td>
         </tr>
         </table>
      </div>
      </main>
    <footer class="w3-container">
      <div class="w3-bar w3-center w3-teal">
        <?php include("../common/footer_content.html"); ?>
      </div>
    </footer>
  </body>
</html>

