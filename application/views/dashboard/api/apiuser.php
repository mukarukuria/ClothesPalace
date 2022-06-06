            <div id="layoutSidenav_content">
                <main>
                
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Clothes Palace</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">api user</li>
                        </ol>
                        <?php if($this->session->flashdata('confirmation')) :?>
                            <div class="alert alert-success shadow alert-dismissible fade show" role="alert">
                                <?php foreach($tokens as $item):?>
                                Username <strong><?=$item->username?></strong> has been added to the database your api token is 
                                <strong>
                                    <a style="cursor: pointer" onclick="document.execCommand('copy')" data-bs-toggle="tooltip" data-bs-placement="top" title="Copied to clipboard">
                                        <u><?=$item->api_token?></u>
                                    </a>
                                </strong>
                                which expires on <?=$item->expires_on?>
                                <?php endforeach; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="card shadow w-75">
                            <div class="card-header">
                                <h2>Create an API User</h2>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="mb-3 col-md-7">
                                        <label for="api">Enter a Username</label>
                                        <input type="text" class="form-control" name="apiusername" required>
                                        <small><?=form_error('apiusername')?></small>
                                    </div>
                                    <div class="col-md-7 mb-3">
                                        <label for="apiemail">Enter your Email</label>
                                        <input type="email" class="form-control"name="apiemail">
                                        <small><?=form_error('apiemail')?></small>
                                    </div>
                                    <div class="col-md-3">
                                        <button  type="submit" class="btn btn-primary"> Create </button>
                                    </div>
                                </form>
                                    
                            </div>
                        </div>
                    </div>
                </main>