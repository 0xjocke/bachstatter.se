<?php 
    require_once '../application.php';
    $result = 0;

    if (isset($_POST['email'])) {
        $email = new Email;
            if($email->validate($_POST['email'])){
                $result = $email->send();
            }
        }

 ?>

<div class="contactpic"></div>

<section id="contact">
    <div class="cwrapper">
        <div class="cardwrapper">
            <article>
                        <ul class="social">
                            <li>
                                <a href="http://se.linkedin.com/pub/joachim-bachstätter/51/183/724/" target="_blank">
                                <img class="socialicon" alt="linkedin icon" src="../images/contact/linkedin.png"></a>
                            </li>
                            <li>
                                <a href="google.com/+JoachimBachstätter" target="_blank" >
                                <img class="socialicon" src="../images/contact/google.png" alt="google icon"></a>
                            </li>
                            <li>
                                <a href="http://codecademy.com/bachis"  target="_blank">
                                <img class="socialicon" src="../images/contact/codecademy.png" alt="codecademy icon"></a>
                            </li>
                            <li>
                                <a href="http://www.codeschool.com/users/bachis" target="_blank"><img class="socialicon" src="../images/contact/code.png" alt="codeschool icon"></a>
                            </li>
                    </ul>
                    <ul class="cvinfo">
                        <li>
                            <img class="icon" alt="mail icon" src="../images/contact/mail.png"> 
                            <a href="mailto:joachim.bachstatter@gmail.com">joachim.bachstatter@gmail.com</a>
                        </li>
                        <li>
                         <img class="icon" alt="phone icon" src="../images/contact/phone.png"> 070 - 813 50 00
                        </li>
                        <li>
                            <img class="icon" alt="cv icon" src="../images/contact/cv.png">
                            <a href="cv/cv.pdf" download="cv/cv.pdf" target="_blank">CV</a></li>
                        <li>
                    </ul>  
            </article>
            <aside>
                <div class="me"></div>
            </aside>
        </div>
        <div class="emailcon">
          <div id="form-div">
            <form method="post" class="form" id="form1">
              
                <label for="name">Namn</label>
                <input type="text" name="email[name]" id="name" class="feedback-input" placeholder="Namn" required><br>
              
                <label for="email">Email</label>
                <input type="email" name="email[email_adress]" id="email" class="feedback-input" placeholder="Email" required><br>
              
                <label for="comment">Meddelande</label>
                <textarea name="email[message]" id="comment" cols="30" rows="10" class="feedback-input" placeholder="Meddelande" required></textarea><br>
            
                <input class="btn1" type="submit" id="submit">
                <input id="reset" class="btn1" type="reset" name="reset">
            </form>
          </div>
        </div>
    </div> <!--End cwrapper-->
</section>