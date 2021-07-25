 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
            <span data-toggle="modal" data-target="#addModal">
                <button title="Add Product" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button>
            </span>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <?php
				$sql_select = mysqli_query($con,"SELECT * FROM tbl_user ORDER BY ID DESC"); 
			?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>MSSV</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>

                <?php
					while($row_khachhang = mysqli_fetch_array($sql_select)){ 
				?>
                    <tr>
                        <td><?php echo $row_khachhang['ID'] ?></td>
                        <td><?php echo $row_khachhang['Name'] ?></td>
                        <td><?php echo $row_khachhang['MSSV'] ?></td>
                        <td><?php echo $row_khachhang['Phone'] ?></td>
                        <td><?php echo $row_khachhang['Address'] ?></td>
                        <td><?php echo $row_khachhang['Email'] ?></td>
                        <td>
                            <?php if ($row_khachhang['Type']==1){ ?>
                                    <label class="text-success font-weight-bold">Admin</label>
                                <?php }else{ ?>
                                    <label class="text-danger font-weight-bold">User</label>
                            <?php } ?>
                        </td>
                        <td>
                            <span
                            onclick="passDataEditUser(
                             <?php echo $row_khachhang['ID'] ?>,
                             '<?php echo $row_khachhang['Name'] ?>',
                             '<?php echo $row_khachhang['MSSV'] ?>',
                             '<?php echo $row_khachhang['Email'] ?>',
                             <?php echo $row_khachhang['Phone'] ?>,
                             '<?php echo $row_khachhang['Address'] ?>',
                             <?php echo $row_khachhang['Type'] ?>
                            );"
                            data-toggle="modal"
                            data-target="#editModal">
                            <button title="Edit" class="btn btn-success mb-2"><i class="fas fa-edit"></i></button>
                             </span>
                            <span data-toggle="modal" data-target="#removeModal">
                            <button title="Remove" onclick="passDataRemove(<?php echo $row_khachhang['ID'] ?>, '<?php echo $row_khachhang['MSSV'] ?>')" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
                            </span>
                            <span onclick="passDataReset(<?php echo $row_khachhang['ID'] ?>);" data-toggle="modal" data-target="#resetPassModal">
                                <button title="Reset Password" class="btn btn-warning mb-2"><i class="fas fa-key"></i></button>
                            </span>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- add modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add-user-form">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" autocomplete="off" id="checkNameAdmin" name="add-username" class="form-control" placeholder="Enter user name ...">
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="add-password" class="form-control" placeholder="Enter password ...">
                    </div>
                    <div class="form-group">
                        <label>MSSV</label>
                        <input type="text" name="add-mssv" class="form-control" placeholder="Enter mssv ...">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="add-email" class="form-control" placeholder="Enter email ...">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="add-phone" class="form-control" placeholder="Enter phone ...">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="add-address" class="form-control" placeholder="Enter address ...">
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="add-isadmin" type="checkbox">
                        <label class="form-check-label">Is Admin?</label>
                    </div>
                    <div class="modal-footer">
                        <a id="addUser" type="button" class="btn btn-primary " data-dismiss="modal">Save</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end add modal -->

<!-- edit modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="edit-category-form">
                    <input type="hidden" name="id-edit" />
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" autocomplete="off" id="checkNameAdmin" name="edit-username" class="form-control" placeholder="Enter user name ...">
                    </div>
                    <div class="form-group">
                        <label>MSSV</label>
                        <input type="text" name="edit-mssv" class="form-control" placeholder="Enter email ...">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="edit-email" class="form-control" placeholder="Enter email ...">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="edit-phone" class="form-control" placeholder="Enter phone ...">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="edit-address" class="form-control" placeholder="Enter address ...">
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="edit-isadmin" type="checkbox">
                        <label class="form-check-label">Is Admin?</label>
                    </div>
                    <div class="modal-footer">
                        <a id="editUser" type="button" class="btn btn-primary " data-dismiss="modal">Save</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end edit modal -->

<!-- remove modal -->
<div class="modal fade" id="removeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">REMOVE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id-remove" />
                Are you sure you wanna remove <label style="font-weight:bold;color:red;"></label> ?
            </div>
            <div class="modal-footer">
                <button id="removeuser" type="button" class="btn btn-danger" data-dismiss="modal">Remove</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end remove modal -->

<!-- reset pass modal -->
<div class="modal fade" id="resetPassModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">RESET PASSWORD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="id-resetPass" />
                    <div class="form-group">
                        <label>New pass</label>
                        <input type="password" name="reset-pass" id="checkPassReset" class="form-control" placeholder="Enter new password ...">
                    </div>
                    <div class="modal-footer">
                        <a id="resetPass" type="button" class="btn btn-warning " data-dismiss="modal">Save</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end reset pass modal -->