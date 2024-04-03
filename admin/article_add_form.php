<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel ="stylesheet" href="../css/main.css">
    <link rel ="stylesheet" href="../css/grid.css">
    <script src="https://kit.fontawesome.com/2436fc0b94.js" crossorigin="anonymous"></script>
    <script type="module" src="../js/main.js"></script>
</head>
<body class="user-website" data-page="volunteer-add-cms">
    <header id="main-header-user" class="grid-con">

    
        <div class="box col-start-1 col-end-2 m-col-start-1 m-col-end-2 l-col-start-10 l-col-end-12 xl-col-start-10 xl-col-end-12"  id="user-section">

            <div class="nav-user">
                <ul id="list-user">
                <li><a href="#"><i class="fa-solid fa-caret-down" id="triangle"></i></a>
                    <ul class="dropdown">
                    <li><a href="#">Edit Profile</a></li>
                    <li><a href="#">Log Out</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            <h3 class="hidden" id="user-name">User Name</h3>
        </div>
        <div class="box m-col-start-2 m-col-end-6 l-col-start-1 l-col-end-5 xl-col-start-1 xl-col-end-5" id="title-section">
            <h3>VOLUNTEERS</h3>
        </div>


        <div class="box col-start-4 col-end-5 m-col-start-12 m-col-end-13" id="burger-nav">
            <h2 class="hidden">Main Navigation</h2>
			<button class="hamburger">
				<img src="../images/white-burger.png" alt="Burger Menu" id="hamburger-image">
			</button>  
        </div>
        <nav class="burger_menu">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="volunteer.html">Volunteers</a></li>
                <li><a href="team.html">Team</a></li>
                <li><a href="collaborators.html">Collaborators</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="donations.html">Donations</a></li>
                <li><a href="articles.html">Articles</a></li>
                <li><a href="gethelp.html">Get Help</a></li>
                <li><a href="messages.html">Messages</a></li>
            </ul>
        </nav>
    </header>

    <div class="sidebar">
        <div class="sidebar-brand">
            <a href=""><img src="../images/FSixty6-logo.svg" alt="" class="logo"></a>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="home.html">Home</a>
                  </li>
                  <li class="active-user">
                    <a href="volunteer.html" >Volunteers</a>
                  </li>
                  <li>
                    <a href="" >Team</a>
                  </li>
                  <li>
                    <a href="" >Collaborators</a>
                  </li>
                  <li>
                    <a href="" >Events</a>
                  </li>
                  <li>
                    <a href="" >Events</a>
                  </li>
                  <li>
                    <a href="" >Donations</a>
                  </li>
                  <li>
                    <a href="" >Articles</a>
                  </li>
                  <li>
                    <a href="">Get Help</a>
                  </li>
                  <li>
                    <a href="" >Messages</a>
                  </li>
            </ul>
        </div>
        </div>


    <main class="content-user">

        <section class="grid-con">
            <h2 class="hidden">Volunteer More Information</h2>
          
        
            <div class="col-start-2 col-end-5 m-col-start-6 m-col-end-13 xl-col-start-7 xl-col-end-13 buttons-more-info">
                <a href="volunteer.php"><button>Go Back</button></a>
            </div>

            <form action="add_article.php" method="post"  enctype="multipart/form-data" class="col-span-full">

            <div class="col-span-full more-information-section">
                <div class="more-information more-information-flex">
                    <label for="title">Title: </label>
                    <input name="title" type="text">
                </div>
                <div class="more-information more-information-flex">
                    <label for="image">Image: </label>
                    <input name="image" type="file" >
                </div>
                <div class="more-information more-information-long">
                    <label for="author">Author: </label>
                    <select name="author">
                            <?php
                            require_once('../includes/connect.php');
                            // Query to fetch authors
                            $query = 'SELECT * FROM authors';
                            $stmt = $connection->prepare($query);
                            $stmt->execute();
                            $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // Populate dropdown with roles
                            foreach ($authors as $author) {
                                echo "<option value='{$author['id']}'>{$author['first_name']} {$author['last_name']}</option>";
                            }
                            ?>
                        </select>
                </div>
                <div class="more-information more-information-long">
                    <label for="attention_phrase">Headline: </label>
                    <textarea name="attention_phrase"></textarea>
                </div>
                <div class="more-information more-information-long">
                    <label for="text">Text: </label>
                    <textarea name="text"></textarea>
                </div>
                     <div class="col-start-2 col-end-5 m-col-start-6 m-col-end-13 xl-col-start-7 xl-col-end-13 buttons-more-info">
                    <button type="submit" name="save">Save</button>
                </div>
            </div>
        </form>
        </section>
    </main>
</body>
</html>