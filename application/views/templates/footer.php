
<div class="footer">
    <div class="row">
        <!-- section one -->
        <div class= "col-3">
        <img src="<?php echo base_url(); ?>assets/pictures/logo2.png" alt="" width="300" height="150">
                
        </div>

            <!-- section-two -->
        <div class="col">
            <h5>Support</h5>
            <ul>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Downloads</a></li>
                <?php if (!isset($_session['name'])) :?>
                <li><a href="<?php echo base_url(); ?>register">Sign Up</a></li>
                <?php endif;?>
            </ul>
        </div>
        <!-- section three -->
        <div class="col">
            <h5>The Palace</h5>
            <ul>
                <li><a href="#">About Clothing Palace</a></li>
                <li><a href="#">Our Design</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Newsroom</a></li>
            </ul>
        </div>   

        <!-- section-four -->
        <div class="col-5">
            <i class="fa fa-envelope"></i>Stay up to date with the new trends<br><br>
            <div class="input-group mb-3" style="width:80%">
                <input type="text" class="form-control" placeholder="Enter Your Email Adderess" aria-label="Email" aria-describedby="addon-wrapping" width="50%" style="float:left">
                <button type="submit" class="btn btn-outline-light">Get Newsletter</button>
            </div>
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
        </div>
    </div>
</div>
</body>
</html>