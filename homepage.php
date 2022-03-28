<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>

    </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>QuizVilla</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style1.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        function validate_email(field, alerttxt) {
            with(field) {
                apos = value.indexOf("@");
                dotpos = value.lastIndexOf(".");
                if (apos < 1 || dotpos - apos < 2) {
                    alert(alerttxt);
                    return false;
                } else {
                    return true;
                }
            }
        }

        function validate_form(thisform) {
            with(thisform) {
                if (validate_email(email, "Not a valid e-mail address!") == false) {
                    email.focus();
                    return false;
                }
            }
        }
    </script>
</head>

<body>
    <!--Navigation bar-->
    <div class="container" id="blur">
        <header>
            <a class="logo" href=""><img src="https://images.ctfassets.net/rvt0uslu5yqp/7FI47EbYWgjYdYAlV8PLVY/e5ac6ee913ad9723a039f8f4c96676d6/Mentimeter_Web_Quiz_2020-03.png" alt="logo" height="50px" width="70px" /></a>

            <nav>
                <ul class="nav__links">
                    <li><a class="phpRegister">Sign Up</a></li>
                    <li><a class="phpLogin">Log In</a></li>
                    <li><a href="">Homepage</a></li>
                    <li><a href="#categories">Categories</a></li>
                    <li><a href="#us">About us</a></li>
                    <li><a class="phpLogout">Logout</a></li>
                </ul>

            </nav>
            <p class="topUserName"><?php echo $_SESSION['name'] ?></p>
            <a class="cta" href="#show">CONTACT</a>
            <p class="menu cta">MENU</p>
        </header>
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a class="phpRegister">Sign Up</a>
                <a class="phpLogin">Login In</a>
                <a href="">Homepage</a>
                <a href="#categories" id="cats">Categories</a>
                <a href="#us" id="abtus">About us</a>
                <a class="phpLogout">Logout</a>
            </div>
        </div>

        <script>
            $(".phpRegister").click(() => {
                window.location.assign("register.php");
            });
            $(".phpLogin").click(() => {
                window.location.assign("index.php");
            });
            $(".phpLogout").click(() => {
                window.location.assign("logout.php");
            });
            const doc = document;
            const menuOpen = doc.querySelector(".menu");
            const menuClose = doc.querySelector(".close");
            const overlay = doc.querySelector(".overlay");
            const selection1 = doc.querySelector("#cats");
            const selection2 = doc.querySelector("#abtus");

            menuOpen.addEventListener("click", () => {
                overlay.classList.add("overlay--active");
            });

            menuClose.addEventListener("click", () => {
                overlay.classList.remove("overlay--active");
            });

            selection1.addEventListener("click", () => {
                overlay.classList.remove("overlay--active");
            });

            selection2.addEventListener("click", () => {
                overlay.classList.remove("overlay--active");
            });
        </script>
        <!--Navigation end-->
        <!--Heading-->
        <h1 class="fade">
            <div class="sign">
                <span class="fast-flicker">QUIZ</span><span class="flicker">VILLA</span>
            </div>
        </h1>

        <!--Heading ends-->
        <!-- From here is for the Categories(cards) -->
        <div class="cback">
            <div class="row" id="categories">
                <div class="column">
                    <img src="https://image.slidesharecdn.com/mentalmathworks-160727140956/95/mental-math-works-1-638.jpg" width="300" height="200" />
                    <h2 id="cat_heads" class="mental_maths">Mental Maths</h2>
                    <p></p>
                </div>
                <div class="column">
                    <img src="https://www.forbesindia.com/media/images/2019/Oct/img_122803_media_and_entertainment.jpg" width="300" height="200" />
                    <h2 id="cat_heads" class="entertainment">Entertainment</h2>
                    <p></p>
                </div>
                <div class="column">
                    <img src="https://static.vecteezy.com/system/resources/previews/000/086/217/non_2x/free-latest-news-vector-icons.jpg" width="300" height="200" />
                    <h2 id="cat_heads" class="current_affairs">Current Affairs</h2>
                    <p></p>
                </div>
                <div class="column">
                    <img src="https://thumbs.dreamstime.com/b/healthy-food-background-fruits-vegetables-cereal-nuts-superfood-dietary-balanced-vegetarian-eating-products-kitchen-143677456.jpg" width="300" height="200" />
                    <h2 id="cat_heads" class="food">Food</h2>
                    <p></p>
                </div>
                <div class="column">
                    <img src="https://images.freecreatives.com/wp-content/uploads/2015/09/sports-icon2.jpg" width="300" height="200" />
                    <h2 id="cat_heads" class="sports">Sports</h2>
                    <p></p>
                </div>
                <div class="column">
                    <img src="https://media.istockphoto.com/vectors/laboratory-medicine-vector-flat-style-design-illustration-vector-id1205436105?k=6&m=1205436105&s=612x612&w=0&h=nK9N6wfcm8K0fRss8zD_5KLcyUgPXUByTl3hPX3pBBg=" width="300" height="200" />
                    <h2 id="cat_heads" class="science">Science</h2>
                    <p></p>
                </div>
                <div class="column">
                    <img src="https://i.pinimg.com/originals/1a/fc/cc/1afccc485311cfc567b7c20da6877b64.jpg" width="300" height="200" />
                    <h2 id="cat_heads" class="english">English</h2>
                    <p></p>
                </div>
                <div class="column">
                    <img src="https://media2.govtech.com/images/940*716/shutterstock_749866270.jpg" width="300" height="200" />
                    <h2 id="cat_heads" class="cyber_security">Cyber Security</h2>
                    <p></p>
                </div>
                <div class="column">
                    <img src="https://previews.customer.envatousercontent.com/files/219540978/preview.jpg" width="300" height="200" />
                    <h2 id="cat_heads" class="computer_science">Computer science</h2>
                    <p></p>
                </div>
                <div class="column">
                    <img src="https://thumbs.dreamstime.com/b/collage-displaying-rich-cultural-heritage-india-vector-illustration-75633124.jpg" width="300" height="200" />
                    <h2 id="cat_heads" class="culture_and_heritage">Culture and Heritage</h2>
                    <p></p>
                </div>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="cross">&times;</span>
                        <h2 id="h2">Choose the Sub-category</h2>
                        <br />
                        <center>
                            <a id="Subcategory1" class="Subcat">Subcategory1</a>
                        </center>
                        <br />
                        <center>
                            <a id="Subcategory2" class="Subcat">Subcategory2</a>
                        </center>
                        <br />
                        <center style="display: none">
                            <a id="Subcategory3" class="Subcat">Subcategory3</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var modal = document.getElementById("myModal");
            var btn = document.getElementById("cat_heads");
            var span = document.getElementsByClassName("cross")[0];

            $(".column").click(() => {
                modal.style.display = "block"; //To display Modal Box for all category cards
            });
            span.onclick = function() {
                modal.style.display = "none";
            };
            window.onclick = (event) => {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            };
        </script>
        <script type="text/javascript">
            //fade heading
            $(function() {
                var documentEl = $(document),
                    fadeElem = $(".fade");
                documentEl.on("scroll", function() {
                    var currScrollPos = documentEl.scrollTop();
                    fadeElem.each(function() {
                        var $this = $(this),
                            elemOffsetTop = $this.offset().top;
                        if (currScrollPos > elemOffsetTop)
                            $this.css("opacity", 1 - (currScrollPos - elemOffsetTop) / 400);
                    });
                });
            });
            var Classs;
            const subcats = [{
                category: "mental_maths",
                subcat1: "Critical Thinking",
                subcat1id: "mm1",
                subcat2: "Maths Storming",
                subcat2id: "mm2",
            }, {
                category: "entertainment",
                subcat1: "Harry Potter",
                subcat2: "The Vampire Diaries",
                subcat3: "F.R.I.E.N.D.S",
                subcat1id: "et1",
                subcat2id: "et2",
                subcat3id: "et3",
            }, {
                category: "current_affairs",
                subcat1: "General Awareness",
                subcat2: "Indian Polity",
                subcat1id: "cua1",
                subcat2id: "cua2",
            }, {
                category: "food",
                subcat1: "Indian",
                subcat2: "Korean",
                subcat3: "Mexican",
                subcat1id: "f1",
                subcat2id: "f2",
                subcat3id: "f3",
            }, {
                category: "sports",
                subcat1: "Football",
                subcat2: "Sports-Mashup",
                subcat1id: "sp1",
                subcat2id: "sp2",
            }, {
                category: "science",
                subcat1: "Chemistry",
                subcat2: "Physics",
                subcat1id: "sc1",
                subcat2id: "sc2",
            }, {
                category: "english",
                subcat1: "Shashi tharoor",
                subcat2: "Books",
                subcat3: "Who said it",
                subcat1id: "en1",
                subcat2id: "en2",
                subcat3id: "en3",
            }, {
                category: "cyber_security",
                subcat1: "Security Protocols",
                subcat2: "Ports and Its Types",
                subcat1id: "cyber1",
                subcat2id: "cyber2",
            }, {
                category: "computer_science",
                subcat1: "Data Structures and Algorithms",
                subcat2: "Software Engineering",
                subcat3: "Artificial Intelligence / IOT",
                subcat1id: "cs1",
                subcat2id: "cs2",
                subcat3id: "cs3",
            }, {
                category: "culture_and_heritage",
                subcat1: "Indian heritage",
                subcat2: "World history",
                subcat1id: "cah1",
                subcat2id: "cah2",
            }, ];

            var Classkanaam;
            var currSubCat;

            $(".column").click(function() {
                Classkanaam = this.childNodes[3].className;
                currSubCat = subcats.filter(
                    (subcat) => subcat.category === Classkanaam
                );
                $("#Subcategory1").text(`${currSubCat[0].subcat1}`);
                $("#Subcategory2").text(`${currSubCat[0].subcat2}`);

                $("#Subcategory1").click(() => {
                    window.open(`game.html?cat=${currSubCat[0].subcat1id}`, "_self");
                });
                $("#Subcategory2").click(() => {
                    window.open(`game.html?cat=${currSubCat[0].subcat2id}`, "_self");
                });
                if (currSubCat[0].subcat3) {
                    document.querySelector("#Subcategory3").parentNode.style.display =
                        "block";
                    $("#Subcategory3").text(`${currSubCat[0].subcat3}`);
                    $("#Subcategory3").click(() => {
                        window.open(`game.html?cat=${currSubCat[0].subcat3id}`, "_self");
                    });
                } else {
                    document.querySelector("#Subcategory3").parentNode.style.display = "none";
                }
            });
        </script>
        <!--Category ends-->
        <div id="leaderboard">
            <a href="highscores.html" class="ldb"> Leaderboard <i class="fas fa-crown"></i></a>
        </div>

        <!--footer-->
        <footer>
            <table>
                <tr>
                    <td>
                        <p><button id="show" onclick="toggle()">CONTACT US</button></p>
                        <br />
                        <p>
                            Give your feedback here. It will be a pleasure for us to know your feeedback.
                        </p>
                    </td>
                    <td></td>
                    <td id="us">
                        <p>Website created by :</p>
                        <p>Adnan Khan</p>
                        <p>Anshika Verma</p>
                        <p>Param Chawla</p>
                        <p>Soumya Singh</p>
                        <p>Trisha Sinha</p>
                    </td>
                </tr>
            </table>
        </footer>
    </div>
    <div id="popup" class="box">
        <button onclick="toggle()" class="close">&times;</button><br /><br />
        <form action="feedback.php" method="post" name="form">
        <!-- <form action="feedback.php" onsubmit="alert('Done')" method="post" name="form"> -->
            NAME : <input type="text" size="50" name="name" required /><br /><br /> EMAIL : <input type="text" size="50" name="email" /><br /><br /> SELECT CATEGORY :
            <select name="category">
                <option value="" disabled selected hidden></option>
                <option value="General">General</option>
                <option value="Mental Maths">Mental Maths</option>
                <option value="Entertainment">Entertainment</option>
                <option value="Current Affairs">Current Affairs</option>
                <option value="Food">Food</option>
                <option value="Sports">Sports</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                <option value="Cyber Security">Cyber Security</option>
                <option value="Technology">Technology</option>
                <option value="Culture & Heritage">Culture & Heritage</option>
            </select>
            <br /><br />
            <label for="feed">FEEDBACK :</label><br /><br />
            <textarea id="feedback" name="feed" rows="5" cols="60"></textarea>
            <br /><br />
            <center>
                <input id="sub" type="submit" name="submit" value="SUBMIT" />
            </center>
        </form>
    </div>
</body>
<script type="text/javascript">
    function toggle() {
        var blur = document.getElementById("blur");
        blur.classList.toggle("active");
        var popup = document.getElementById("popup");
        popup.classList.toggle("active");
    }
</script>
<script src="game.js"></script>
<!--footer ends-->

</html>