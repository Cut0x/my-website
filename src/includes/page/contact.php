<?php
    if (isset($_REQUEST['btn_send'])) {
        header('location: ./?page=succes&id=1');
    }
?>

<div id="main">
    <div id="container-contact">
        <div id="object-contact">
            <h1>My social networks</h1>
            <div class="link">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="discord"><i class="bi bi-discord"></i></a>
                <a href="#" class="gmail"><i class="bi bi-envelope-fill"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
        
        <div id="object-contact">
            <h1>Send me a mail</h1>
            <form method="post" class="contact-form">
                <div class="obj-ctct">
                    <label for="">Your E-Mail <span style="color: red;">*</span></label><br>
                    <input type="email" name="" id="" placeholder="exemple@site.com">
                </div>

                <div style="margin-bottom: 15px;"></div>

                <div class="obj-ctct">
                    <label for="">Your Name <span style="color: red;">*</span></label><br>
                    <input type="text" name="" id="" placeholder="Mr. BOUDIER">
                </div>

                <div style="margin-bottom: 15px;"></div>

                <div class="obj-ctct">
                    <label for="">Object <span style="color: red;">*</span></label><br>
                    <input type="text" name="" id="" placeholder="I would like a website">
                </div>

                <div style="margin-bottom: 15px;"></div>

                <div class="obj-ctct">
                    <label for="">Content <span style="color: red;">*</span></label><br>
                    <textarea name="" id="" rows="8" placeholder="Add as much information as possible about your request, whether for an order, a question or a partnership / sponsor!"></textarea>
                </div>

                <div style="margin-bottom: 15px;"></div>

                <div class="obj-ctct">
                    <input name="btn_send" type="submit" value="Send Mail">
                </div>
            </form>
        </div>
    </div>
</div>