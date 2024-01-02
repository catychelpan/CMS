<form action="index.php" method="'POST" class="form-signin">


    <input type="hidden" name="section" value="contactus" />
    <input type="hidden" name="action" value="submitForm" />

    <div class="text-center mb-4">

        <h1 class="h3 mb-3 font-weight-normal"> <?php echo $page_obj->title ?> </h1>
        <p> <?php echo $page_obj->content ?> </p>



    </div>

    <div class="form-label-group">

        <label for="inputEmail">Email address</label>
        <input type="email" id="inputEmail" name="email" value="" class="form-control" placeholder="Email address"
            required autofocus>

    </div>

    <div class="form-label-group">
        <label for="comment">Message</label>
        <textarea id="comment" class="form-control" name="comment"></textarea>

    </div>



    <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>

</form>