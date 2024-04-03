<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if (!$_SESSION['username']) {
    header('Location: login_form.php');
    exit; 
}

require_once('../includes/connect.php');

// Query to fetch authors
$queryAuthors = 'SELECT * FROM authors';
$stmtAuthors = $connection->prepare($queryAuthors);
$stmtAuthors->execute();
$authors = $stmtAuthors->fetchAll(PDO::FETCH_ASSOC);


// Query to fetch volunteer details including role_name
$queryArticle = 'SELECT v.*, r.first_name AS author_fname, r.last_name AS author_lname 
                   FROM articles v 
                   LEFT JOIN authors r ON v.author = r.id 
                   WHERE v.id = :articleId';

$stmtArticle = $connection->prepare($queryArticle);
$articleId = $_GET['id'];
$stmtArticle->bindParam(':articleId', $articleId, PDO::PARAM_INT);
$stmtArticle->execute();
$row = $stmtArticle->fetch(PDO::FETCH_ASSOC);
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
<body class="user-website" data-page="volunteer-edit-cms">
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
            <a href="article_more.php?id=<?php echo $row['id']; ?>"><button>Go Back</button></a>
        </div>

        <div class="col-span-full more-information-section">
            <form action="edit_article.php" method="POST">
                <input name="pk" type="hidden" value="<?php echo $row['id']; ?>">
                <div class="more-information more-information-flex">
                    <label for="title">Title: </label>
                    <input name="title" type="text" value="<?php echo $row['title']; ?>">
                </div>
                <div class="more-information more-information-flex">
                    <label for="image">Image: </label>
                    <input name="image" type="text" value="<?php echo $row['image']; ?>">
                </div>
                <div class="more-information">
                    <label for="author">Author: </label>
                    <select name="author">
                        <?php foreach ($authors as $author): ?>
                            <option value="<?php echo $author['id']; ?>" <?php echo ($author['id'] == $row['author']) ? 'selected' : ''; ?>>
                                <?php echo $author['first_name'] . ' ' . $author['last_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="more-information more-information-long">
                    <label for="attention_phrase">Phrase: </label>
                    <textarea name="attention_phrase"><?php echo $row['attention_phrase']; ?></textarea>
                </div>

                <div class="more-information more-information-long">
                    <label for="text">Text: </label>
                    <textarea name="text"><?php echo $row['text']; ?></textarea>
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