<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!$_SESSION['username']) {
    header('Location: login_form.php');
    exit; // Stop further execution
}

require_once('../includes/connect.php');

// Query donations count
$stmtDonationsCount = $connection->prepare('SELECT COUNT(*) AS count FROM donations');
$stmtDonationsCount->execute();
$donationCount = $stmtDonationsCount->fetch(PDO::FETCH_ASSOC)['count'];

// Query volunteers count
$stmtVolunteersCount = $connection->prepare('SELECT COUNT(*) AS count FROM volunteers');
$stmtVolunteersCount->execute();
$volunteerCount = $stmtVolunteersCount->fetch(PDO::FETCH_ASSOC)['count'];

// Query messages count
$stmtMessagesCount = $connection->prepare('SELECT COUNT(*) AS count FROM contacts');
$stmtMessagesCount->execute();
$messageCount = $stmtMessagesCount->fetch(PDO::FETCH_ASSOC)['count'];

// Query messages
$stmtMessages = $connection->prepare('SELECT * FROM contacts ORDER BY created_at ASC');
$stmtMessages->execute();

// Query donations
$stmtDonations = $connection->prepare('SELECT * FROM donations ORDER BY created_at ASC');
$stmtDonations->execute();


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
<body class="user-website" data-page="home-cms">
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
            <h3>HOME PAGE</h3>
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
            <a href=""><img src="../images/FSixty6-logo.svg" alt="" class="logo"></a>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li class="active-user">
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
        <section class="grid-con" id="icons-users">
            <h2 class="hidden">User Icons Information</h2>
            <div class="col-span-full" id="cards-section">
                <div class="cards-icons">
                    <div>
                        <h3><?php echo $donationCount; ?></h3>
                        <h4>Donations</h4>
                    </div>
                    <div>
                        <i class="fa-solid fa-handshake-angle"></i>
                    </div>
                </div>
                <div class="cards-icons">
                    <div>
                        <h3><?php echo $volunteerCount; ?></h3>
                        <h4>Volunteers</h4>
                    </div>
                    <div>
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                </div>
                <div class="cards-icons">
                    <div>
                        <h3><?php echo $messageCount; ?></h3>
                        <h4>Messages</h4>
                    </div>
                    <div>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid-con">
            <h2 class="hidden">Message Table</h2>
            <div class="col-span-full l-col-start-1 l-col-end-8 table-section">
                <div class="header-table">
                    <h3>Messages</h3>
                    <a href="messages.php"><button>More</button></a>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <tr class="column-names">
                                    <td>Name</td>
                                    <td>Subject</td>
                                </tr>
                                <tbody>
                                    <?php
                                    while ($row = $stmtMessages->fetch(PDO::FETCH_ASSOC)) {
                                    echo
                                    '<tr>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['subject'].'</td>
                                    </tr>';
                                     }

                                $stmt = null;

                                ?>
                                </tbody>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>



            <div class="col-span-full l-col-start-9 l-col-end-13 table-section">
                <div class="header-table">
                    <h3>Donations</h3>
                    <a href="donations.php"><button>More</button></a>
                </div>
                <div class="table-responsive" id="donations-table">
                    <table>
                        <thead>
                            <tr>
                                <tr class="column-names">
                                    <td>Name</td>
                                    <td>Amount</td>
                                    <td class="hidden">Date</td>
                                </tr>
                                <tbody>
                                     <?php
                                    while ($row = $stmtDonations->fetch(PDO::FETCH_ASSOC)) {
                                    echo
                                    '<tr>
                                        <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                                        <td>'.$row['amount'].'</td>
                                        <td class="hidden">'.$row['email'].'</td>
                                    </tr>';
                                       }

                                $stmt = null;

                                ?>
                                
                                </tbody>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>