<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Clothes Palace <?=$title?> </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?=$title?> </li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Clothe Palace <?=$title?> 
                                <button type ="button" class="btn btn-outline-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#categoryModal">Add Category</button>
                                <div class="modal fade"  id="categoryModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Add a Category</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body row">
                                                <form action="<?=base_url('Admin/newcategory')?>" method="post">
                                                <div class="mb-3 col-md-12">
                                                    <label for="categoryname" class="form-label">Category Name</label>
                                                    <input type="text" class="form-control" name="categoryname" >
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label for="subcategoryname" class="form-label">Subcategory</label>
                                                    <input type="text" class="form-control" name="subcategoryname" >
                                                </div>
                                                <div class="col-md-12">
                                                    <small class="text-muted w-100">NOTE: Adding a new category reflects on the user side and may not have any subcategories added. Subcategories should be added separately and directly.</small>
                                                </div>
                                                <div class="modal-footer pb-0">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th> Category Name</th>
                                            <th>Subcategories</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Subcategories</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($categories as $item) : ?>
                                        <tr>
                                            <td><?=$item->category_name?></td>
                                            <td><?=$item->subcategory_name?></td>
                                            <td>
                                                <div class="dropdown shadow-sm rounded-pill text-center">
                                                    <a href="#" class="dropdown-toggle text-body" data-bs-toggle="dropdown" >
                                                        <i class="fas fa-ellipsis-h" id="dropdownMenuLink" ></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li class="d-flex justify-content-around">
                                                            <a type="button" class="text-body"data-bs-toggle="modal" data-bs-target="#editcategoryModal"><i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit"></i></a>
                                                            <a href="<?=base_url('Admin/deletecategory/'.$item->category_id)?>" class="text-body"><i class="fas fa-trash" data-bs-toggle="tooltip" title="Delete"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal fade"  id="editcategoryModal" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">Add a Category</h3>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <form action="<?=base_url('Admin/editcategory/'.$item->category_id)?>" method="post">
                                                                <div class="mb-3 col-md-12">
                                                                    <label for="categoryname" class="form-label">Category Name</label>
                                                                    <input type="text" class="form-control" name="categoryname" value="<?=$item->category_name?>" >
                                                                </div>
                                                                <div class="mb-3 col-md-12">
                                                                    <label for="subcategoryname" class="form-label">Subcategory</label>
                                                                    <input type="text" class="form-control" name="subcategoryname" value="<?=$item->subcategory_name?>" disabled readonly>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <small class="text-muted w-100">NOTE: Adding a new category reflects on the user side and may not have any subcategories added. Subcategories should be added separately and directly.</small>
                                                                </div>
                                                                <div class="modal-footer pb-0">
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if($this->session->flashdata('category')) :?>
                        <div class="position-absolute top-0 end-0 p-3" style="z-index: 11">
                            <div class="alert alert-success">
                                <?=$this->session->flashdata('category');?>
                                <button type="button" class="btn-close ms-5" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </main>