<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if(!$_SESSION['username']) {
  header( 'Location: login_form.php');
}

require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT * FROM gethelps WHERE gethelps.id = :gethelpId');
$gethelpId = $_GET['id'];
$stmt->bindParam(':gethelpId', $gethelpId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel ="stylesheet" href="../css/main.css">
    <link rel ="stylesheet" href="../css/grid.css">
    <script src="https://kit.fontawesome.com/2436fc0b94.js" crossorigin="anonymous"></script>
    <script type="module" src="../js/main.js"></script>
</head>
<body class="user-website" data-page="volunteer-more-cms">
    <header id="main-header-user" class="grid-con">

    
        <div class="box col-start-1 col-end-2 m-col-start-1 m-col-end-2 l-col-start-10 l-col-end-12 xl-col-start-10 xl-col-end-12"  id="user-section">

            <div class="nav-user">
                <ul id="list-user">
              <li><i class="fa-solid fa-caret-down" id="triangle"></i>
                    <ul class="dropdown">
                    <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            <h3 class="hidden" id="user-name"><?php echo $_SESSION['username']; ?></h3>
        </div>
        <div class="box m-col-start-2 m-col-end-6 l-col-start-1 l-col-end-5 xl-col-start-1 xl-col-end-5" id="title-section">
            <h3>GET HELP</h3>
        </div>


        <div class="box col-start-4 col-end-5 m-col-start-12 m-col-end-13" id="burger-nav">
            <h2 class="hidden">Main Navigation</h2>
			<button class="hamburger">
				<img src="../images/white-burger.png" alt="Burger Menu" id="hamburger-image">
			</button>  
        </div>
        <nav class="burger_menu">
             <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="volunteer.php">Volunteers</a></li>
                <li><a href="team.php">Team</a></li>
                <li><a href="collaborators.php">Collaborators</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="newsletter.html">Newsletter</a></li>
                <li><a href="donations.php">Donations</a></li>
                <li><a href="articles.php">Articles</a></li>
                <li><a href="gethelp.php">Get Help</a></li>
                <li><a href="messages.php">Messages</a></li>
            </ul>
        </nav>
    </header>

    <div class="sidebar">
        <div class="sidebar-brand">
            <a href="home.php"><img src="../images/FSixty6-logo.svg" alt="" class="logo"></a>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="home.php">Home</a>
                  </li>
                  <li>
                    <a href="volunteer.php" >Volunteers</a>
                  </li>
                  <li>
                    <a href="team.php" >Team</a>
                  </li>
                  <li>
                    <a href="collaborators.php" >Collaborators</a>
                  </li>
                  <li>
                    <a href="events.php" >Events</a>
                  </li>
                  <li>
                    <a href="newsletter.php" >Newsletter</a>
                  </li>
                  <li>
                    <a href="donations.php" >Donations</a>
                  </li>
                  <li>
                    <a href="articles.php" >Articles</a>
                  </li>
                  <li class="active-user">
                    <a href="gethelp.php">Get Help</a>
                  </li>
                  <li>
                    <a href="messages.php" >Messages</a>
                  </li>
            </ul>
        </div>
    </div>


    <main class="content-user">

        <section class="grid-con">
            <h2 class="hidden">Volunteer More Information</h2>

            <div class="col-start-2 col-end-5 m-col-start-6 m-col-end-13 xl-col-start-7 xl-col-end-13 buttons-more-info">
                <a href="gethelp.php"><button>Go Back</button></a>
            </div>

            <div class="col-span-full more-information-section">
                <div class="more-information more-information-flex">
                    <h3>Name:</h3>
                    <p><?php echo $row['name']; ?></p>
                </div>
                <div class="more-information more-information-flex">
                    <h3>Subject:</h3>
                    <p><?php echo $row['subject']; ?></p>
                </div>
                <div class="more-information more-information-flex">
                    <h3>Email:</h3>
                    <p><?php echo $row['email']; ?></p>
                </div>
                <div class="more-information more-information-long">
                    <h3>Message:</h3>
                    <p><?php echo $row['message']; ?></p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>