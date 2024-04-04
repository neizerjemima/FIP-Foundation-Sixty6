<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if (!$_SESSION['username']) {
    header('Location: login_form.php');
    exit; 
}

require_once('../includes/connect.php');

// Query to fetch Positions
$queryPositions = 'SELECT * FROM positions';
$stmtPositions = $connection->prepare($queryPositions);
$stmtPositions->execute();
$positions = $stmtPositions->fetchAll(PDO::FETCH_ASSOC);

// Query to fetch volunteer details including position
$queryVolunteer = 'SELECT v.*, p.id as position_id 
                   FROM teammembers v
                   LEFT JOIN positions p ON v.position = p.id 
                   WHERE v.id = :teamId';

$stmtVolunteer = $connection->prepare($queryVolunteer);
$teamId = $_GET['id'];
$stmtVolunteer->bindParam(':teamId', $teamId, PDO::PARAM_INT);
$stmtVolunteer->execute();
$row = $stmtVolunteer->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
    <link rel="Foundation Sixty 6 fav icon" type="image/svg" href="../images/logo_lightbox.svg"/>
    <link rel ="stylesheet" href="../css/main.css">
    <link rel ="stylesheet" href="../css/grid.css">
    <script src="https://kit.fontawesome.com/2436fc0b94.js" crossorigin="anonymous"></script>
    <script type="module" src="../js/main.js"></script>
</head>
<body class="user-website" data-page="cms">
    <header id="main-header-user" class="grid-con">

    
        <div class="box col-start-1 col-end-2 m-col-start-1 m-col-end-2 l-col-start-10 l-col-end-12 xl-col-start-10 xl-col-end-12"  id="user-section">

             <div class="nav-user">
                <ul id="list-user">
              <li><i class="fa-solid fa-caret-down" id="triangle"></i>
                    <a href="logout.php"><ul class="dropdown">
                    <li>Log Out</li></a>
                    </ul>
                </li>
                </ul>
            </div>
            <h3 class="hidden" id="user-name"><?php echo $_SESSION['username']; ?></h3>
        </div>
        <div class="box m-col-start-2 m-col-end-6 l-col-start-1 l-col-end-5 xl-col-start-1 xl-col-end-5" id="title-section">
            <h3>TEAM</h3>
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
                  <li class="active-user">
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
                  <li>
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
            <a href="team_more.php?id=<?php echo $row['id']; ?>"><button>Go Back</button></a>
        </div>

        <div class="col-span-full more-information-section">
            <form action="edit_team.php" method="POST">
                <input name="pk" type="hidden" value="<?php echo $row['id']; ?>">
                <div class="more-information more-information-flex">
                    <label for="firstname">First Name: </label>
                    <input name="firstname" type="text" value="<?php echo $row['firstname']; ?>">
                </div>
                <div class="more-information more-information-flex">
                    <label for="lastname">Last Name: </label>
                    <input name="lastname" type="text" value="<?php echo $row['lastname']; ?>">
                </div>
                <div class="more-information more-information-flex">
                    <label for="photo">Photo: </label>
                    <input name="photo" type="text" value="<?php echo $row['photo']; ?>">
                </div>


                <div class="more-information">
                <label for="position">Position: </label>
           <select name="position" class="dropdown-userinter">
        <?php foreach ($positions as $position): ?>
            <?php if ($position['id'] == $row['position']): ?>
                <option value="<?php echo $position['id']; ?>" selected><?php echo $position['title']; ?></option>
            <?php else: ?>
                <option value="<?php echo $position['id']; ?>"><?php echo $position['title']; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
            </div>



                <div class="more-information more-information-long">
                    <label for="description">Description: </label>
                    <textarea name="description"><?php echo $row['description']; ?></textarea>
                </div>
                <div class="col-start-2 col-end-5 m-col-start-6 m-col-end-13 xl-col-start-7 xl-col-end-13 buttons-more-info">
                    <button type="submit" name="save">Save</button>
                </div>
            </form>
        </div>
    </section>
</main>


</body>
</html>
