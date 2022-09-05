<?php 
session_start();
require '../layouts/plantilla.php'; 
 

?>
<div class="layout-wrapper layout-content-navbar">
<div class="layout-container">
<?php 
include 'vertical.php';

include 'contenido.php';
 
 
?>

   <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../lib/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../lib/assets/vendor/libs/popper/popper.js"></script>
    <script src="../lib/assets/vendor/js/bootstrap.js"></script>
    <script src="../lib/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../lib/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../lib/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../lib/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../lib/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>

    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <script src="../node_modules/sweetalert2/dist/sweetalert2.js"></script>

    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script>
      $(document).ready(function(){
        $('#logoutId').click(function(e){
         e.preventDefault();
            $('#logout').click();
        });
      });
    </script>

    
 

