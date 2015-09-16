<footer>
    <div class="row">
        <div class="large-12 columns">


            <div class="row">
                <div class="large-12 columns">
                    <p>© A WordPress Development Project | teamtreehouse.com</p>

                </div>


            </div>
        </div>
    </div>
</footer>

<!-- MODAL WINDOW -->

<div id="formModal" class="reveal-modal medium" data-reveal>
    <form data-abide method="post" action="index.php">


        <h3>Please fill in the form below and we will contact you shortly</h3>
        <fieldset>

            <div class="name-field">
                <label for="name">Your name <small>required</small></label>
                <input type="text" name="name" id="name" required pattern="[a-zA-Z]+">
                <small class="error">Name is required.</small>
            </div>

            <div class="email-field">
                <label for="email">Email <small>required</small></label>
                <input type="email" name="email" id="email" required>
                <small class="error">An email address is required.</small>
            </div>

            <div class="tel-field">
                <label for="tel">Telephone</label>
                <input type="tel" name="phone" id="phone">

            </div>

            <div class="textarea">
                <label for="message">Comments</label>
                <textarea id="message" name="message" placeholder="Leave your message here."></textarea>
            </div>

            <div class="address hide">
                <label for="address">Address</label>
                <input type="text" name="address" id="address">
                <p>IF YOU ARE HUMAN PLEASE LEAVE THIS BOX BLANK!!!</p>
            </div>

            <button class="success radius" type="submit" value="send">Submit</button>


        </fieldset> 
    </form>

    <a class="close-reveal-modal">&#215;</a>
</div>
<!-- MODAL WINDOW END -->


<script src="wp-content/themes/foundation/js/jquery.js"></script>
<!--<script src="wp-content/themes/foundation/js/foundation.min.js"></script>-->
<?php wp_footer()?>

</body>
</html>