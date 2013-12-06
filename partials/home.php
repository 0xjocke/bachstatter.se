<section id="home">
    <header class="intro">
         <?php if(isset($_POST['email'])): ?>
            <?php if ($result >= 1): ?>
                <p class="success fadeOut">Tack för ditt mail, jag återkommer så snart som möjligt.</p>
            <?php else: ?>
                <p class="error fadeOut">Det gick tyvärr inte att skicka mailet, var god försök igen.</p>
            <?php endif; ?>
        <?php endif; ?>
        <h1>Joachim Bachstätter</h1>
         <h2>- Frontend Developer</h2>

        <div class="white">
                <img src="images/logos.png">
        </div>
    </header>
</section>