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
                    <h3 class="fw-bold mb-0">Certificate License</h3>
                    <div class="w-sm-100">
                        <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#licensemodal">
                            <i class="icofont-plus-circle me-2 fs-6"></i>Add License
                        </button>
                    </div>
                </div>

            </div>
        </div> <!-- Row end  -->
        <div class="table-responsive py-4" style="overflow-x:hidden;">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Certificate License Id</th>
                        <th>License Type</th>
                        <th>Company Option</th>
                        <!-- <th>Valid From</th>
                        <th>Valid Till</th> -->
                        <th>Class</th>
                        <th>Validity</th>
                        <th>License No.</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 0;
                    $sql = mysqli_query($con, "SELECT certificate_license_id, validity, license_type, company_option, valid_from, valid_till, class, license_no FROM certificate_license");
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $a++;
                        // 1= Used (default)
                        // 0= Deliver
                        // 2= Unused
                    ?>
                        <tr>
                            <td><?php echo $row['certificate_license_id'] ?></td>
                            <td><?php echo $row['license_type'] ?></td>
                            <td><?php echo $row['company_option'] ?></td>
                            <!-- <td><?php echo date("F j, Y", strtotime($row['valid_from'])) ?></td>
                            <td><?php echo date("F j, Y", strtotime($row['valid_till'])) ?></td> -->
                            <td><?php echo $row['class'] ?></td>
                            <td><?php echo $row['validity'] ?></td>
                            <td><?php echo $row['license_no'] ?></td>
                            <td>
                                <button type="button" class="btn <?php echo ($row['license_no'] == '0') ? 'btn-secondary' : 'btn-primary '; ?> btn-xs dt-deliver" data-bs-toggle="modal" data-bs-target="#certificatemodal" data-certificate_license_id="<?php echo $row['certificate_license_id']; ?>" data-license_no="<?php echo $row['license_no']; ?>" data-validity_year="<?php echo $row['validity']; ?>">
                                    <i class="fa fa-shipping-fast"></i>
                                </button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
                                <input type='number' class='form-control' id='license_no' name='license_no' required>
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
                                <label for='class' class='form-label'>Class</label>
                                <select class="form-select" id='class' name='class' required>
                                    <option>Select Option</option>
                                    <option value="Class Two">Class Two</option>
                                    <option value="Class Three">Class Three</option>
                                </select>
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

        <div class="modal fade" id="certificatemodal" tabindex="-1" aria-labelledby="certificatemodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="certificatemodalLabel">Certificate DSC Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" id="certificateForm" action="certificate_php.php">

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

            $('.dt-deliver').click(function() {
                var certificate_license_id = $(this).data('certificate_license_id');
                var license_no = $(this).data('license_no');
                var validity = $(this).data('validity_year');
                event.preventDefault(); // Prevent default form submission
                var formData = $(this).serialize(); // Serialize form data
                $.ajax({
                    type: 'POST',
                    url: 'certificate_ajax.php',
                    data: {
                        certificate_license_id: certificate_license_id,
                        license_no: license_no,
                        validity: validity
                    },
                    success: function(response) {
                        $('#certificateForm').html(response);
                        console.log(data);
                    }
                });
            });
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