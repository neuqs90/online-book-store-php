
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="IMAGES/LOGO.png" type="image/icon type">
    <title>Krishna Books</title>
    <style>
        header {
            margin-top: 50px;
        }

        a {
            letter-spacing: 2px;
        }

        nav a {
            margin-left: 50px;
            font-size: 20px;
        }

        nav {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: absolute;
            right: 0;
            padding: 0;
        }

        .profile-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-left: 50px;
            margin-right: 0;
            justify-content: right;
        }
        .profileimg:hover{
            cursor: pointer;
        }

        @media (max-width: 768px) {
            nav {
                margin-top: 60px;
                flex-direction: column;
                align-items: flex-start;
            }

            nav a {
                margin-left: 0;
                margin-top: 15px;
            }

            .profile-image {
                width: 50px;
                height: 50px;
                margin-top: 15px;
                margin-left: 0;
            }

            section{
              margin-top:130px;
            }
        }
    </style>
</head>
<body>
<!--HEADER CODE START-->
<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Krishna Books</span>
        </a>
        <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 flex flex-wrap items-center text-base justify-center">
            <a href="searchbook.php" class="mr-5 hover:text-gray-900">Search Book</a>
            <a href="admin.php" class="mr-5 hover:text-gray-900">Admin Panel</a>
            <?php
                if (isset($_COOKIE["userid"])) {
                    $flag = FALSE;
                    $conn = mysqli_connect("localhost", "root", "", "book_store");
                    if ($conn) {
                        $flag = TRUE;
                        $sql = "SELECT dp_location FROM users WHERE email = '" . $_COOKIE["userid"] . "' OR userid = '" . $_COOKIE["userid"] . "';";
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) { 
                            $flag = TRUE;
                            $row = mysqli_fetch_assoc($result);
                            $profileImage = $row["dp_location"];
                        }
                    }
                    if (!$flag || empty($profileImage)) {
                        $profileImage = "profile1.jpg";
                    }

                    echo '<a href="logout.php" class="profileimg mr-5 hover:text-gray-900">Logout</a>';
                    echo '<a href="profile.php">';
                    echo '<img src="PROFILES/' . $profileImage . '" alt="Profile Image" class="profile-image">';
                    echo '</a>';
                } else {
                    echo '<a href="login.php" class="mr-5 hover:text-gray-900">Login</a>';
                    echo '<a href="signup.php" class="mr-5 hover:text-gray-900">Sign Up</a>';
                }
                ?>

        </nav>

    </div>
</header>

<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
            <img class="object-cover object-center rounded" alt="hero" src="IMAGES/janko-ferlic-sfL_QOnmy00-unsplash.jpg">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Good Thought's Come
                <br class="hidden lg:inline-block">From Reading Book's
            </h1>
            <p class="mb-8 leading-relaxed">Copper mug try-hard pitchfork pour-over freegan heirloom neutra air plant cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken authentic tumeric truffaut hexagon try-hard chambray.</p>
            <div class="flex justify-center">
                <button id="myButton" class="inline-flex text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">Search Book 🔍</button>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "searchbook.php";
    };
</script>
</body>
</html>