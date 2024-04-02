<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if(!$_SESSION['username']) {
  header( 'Location: login_form.php');
}

require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT v.*, r.title AS position_title FROM teammembers v JOIN teams r ON v.position = r.id ORDER BY v.created_at ASC');
$stmt->execute();
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
<body class="user-website" data-page="volunteer-principal-cms">
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
            <h2 class="hidden">Volunteer Table</h2>

            <div class="col-start-2 col-end-5 m-col-start-6 m-col-end-13 xl-col-start-7 xl-col-end-13 buttons-more-info">
                <a href="volunteer_add_form.php"><button>CREATE</button></a>
            </div>

            <div class="col-span-full l-col-start-1 l-col-end-13 table-section volunteer-general">
                <div class="table-responsive">
                    <table>
                        <thead>
                                <tr class="column-names">
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td class="dropdown-table">
                                        <select class="dropdown-select">
                                            <option value="email-volunteer">Email</option>
                                            <option value="phone-volunteer">Phone</option>
                                            <option value="message-volunteer">Message</option>
                                            <option value="notes-volunteer">Notes</option>
                                        </select>
                                    </td>
                                    <td class="desktop-options hidden">Email</td>
                                    <td class="desktop-options hidden">Phone</td>
                                    <td class="desktop-options hidden">Category</td>
                                    <td class="desktop-options hidden">Notes</td>
                                    <td>Action</td>
                                </tr>
                                <tbody>
                                    <tr>

                                <?php

                                

                                 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $first_three_words = implode(' ', array_slice(explode(' ', $row['notes']), 0, 3));
                                    echo 
                                        '<td>'.$row['firstname'].'</td>
                                        <td>'.$row['lastname'].'</td>
                                        <td class="email-volunteer">'.$row['email'].'</td>
                                        <td class="phone-volunteer hidden">'.$row['phone'].'</td>
                                        <td class="message-volunteer hidden">'.$row['role_name'].'</td>
                                        <td class="notes-volunteer hidden">'.$first_three_words.'...</td>
                                        <td class="buttons-column">
                                            <a href="volunteer_more.php?id='.$row['id'].'"><button class="button-table-general">More</button></a>
                                            <a href="volunteer_edit.php?id='.$row['id'].'"><button class="button-table-general">Edit</button></a>
                                            <a href="delete_volunteer.php?id='.$row['id'].'"><button class="button-table-general">Delete</button></a>
                                        </td>
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