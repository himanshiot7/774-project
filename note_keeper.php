<?php
include 'connect.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if(isset($_GET['idemail'])) {
        $id = $_GET['idemail'];

        $title = $_POST['title'];
        $body = $_POST['content'];

        $sql = "INSERT INTO notes(note_title, note_content, user_id) VALUES ('$title', '$body', '$id')";
        $resultUpload = mysqli_query($conn, $sql);
        if(!$resultUpload) {
          exit;
        }
      }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Keeper</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Note Keeper</h1>
        <!-- Displaying Email ID -->
        <div>
            <h2>
                <?php
                if (isset($_GET['idemail'])) {
                    $id = $_GET['idemail'];
                    echo "ID: " . htmlspecialchars($id);
                } else {
                    echo "No email ID provided in the URL.";
                }
                ?>
            </h2>
        </div>

        <!-- Note Form -->
        <form method="post">
            <div class="note-form">
                <input type="text" name="title" id="note-title" placeholder="Note Title" required>
                <textarea id="note-content" name="content" placeholder="Type your note here..." required></textarea>
                <button name="addnote" type="submit">Add Note</button>
            </div>
        </form>

        <!-- Notes Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Note</th>
                    <th>Content</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';

                $email = $_GET['idemail'];
                $sql = "SELECT * FROM notes WHERE user_id = '$email'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $note_title = $row['note_title'];
                        $note_content = $row['note_content'];
                        $id = $row['id'];
                        echo ' 
                        <tr>
                            <td>' . htmlspecialchars($note_title) . '</td>
                            <td>' . htmlspecialchars($note_content) . '</td>
                            <td>
                                <button class="btn btn-danger">
                                    <a id="delete" href="note_keeper.php?deleteid=' . $id . '&idemail=' . urlencode($email) . '">Remove</a>
                                </button>
                            </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
