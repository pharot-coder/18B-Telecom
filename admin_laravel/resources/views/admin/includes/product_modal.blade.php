<!-- Edit-Product -->
<div class="modal fade" id="editproductModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="productname"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action=" {{ route('edit_product') }} ">
                    {{ csrf_field() }}
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
                                <select name="brand" id="editbrand" class="form-control" required>
                                    <option value="0"> Select Brand </option>
                                    <?php foreach ($brandData as $row) { ?>
                                    <option value="<?php echo $row->brandid; ?>"> <?php echo $row->brandname; ?>
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
                                <select name="category" id="editcategory" class="form-control" required>
                                    <option value="0"> Select Category </option>
                                    <?php foreach ($categoryData as $row) { ?>
                                    <option value="<?php echo $row->categoryid; ?>"> <?php echo $row->categoryname; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label " for="name"><strong>Supplier</strong></label>
                                <select name="supplier" id="editsupplier" class="form-control">
                                    <option value="0"> Select Supplier </option>
                                    <?php foreach ($supplierData as $rowsupplier) { ?>
                                    <option value="<?php echo $rowsupplier->supplierid; ?>">
                                        <?php echo $rowsupplier->suppliername; ?>
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
                                <label class="control-label" for="name"><strong>Quantity:</strong></label>
                                <input type="text" name="qty" class="form-control" id="editqty"
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="productname"></span></h4>
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
            <form method="post" action="{{ route('delete_product') }}">
                <!-- Modal body -->
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Are You want to sure to delete ?</h5>
                        <h3 class="productname"></h3>
                    </div>
                    <input type="hidden" name="productid" class="productid">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-danger btn-flat pull-right" name="delete"><i
                            class="fa fa-trash"></i> Delete</button>
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
                <h4 class="modal-title"><span class="productname"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action=" {{ route('edit_product_status') }} ">
                {{ csrf_field() }}
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status"> <strong> Status: </strong> </label>
                        <select name="status" class="form-control status" id="status">
                            <option value="1"> Active </option>
                            <option value="0"> Deactive </option>
                        </select>
                        <input type="hidden" name="productid" class="productid">
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
