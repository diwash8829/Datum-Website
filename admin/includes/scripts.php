 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/chart-area-demo.js"></script> -->
  <!-- <script src="js/demo/chart-pie-demo.js"></script> -->

    <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <!-- <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.css"/> -->
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>



  <script src="js/sweetalert.js"></script>
     <?php
          if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
          {

      ?>
             <script>
              Swal.fire({
              position: 'center',
              icon: "<?php echo $_SESSION['status_code']; ?>",
              title: "<?php echo $_SESSION['status']; ?>",
              showConfirmButton: true,
              })
              </script>
      <?php
       unset($_SESSION['status']);
        }
      ?>

  <script>
    
    $(document).ready(function() {

      var data = $('.delete-button').click(function(e){
      
      e.preventDefault();

      var delete_id = $(this).closest('tr').find('.delete-id').val();

      var countData = {
      "check_delete_btn": 1,
      "delete_id": delete_id, };

      if (delete_id != <?php echo $login_id; ?>)
      {
      
      delete_records(countData);
      }
      else
      {
          Swal.fire({
          position: 'center',
          icon: "error",
          title: "sorry !",
          text: "Current User Cannot Be Deleted",
          showConfirmButton: true,
          })
      }
          });


var clients_data = $('.delete-clients-button').click(function(e){
      e.preventDefault();

      var delete_id = $(this).closest('tr').find('.delete-clients-id').val();

      var countData = {
      "check_delete_clients_btn": 1,
      "delete_id": delete_id, };

      delete_records(countData);
  });

var testmonials_data = $('.delete-testmonials-button').click(function(e){
      e.preventDefault();

      var delete_id = $(this).closest('tr').find('.delete-testmonials-id').val();

      var countData = {
      "check_delete_testmonials_btn": 1,
      "delete_id": delete_id, };

      delete_records(countData);
  });

var gallery_data = $('.delete-gallery-button').click(function(e){
      e.preventDefault();

      var delete_id = $(this).closest('tr').find('.delete-gallery-id').val();

      var countData = {
      "check_delete_gallery_btn": 1,
      "delete_id": delete_id, };

      delete_records(countData);
  });

  var faqs_data = $('.delete-faqs-button').click(function(e){
      e.preventDefault();

      var delete_id = $(this).closest('tr').find('.delete-faqs-id').val();

      var countData = {
      "check_delete_faqs_btn": 1,
      "delete_id": delete_id, };

      delete_records(countData);
  });

  var career_data = $('.delete-career-button').click(function(e){
      e.preventDefault();

      var delete_id = $(this).closest('tr').find('.delete-career-id').val();

      var countData = {
      "check_delete_career_btn": 1,
      "delete_id": delete_id, };

      delete_records(countData);
  });


function delete_records(countData){

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({

            type: "POST",
            url: "code.php",
            data: countData,
    
            datatype: "datatype",
            success: function(response) {
              Swal.fire({
              position: 'center',
              icon: "success",
              title: "Data Deleted Successfully",
              showConfirmButton: false,
              timer: 1000,
              }).then((result) => { location.reload(); })

            }

        });
        }
      
    })
}
});

  </script>

  <script src="js/custom.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/datatables-demo.js"></script> -->

  <script type="text/javascript">
    $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
    $('#dataTable1').DataTable( {
        "order": [[ 0, "desc" ]],
         dom: '<"row"<"col-sm-4"l><"col-sm-4"B><"col-sm-4"f>>rt<"float-left"i><"float-right"p>',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ]
    } );
} );

  </script>