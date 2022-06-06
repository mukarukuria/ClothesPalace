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
                <?php foreach ($product as $item) : ?>
                <form class="row g-3" action="<?=base_url('admin/uploadimage/edit/'.$item->product_id); ?>" method="POST" enctype ="multipart/form-data" novalidate>  
                   
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" value="<?=$item->product_name?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Product Image</label>
                        <input type="text" class="form-control" name="product_image" value="<?=$item->product_image?>" disabled readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Product Description</label>
                        <textarea class="form-control" name="product_description" required><?=$item->product_description?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Unit Price</label>
                        <input type="number" class="form-control" placeholder="Price" min="1" name="product_price" value="<?=$item->unit_price?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Discounted Price</label>
                        <input type="number" class="form-control" placeholder="Discounted Price" min="1" name="product_discount" value="<?=$item->discounted_price?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="product_quantity" value="<?=$item->available_quantity?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Category</label>
                        <select id="inputState" class="form-select" name="product_category" value="13657" required>
                        <option selected><?=$item->subcategory_name?></option>
                        <?php foreach($category as $items) {?>
                        <option value="<?=$items->subcategories_id?>"><?=$items->subcategory_name?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
        <div class="col-4">
            <img src="<?php echo base_url(); ?>assets/pictures/signup.jpg" alt="" width="400" height="600">
        </div>
    </div>
</div>
