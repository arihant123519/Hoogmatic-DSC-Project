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
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container" id="">

        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">DSC</h3>
                    <div class="w-sm-100 px-2">
                        <a class="btn btn-primary btn-set-task  w-sm-100" data-bs-toggle="modal" data-bs-target="#stockoutmodal">
                            <i class="icofont-plus-circle me-2 fs-6"></i>Consume
                        </a>
                    </div>
                </div>
                <div class="card-header py-3 no-bg bg-transparent d-flex px-0 border-bottom">
                    <div class="w-sm-100 px-2">
                        <a class="btn btn-primary btn-set-task  w-sm-100" href="usb_fetch.php">
                            <i class="icofont-plus-circle me-2 fs-6"></i>Add USB Token
                        </a>
                    </div>
                    <div class="w-sm-100 px-2">
                        <a class="btn btn-primary btn-set-task w-sm-100" href="license_fetch.php">
                            <i class="icofont-plus-circle me-2 fs-6"></i>Add License
                        </a>
                    </div>
                </div>

            </div>
        </div> <!-- Row end  -->
        <div class="table-responsive py-4" style="overflow-x:hidden;">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No. of License</th>
                        <th>DSC Token Id</th>
                        <th>Order Id</th>
                        <th>Lead Id</th>
                        <th>Connector Code</th>
                        <th>Remarks</th>
                        <th>Token Option</th>
                        <!-- <th>Status</th>
                        <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 0;
                    $sql = mysqli_query($con, "SELECT id, no_of_license, dsc_token_id, order_id, lead_id, connector_code, remarks, token_option FROM stockout_form");
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $a++;
                        // 1= Used (default)
                        // 0= Deliver
                        // 2= Unused
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['no_of_license'] ?></td>
                            <td><?php echo $row['dsc_token_id'] ?></td>
                            <td><?php echo $row['order_id'] ?></td>
                            <td><?php echo $row['lead_id'] ?></td>
                            <td><?php echo $row['connector_code'] ?></td>
                            <td><?php echo $row['remarks'] ?></td>
                            <td><?php echo $row['token_option'] ?></td>
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


        <!-- <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addmodalLabel">Add DSC</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" id="addForm" action="add_php.php">
                        <div class='modal-body row'>
                            <div class='col-md-12 mb-3'>
                                <label for='option' class='form-label'>Option</label>
                                <select class="form-select" id='option' name='options' required>
                                    <option>Select Option</option>
                                    <option value="USB">USB</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='product' class='form-label'>Product Name</label>
                                <input type='text' class='form-control' id='product' name='product' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='token' class='form-label'>Token</label>
                                <input type='text' class='form-control' id='token' name='token' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='license_no' class='form-label'>License No.</label>
                                <input type='text' class='form-control' id='license_no' name='license_no' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='serial_no' class='form-label'>Serial No.</label>
                                <input type='text' class='form-control' id='serial_no' name='serial_no' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='certificate' class='form-label'>Certificate</label>
                                <input type='text' class='form-control' id='certificate' name='certificate' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='quantity' class='form-label'>Quantity</label>
                                <input type='number' class='form-control' id='quantity' name='quantity' required>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary'>Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

        <!-- Add USB Token Modal -->
        <div class="modal fade" id="stockoutmodal" tabindex="-1" aria-labelledby="stockoutmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stockoutmodalLabel">Consume </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" id="stockoutForm" action="stockout_form.php">
                        <div class='modal-body row'>
                            <div class='col-md-12 mb-3'>
                                <label for='token_option' class='form-label'>Token Option</label>
                                <select class="form-select" id='token_option' name='token_option' required onchange="showInput()">
                                    <option>Select Option</option>
                                    <option value="Only License">Only License</option>
                                    <option value="Only DSC Token">Only DSC Token</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>

                            <div class='col-md-6 mb-3 hidden' id="only_certificate_license">
                                <label for='no_of_license' class='form-label'>No. of License</label>
                                <input type='number' class='form-control' id='no_of_license' name='no_of_license'>
                            </div>

                            <div class='col-md-6 mb-3 hidden' id="only_DSC_token">
                                <label for='dsc_token_id' class='form-label'>Only DSC Token</label>
                                <select class="form-select" id='dsc_token_id' name='dsc_token_id'>
                                    <option>Select Option</option>
                                    <?php 
                                    $dsc_sql=mysqli_query($con,"SELECT * FROM usb_token WHERE available='1' ");
                                    while($dsc_row=mysqli_fetch_assoc($dsc_sql)){
                                    ?>
                                        <option value="<?php echo $dsc_row['serial'] ?>"><?php echo $dsc_row['serial'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class='col-md-4 mb-3'>
                                <label for='order_id' class='form-label'>Order ID</label>
                                <input type='text' class='form-control' id='order_id' name='order_id' required>
                            </div>
                            <div class='col-md-4 mb-3'>
                                <label for='lead_id' class='form-label'>Lead ID</label>
                                <input type='text' class='form-control' id='lead_id' name='lead_id' required>
                            </div>
                            <div class='col-md-4 mb-3'>
                                <label for='connector_code' class='form-label'>Connector Code</label>
                                <input type='number' class='form-control' id='connector_code' name='connector_code' required>
                            </div>
                            <div class='col-md-12 mb-3'>
                                <label for='remarks' class='form-label'>Remarks</label>
                                <textarea class='form-control' id='remarks' name='remarks'></textarea>
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



        <div class="modal fade" id="licensemodal" tabindex="-1" aria-labelledby="licensemodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="licensemodalLabel">Add Certificate License</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" id="addForm" action="license_php.php">
                        <div class='modal-body row'>
                            <div class='col-md-6 mb-3'>
                                <label for='license_no' class='form-label'>Number of License Purchased</label>
                                <input type='text' class='form-control' id='license_no' name='license_no' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='validity' class='form-label'>Validity</label>
                                <select class="form-select" id='validity' name='validity' required>
                                    <option>Select Option</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Year</option>
                                    <option value="3">3 Year</option>
                                </select>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='company_name' class='form-label'>Company Name</label>
                                <input type='text' class='form-control' id='company_name' name='company_name' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='company_option' class='form-label'>Company Option</label>
                                <select class="form-select" id='company_option' name='company_option' required>
                                    <option>Select Option</option>
                                    <option value="ID Sign">ID Sign</option>
                                    <option value="Penta Sign">Penta Sign</option>
                                    <option value="E-Mudra">E-Mudra</option>
                                </select>
                            </div>

                            <div class='col-md-12 mb-3'>
                                <label for='license_type' class='form-label'>Type of License</label>
                                <select class="form-select" id='license_type' name='license_type' required>
                                    <option>Select Option</option>
                                    <option value="General">General</option>
                                    <option value="Combo">Combo</option>
                                    <option value="DGFT">DGFT</option>
                                </select>
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

            $('#example').dataTable();

            $('.dt-deliver').click(function() {
                var dsc_use_id = $(this).data('dsc_use_id');
                event.preventDefault(); // Prevent default form submission
                var formData = $(this).serialize(); // Serialize form data
                $.ajax({
                    type: 'POST',
                    url: 'deliver_ajax.php',
                    data: {
                        dsc_use_id: dsc_use_id
                    },
                    success: function(response) {
                        $('#deliverForm').html(response);
                        console.log(dsc_use_id);
                    }
                });
            });
        });

        function showInput() {
            var selectedOption = document.getElementById('token_option').value;
            var certificateInput = document.getElementById('only_certificate_license');
            var DSCInput = document.getElementById('only_DSC_token');

            certificateInput.classList.add('hidden');
            DSCInput.classList.add('hidden');

            // Remove required attribute from both inputs initially
            document.getElementById('no_of_license').removeAttribute('required');
            document.getElementById('dsc_token_id').removeAttribute('required');

            if (selectedOption === 'Only License') {
                certificateInput.classList.remove('hidden');
                document.getElementById('no_of_license').setAttribute('required', 'required');
            } else if (selectedOption === 'Only DSC Token') {
                DSCInput.classList.remove('hidden');
                document.getElementById('dsc_token_id').setAttribute('required', 'required');
            } else if (selectedOption === 'Both') {
                certificateInput.classList.remove('hidden');
                DSCInput.classList.remove('hidden');
                document.getElementById('no_of_license').setAttribute('required', 'required');
                document.getElementById('dsc_token_id').setAttribute('required', 'required');
            }
        }

        function generateInputs() {
            var dsc_token_id = parseInt(document.getElementById("dsc_token_id").value);
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
                input.value = dsc_token_id + i;
                inputContainer.appendChild(input);
                inputContainer.appendChild(document.createElement("br"));
            }
        }
    </script>

</body>

</html>