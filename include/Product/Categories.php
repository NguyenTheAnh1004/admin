 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Category</h1>


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
				$sql_select = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
			?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Display Order</th>
                       
                        <th>Action</th>
                      
                    </tr>
                </thead>

                <tbody>
                    <?php
					while($row_category = mysqli_fetch_array($sql_select)){ 
					?>
                    <tr>
                        <td><?php echo $row_category['category_id'] ?></td>
                        <td><?php echo $row_category['category_name'] ?></td>
                        <td><?php echo $row_category['category_displayorder'] ?></td>
                     
                        <td>
                            <span
                            onclick="passDataEditCategory(
                              <?php echo  $row_category['category_id']; ?>,
                              '<?php echo $row_category['category_name']; ?>',
                              <?php echo $row_category['category_displayorder']; ?>,
                              
                            );"
                            data-toggle="modal"
                            data-target="#editModal">
                            <button title="Edit" class="btn btn-success mb-2"><i class="fas fa-edit"></i></button>
                             </span>
                            <span data-toggle="modal" data-target="#removeModal">
                            <button title="Remove" onclick="passDataRemove(<?php echo $row_category['category_id'] ?>,'<?php echo $row_category['category_name'] ?>')" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
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
                <form class="add-category-form">
                    <div class="form-group">
                        <label>Categories Name</label>
                        <input type="text" autocomplete="off" name="add-cateName" class="form-control" placeholder="Enter categoriy name ...">
                    </div>
                    <div class="form-group">
                        <label>display Order</label>
                        <input type="text" autocomplete="off" name="add-displayorder" class="form-control" placeholder="Enter display order...">
                    </div>
                    <!-- <div class="form-group">
                        <label>Icon Name</label>
                        <input type="text" autocomplete="off" name="add-iconname" class="form-control" placeholder="Enter icon name ...">
                    </div> -->
                    <div class="modal-footer">
                        <a id="addCategory" type="button" class="btn btn-primary disabled" data-dismiss="modal">Save</a>
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
                        <label>Category Name</label>
                        <input type="text" autocomplete="off" name="edit-cate-name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Display Order</label>
                        <input type="text" autocomplete="off" name="edit-displayorder" class="form-control">
                    </div> 
                    <!-- <div class="form-group">
                        <label>Icon Name</label>
                        <input type="text" autocomplete="off" name="edit-iconname" class="form-control">
                    </div>                 -->
                    <div class="modal-footer">
                        <a id="editCategory" type="button" class="btn btn-success" data-dismiss="modal">Save</a>
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
                <button id="removeCategory" type="button" class="btn btn-danger" data-dismiss="modal">Remove</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end remove modal -->
