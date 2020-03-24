<footer>
    <div class="footer-bg">
        <div class="wrapper">
            <div class="footer-text">
                <h2>2020 © Design by Vadim Samoylov</h2>
            </div>
        </div>
    </div>
</footer>

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      var card = this.parentNode.parentNode;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
        var tmp = card.offsetHeight;
        card.style.height = parseInt(tmp - panel.scrollHeight) + "px";
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        var tmp = card.offsetHeight;
        card.style.height = parseInt(tmp + panel.scrollHeight) + "px";
      } 
    });
  }
</script>

<script>
    var like_select = document.getElementsByClassName("value-score-row");
    var i;

    for (i = 0; i < like_select.length; i+=4) {
        like_select[i].addEventListener("change", function() {
            var bth = this.nextElementSibling;
            bth.childNodes[1].style.display = 'block';
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('.btn-save_like').click(function(e) {
            this.style.display = 'none';
        });
    });
</script>

<script>
    var change_pas_button = document.getElementById('change_pas_view');
    var change_pas_form = document.querySelector('.change_pas');
    var change_pas_close = document.getElementById('changePas_close');

    change_pas_button.addEventListener("click", function () {
        change_pas_form.style.display = 'block';
    });

    change_pas_close.addEventListener("click", function () {
        change_pas_form.style.display = 'none';
    });

</script>

<script type="text/javascript">

    var slideIndex = 1;
    $(document).ready(function () {
        var f_page = document.getElementById('firstPage_Slider');
        f_page.style.display = 'block';
        autoSlider();
    });

    $(document).ready(function() {
        $('#loginform').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/methods/post/login.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                        window.location.reload();
                    }
                    else
                    {
                        var error = document.getElementById('errorslogin');
                        error.style.display = 'block';
                        error.innerHTML = jsonData.text;
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('#singUpform').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/methods/post/signup.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                        var error = document.getElementById('errorsSignUp');
                        error.style.display = 'none';
                        var success = document.getElementById('signUpSuccess');
                        success.style.display = 'block';
                    }
                    else
                    {
                        var error = document.getElementById('errorsSignUp');
                        error.style.display = 'block';
                        error.innerHTML = jsonData.text;
                    }
                }
            });
        });
    });

    $(document).ready(function() {

        $('.likeform').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/methods/post/likephoto.php',
                data: $(this).serialize(),
                success: function (response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        window.location.reload();
                    } else {
                        alert(jsonData.text);
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('.delImgform').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '../post/delphoto.php',
                data: $(this).serialize(),
                success: function (response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        window.location.reload();
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('.editImgform').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '../post/editphoto.php',
                data: $(this).serialize(),
                success: function (response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        alert("Успешно.");
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('#profileform').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '../post/change_userInfo.php',
                data: $(this).serialize(),
                success: function (response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        var error = document.getElementById('errorsProfile');
                        error.style.display = 'none';
                        var success = document.getElementById('changeInfSuccess');
                        success.style.display = 'block';
                    } else {
                        if(jsonData.text != undefined) {
                            var success = document.getElementById('changeInfSuccess');
                            success.style.display = 'none';
                            var error = document.getElementById('errorsProfile');
                            error.style.display = 'block';
                            error.innerHTML = jsonData.text;
                        }
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('#changePasform').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '../post/change_password.php',
                data: $(this).serialize(),
                success: function (response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        var error = document.getElementById('errorsChPas');
                        error.style.display = 'none';
                        var success = document.getElementById('changePasSuccess');
                        success.style.display = 'block';
                    } else {
                        if(jsonData.text != undefined) {
                            var success = document.getElementById('changePasSuccess');
                            success.style.display = 'none';
                            var error = document.getElementById('errorsChPas');
                            error.style.display = 'block';
                            error.innerHTML = jsonData.text;
                        }
                    }
                }
            });
        });
    });
</script>

<script type="text/javascript" src="/js/main.js"></script>
<script src="lightbox2-2.11.1/dist/js/lightbox-plus-jquery.js"></script>

</body>
</html>