<!-- Add-New -->
<div class="modal fade" id="addproduct">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url(); ?>admin/Product_Con/InsertData"
                    enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="userid"
                        value="<?php echo $this->session->userdata('adid')->userid ?>">
                    <div class="form-row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="name"><strong>Product Name:</strong></label>
                                <input type="text" name="productname" class="form-control" id="productname"
                                    placeholder="Enter Product Name" required>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="brand"><strong>Brand</strong></label>
                                <select name="brandid" id="brandid" class="form-control" required>
                                    <option value=""> Select Brand </option>
                                    <?php foreach ($brand as $rowbrand) { ?>
                                    <option value="<?php echo $rowbrand->brandid ?>">
                                        <?php echo $rowbrand->brandname ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="name"><strong>Category</strong></label>
                                <select name="categoryid" id="category" class="form-control" required>
                                    <option value=""> Select Category </option>
                                    <?php foreach ($category as $row) { ?>
                                    <option value="<?php echo $row->categoryid ?>"> <?php echo $row->categoryname ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label " for="supplierid"><strong>Supplier</strong></label>
                                <select name="supplierid" id="supplierid" class="form-control" required>
                                    <option value=""> Select Supplier </option>
                                    <?php foreach ($supplier as $rowsupplier) { ?>
                                    <option value="<?php echo $rowsupplier->supplierid ?>">
                                        <?php echo $rowsupplier->suppliername ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="price"><strong>Cost:</strong></label>
                                <input type="text" name="cost" class="form-control" id="cost" placeholder="Enter Cost"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-5">

                            <div class="form-group">
                                <label class="control-label" for="price"><strong>Price:</strong></label>
                                <input type="text" name="price" class="form-control" id="price"
                                    placeholder="Enter Price" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="name"><strong>Quantity:</strong></label>
                                <input type="text" name="qty" class="form-control" id="qty" placeholder="Enter Quantity"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label " for="photo"><strong>Photo:</strong></label>
                                <input type="file" name="images" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="desc"><strong>Description:</strong></label>
                        <textarea name="description" id="editor1" cols="30" rows="10" required></textarea>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" names="save">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- Edit-Product -->
<div class="modal fade" id="editproduct">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url(); ?>admin/Product_Con/UpdatePro">
                    <div class="form-row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="name"><strong>Product Name:</strong></label>
                                <input type="text" name="productname" class="form-control" id="editproductname"
                                    placeholder="Enter Product Name" required>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="brand"><strong>Brand:</strong></label>
                                <select name="brandid" id="editbrand" class="form-control" required>
                                    <option value="0"> Select Brand </option>
                                    <?php foreach ($brand as $row) { ?>
                                    <option value="<?php echo $row->brandid ?>"> <?php echo $row->brandname ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="name"><strong>Category</strong></label>
                                <select name="categoryid" id="editcategory" class="form-control" required>
                                    <option value="0"> Select Category </option>
                                    <?php foreach ($category as $row) { ?>
                                    <option value="<?php echo $row->categoryid ?>"> <?php echo $row->categoryname ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label " for="name"><strong>Supplier</strong></label>
                                <select name="supplierid" id="editsupplier" class="form-control">
                                    <option value="0"> Select Supplier </option>
                                    <?php foreach ($supplier as $rowsupplier) { ?>
                                    <option value="<?php echo $rowsupplier->supplierid ?>">
                                        <?php echo $rowsupplier->suppliername ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="price"><strong>Price:</strong></label>
                                <input type="text" name="price" class="form-control" id="editprice"
                                    placeholder="Enter Price" required>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="price"><strong>Cost:</strong></label>
                                <input type="text" name="cost" class="form-control" id="editcost"
                                    placeholder="Enter Cost">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="name"><strong>Quantity IN:</strong></label>
                                <input type="text" name="qty_in" class="form-control" id="editqtyin"
                                    placeholder="Enter Quantity" required>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label" for="name"><strong>Quantity OUT:</strong></label>
                                <input type="text" name="qty_out" class="form-control" id="editqtyout"
                                    placeholder="Enter Quantity" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="desc"><strong>Description:</strong></label>
                        <textarea name="description" id="editor2" cols="30" rows="10" required></textarea>
                    </div>
                    <input type="hidden" name="productid" class="productid">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" names="save">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Description -->
<div class="modal fade" id="descriptionmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p class="desc"></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span> Deleting....</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php
            $attform = array('method' => 'POST');
            echo form_open('admin/Manage_Users/deleteuser', $attform); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="text-center">
                    <h5>Are You want to sure to delete ?</h5>
                    <h3 class="name"></h3>
                </div>
                <input type="hidden" name="userid" class="userid">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-danger', 'name' => 'delete', 'value' => 'Delete']) ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="editphoto">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>admin/Category_Con/UpdatePhoto">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="images"> <strong> Photo: </strong> </label>
                        <input type="file" name="images" id="images" required>
                        <input type="hidden" name="categoryid" class="categoryid">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-success btn-flat pull-right" name="delete"><i
                            class="fa fa-edit"></i> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Status Modal -->
<div class="modal fade" id="statusmodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open('admin/Manage_Users/editStatus', ['method' => 'post']) ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="status"> <strong> Status: </strong> </label>
                    <select name="status" class="form-control status" id="status">
                        <option value="1"> Active </option>
                        <option value="0"> Deactive </option>
                    </select>
                    <input type="hidden" name="userid" class="userid">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-success', 'name' => 'save', 'value' => 'Save Change']) ?>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>