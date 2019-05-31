<?php
get_header();
?>
    <main>
        <div class="contact">
            <div class="contact-details">
                <div class="a-detail">
                    email: <strong>sanette.upton@gmail.com</strong>
                </div>
                <div class="a-detail">
                    phone: <strong>072 822 9970</strong>
                </div>
                <div class="a-detail address">
                    <div class="address-label">
                        studio address:
                    </div>
                    <div class="address-info"><strong>
                        9 Du Toit Street<br>
                        Stanford            <br>
                        7210</strong>
                    </div>
                </div>
            </div>
            <form action="<?php echo site_url('message-sent') ?>" class="form" method="post">
                <div class="form__row">
                    <label for="name" class="label__name">Name:</label>
                    <input type="text" class="input__name" placeholder="YOUR NAME" name="aName">
                </div>
                <div class="form__row">
                    <label for="email" class="label__email">Email:</label>
                    <input type="text" class="input__email" placeholder="YOUR EMAIL" name="email">
                </div>
                <textarea name="message" id="" cols="30" rows="10" class="input__text-area" placeholder="YOUR MESSAGE HERE"></textarea>
                <button class="button">
                    Send Message
                </button>
            </form>
        </div>
    </main>

<?php
get_footer();
?>