<div class="container">
    <div class="row" style="padding: 30px;">
        <div class="col-6">
            <div class="card shadow">
                <div class="card-header mb-3">
                    Upload Image
                    <a href="<?=base_url('admin/gallery')?>" class="btn btn-outline-primary btn-sm float-end">Go Back</a>
                </div>
                <?php if(isset($imageError)){?>
                    <div class="alert alert-danger" id="alertbox" style="position:fixed">
                        <?= $imageError; ?>
                    </div><?php } ?>
                    <?php if($this->session->flashdata('status')) { ?>
                        <div class="alert alert-success" id="alertbox">
                            <?=$this->session->flashdata('status')?>
                        </div><?php }
                        
                ?>
                <script> window.setTimeout("closeHelpDiv();", 3000); </script>
                <form class="row g-3" action="<?php echo base_url(); ?>admin/uploadimage" method="POST" enctype ="multipart/form-data"> 
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="inputEmail4" name="product_name">
                        <small id="alertbox"><?php echo form_error('product_name'); ?></small>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Product Image</label>
                        <input type="file" class="form-control" name="product_image" >
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Product Description</label>
                        <textarea class="form-control" name="product_description" placeholder="Be as specific as Possible" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Unit Price</label>
                        <input type="number" class="form-control" id="inputAddress2" placeholder="Price" min="1" name="product_price">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Discounted Price</label>
                        <input type="number" class="form-control" id="inputAddress2" placeholder="Discounted Price" min="1" name="product_discount">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="inputCity" name="product_quantity">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Category</label>
                        <select id="inputState" class="form-select" name="product_category">
                        <option selected>Choose</option>
                        <?php foreach($category as $item) :?>
                        <option value="<?=$item->subcategories_id?>"><?=$item->subcategory_name?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4">
            <img src="<?php echo base_url(); ?>assets/pictures/signup.jpg" alt="" width="400" height="600">
        </div>
    </div>
</div>
