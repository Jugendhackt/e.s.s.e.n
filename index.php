<html>

<head>
    <title>E.S.S.E.N. - Efficient Super Safe Erudite Network</title>

</head>

    <body bgcolor="steelblue">
        <h1 color="red">
            <img src="img/logo.jpg" height=10%>
            <center>E.S.S.E.N. - Efficient Super Safe Erudite Network</center>
        </h1>
        <style>
            .navbar {
                overflow: hidden;
                background-color: #333;
                font-family: Arial;
            }

            .navbar a {
                float: center;
                font-size: 16px;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            .dropdown {
                float: center;
                overflow: hidden;
            }

            .dropdown .dropbtn {
                font-size: 16px;
                border: none;
                outline: none;
                color: white;
                padding: 14px 16px;
                background-color: inherit;
                font-family: inherit;
                margin: 0;
            }

            .navbar a:hover,
            .dropdown:hover .dropbtn {
                background-color: red;
            }

            .dropdown-content {
                display: none;
                position: relative;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            .dropdown-content a {
                float: none;
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: center;
            }

            .dropdown-content a:hover {
                background-color: #ddd;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }
        </style>
        <div class="navbar">
            <center>
                <div class="dropdown">
                    <button class="dropbtn">Home
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#Food Items">Food Items</a>
                        <a href="#About Us">About Us</a>
                        <a href="#Our Objective">Our Objective</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Contact Us
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#OUR E-MAIL">E-Mail</a>
                        <a href="#REACH OUT TO US ON FACEBOOK">Facebook</a>
                        <a href="#CALL US">Telephone Number</a>
                        <a href="#FIND US">Address</a>
                    </div>
                </div>
            </center>
        </div>

        <br>
        <br>
        <center><img class="mySlides" src="img\Bananas.jpg" width="650px" height="500px"></center>
        <center><img class="mySlides" src="img\Trees.jpg" width="650px" height="500px"></center>
        <center><img class="mySlides" src="img\Fruits.jpeg" width="650px" height="500px"></center>

        <br>
        <center>
            <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>
        </center>

        <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                if (n > x.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = x.length
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x[slideIndex - 1].style.display = "block";
            }

            var slideIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > x.length) {
                    slideIndex = 1
                }
                x[slideIndex - 1].style.display = "block";
                setTimeout(carousel, 2000); // Change image every 2 seconds
            }
        </script>

        <br>
        <br>

        <h2 id="Food Items">
            <center> FOOD ITEMS </center>
        </h2>

        <br>
        <br>
        <style>
            * {
                box-sizing: border-box;
            }

            /* Create four equal columns that floats next to each other */
            .column {
                float: left;
                width: 25%;
                padding: 10px;
                height: 300px;
                /* Should be removed. Only for demonstration */
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Responsive layout - makes the four columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
                .column {
                    width: 100%;
                }
            }
        </style>

        <div class="row">
            <div class="column" style="background-color:#aaa;">
                <h3>
                    <center><a href="#" style="text-decoration:none;">FRUITS</a></center>
                </h3>
                <p>
                    <ul style="list-style-type:none;">
                        <center>
                            <li>
                                <h4><a href="product.php?id=Q2" style="text-decoration:none;">Apple</a></h4>
                            </li>
                            <li>
                                <h4><a href="product.php?id=Q10" style="text-decoration:none;">Banana</h4></a>
                            </li>
                            <li>
                                <h4><a href="product.php?id=Q9" style="text-decoration:none;">Mango</h4></a>
                            </li>
                        </center>
                    </ul>
                </p>
            </div>
            <div class="column" style="background-color:#bbb;">
                <h3><a href="#" style="text-decoration:none;">VEGETABLES</a></h3>
                <p>
                    <ul style="list-style-type:none;">
                        <center>
                            <li>
                                <h4><a href="#" style="text-decoration:none;">Onion</a></h4>
                            </li>
                            <li>
                                <h4><a href="#" style="text-decoration:none;">Potato</a></h4>
                            </li>
                            <li>
                                <h4><a href="#" style="text-decoration:none;">Tomato</a></h4>
                            </li>
                        </center>
                    </ul>
                </p>
            </div>
            <div class="column" style="background-color:#ccc;">
                <h3><a href="#" style="text-decoration:none;">PULSES</a></h3>
                <p>
                    <ul style="list-style-type:none;">
                        <center>
                            <li>
                                <h4><a href="#" style="text-decoration:none;">Green Peas</a></h4>
                            </li>
                            <li>
                                <h4><a href="#" style="text-decoration:none;">Kidney Beans</a></h4>
                            </li>
                            <li>
                                <h4><a href="#" style="text-decoration:none;">Lentils</a></h4>
                            </li>
                        </center>
                    </ul>
                </p>
            </div>
            <div class="column" style="background-color:#ddd;">
                <h3><a href="#" style="text-decoration:none;">CEREALS</a></h3>
                <p>
                    <ul style="list-style-type:none;">
                        <center>
                            <li>
                                <h4><a href="#" style="text-decoration:none;">Wheat</a></h4>
                            </li>
                            <li>
                                <h4><a href="#" style="text-decoration:none;">Rice</a></h4>
                            </li>
                            <li>
                                <h4><a href="#" style="text-decoration:none;">Corn</a></h4>
                            </li>
                        </center>
                    </ul>
                </p>
            </div>
        </div>


        <br>
        <br>

        <h2>
            <center>CONTACT US</center>
        </h2>

        <br>
        <br>

        <hr width="40%">
        <p>
            <h3 id="OUR E-MAIL">
                <center>OUR E-MAIL</center>
            </h3>
        </p>
        <p>
            <h4>
                <center> xyz@abc.com </center>
            </h4>
        </p>
        <br>
        <hr width="40%">
        <p>
            <h3 id="REACH OUT TO US ON FACEBOOK">
                <center>REACH OUT TO US ON FACEBOOK</center>
            </h3>
        </p>
        <p>
            <h4>
                <center> @xyzabc </center>
            </h4>
        </p>
        <br>
        <hr width="40%">
        <p>
            <h3 id="CALL US">
                <center>CALL US</center>
            </h3>
        </p>
        <p>
            <h4>
                <center> +00 999999999 </center>
            </h4>
        </p>
        <br>


        <hr width="40%">
        <p>
            <h3 id="FIND US">
                <center>FIND US</center>
            </h3>
        </p>
        <p>
            <h4>
                <center> 3, KG Marg, HC Mathur Lane, New Delhi, Delhi 110001 </center>
            </h4>
        </p>

        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="800" height="700" id="gmap_canvas" src="https://maps.google.com/maps?q=goethe%20institut&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>Werbung: <a href="https://www.pureblack.de">Pure Black GmbH</a>
            </div>
            <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    height: 500px;
                    width: 600px;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 500px;
                    width: 600px;
                }
            </style>
        </div>
    </body>
</html>
