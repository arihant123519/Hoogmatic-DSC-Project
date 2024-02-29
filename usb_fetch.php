<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/sweetalert2@11.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

</head>

<body>
    <div class="container" id="">

        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">USB Token</h3>
                    <div class="w-sm-100">
                        <button type="button" class="btn btn-primary btn-set-task  w-sm-100" data-bs-toggle="modal" data-bs-target="#usbmodal">
                            <i class="icofont-plus-circle me-2 fs-6"></i>Add USB Token
                        </button>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="table-responsive py-4" style="overflow-x:hidden;">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>USB Token Id</th>
                        <th>Manufacturer Name</th>
                        <th>Token Option</th>
                        <th>Serial No.</th>
                        <th>Available</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 0;
                    $sql = mysqli_query($con, "SELECT usb_token_id, manufacturer, token_option, serial,available FROM usb_token");
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $a++;
                    ?>
                        <tr>
                            <td><?php echo $row['usb_token_id'] ?></td>
                            <td><?php echo $row['manufacturer'] ?></td>
                            <td><?php echo $row['token_option'] ?></td>
                            <td><?php echo $row['serial'] ?></td>
                            <td><?php echo ($row['available'] == '1') ? 'Available' : 'Not Available'; ?></td>
                            <!-- <td>
                                <button type="button" class="btn <?php echo ($row['status'] == '1') ? 'btn-primary' : 'btn-secondary'; ?> btn-xs dt-deliver" data-bs-toggle="modal" data-bs-target="#delivermodal" data-dsc_use_id="<?php echo $row['dsc_use_id']; ?>">
                                    <i class="fa fa-shipping-fast"></i>
                                </button>

                            </td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <!-- Add USB Token Modal -->
        <div class="modal fade" id="usbmodal" tabindex="-1" aria-labelledby="usbmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="usbmodalLabel">Add USB Token</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" id="addForm" action="usb_php.php">
                        <div class='modal-body row'>
                            <div class='col-md-6 mb-3'>
                                <label for='token_option' class='form-label'>Token Option</label>
                                <select class="form-select" id='token_option' name='token_option' required>
                                    <option>Select Option</option>
                                    <option value="Proxy Key">Proxy Key</option>
                                    <option value="e-Pass">e-Pass</option>
                                </select>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='manufacturer' class='form-label'>Manufacturer Name</label>
                                <input type='text' class='form-control' id='manufacturer' name='manufacturer' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='unique_id' class='form-label'>Unique Identity Number</label>
                                <input type='number' class='form-control' id='unique_id' name='unique_id' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='quantity' class='form-label'>Quantity</label>
                                <input type='number' class='form-control' id='quantity' name='quantity' required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <button type="button" class="btn btn-primary" onclick="generateInputs()">Generate Inputs</button>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div id="inputContainer"></div>
                                </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary'>Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Edit Modal -->

        <div class="modal fade" id="delivermodal" tabindex="-1" aria-labelledby="delivermodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delivermodalLabel">Deliver DSC Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" id="deliverForm" action="deliver.php">

                    </form>
                </div>
            </div>
        </div>


    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap5.js"></script>
    <script src="assets/js/simple-datatables@latest.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {

            // $('#example').dataTable();

            
        });

        function generateInputs() {
            var unique_id = parseInt(document.getElementById("unique_id").value);
            var quantity = parseInt(document.getElementById("quantity").value);
            var inputContainer = document.getElementById("inputContainer");

            // Clear previous inputs
            inputContainer.innerHTML = '';

            // Generate new input tags
            for (var i = 0; i < quantity; i++) {
                var input = document.createElement("input");
                input.type = "text";
                input.className = "form-control";
                input.name = "serial[]";
                input.value = unique_id + i;
                inputContainer.appendChild(input);
                inputContainer.appendChild(document.createElement("br"));
            }
        }
    </script>

</body>

</html>