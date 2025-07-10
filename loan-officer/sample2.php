<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Responsive Search with PHP and MySQL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .search-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    form {
      width: 100%;
      max-width: 500px;

    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
    }
    input[type="submit"] {
      padding: 10px;
      font-size: 16px;
      margin-top: 10px;
      background-color: #333;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #555;
    }
    @media (min-width: 600px) {
      .search-container {

        flex-direction: row;
        justify-content: center;
      }
      input[type="text"] {
        flex: 1;
        margin-right: 10px;
      }
      input[type="submit"] {
        margin-top: 0;
      }
    }
    .results {
      max-width: 600px;
      margin: 20px auto;
    }
    .result-item {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
  </style>

</head>
<body>
  <div class="search-container">
    <form method="GET" action="">
      <input type="text" name="query" placeholder="Search items..." required>
      <input type="submit" value="Search">

    </form>
    <p id='view'></p>
    <script>id</script>
    <form action="search.php" method="POST">
      <input type="hidden" name="fullname" id="view2">
      <button>sub</button>
    </form>
  </div>

  <?php
  include 'includes/dbconfig.php';

  if (isset($_GET['query'])) {
      $search = $conn->real_escape_string($_GET['query']);
      $sql = "SELECT * FROM debtor WHERE fullname LIKE '%$search%' OR firstname LIKE '%$search%' OR midname LIKE '%$search%' OR lastname LIKE '%$search%'";
      $result = $conn->query($sql);

      echo "<div class='results'>";
      echo "<h3>Results for: <strong>" . htmlspecialchars($search) . "</strong></h3>";

      if ($result->num_rows > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              $fullname = $row["fullname"];
              echo "<div class='result-item'>";
              echo "<a href='#' class='result-link' data-id='".$fullname."'>"."<strong>" . $fullname."</strong></a><br>";
              echo "<small>" . htmlspecialchars($row['firstname']) . "</small>";
              echo "</div>";


              //$_SESSION['fullname'] = $row['fullname'];
          }

      } else {
          echo "<p>No results found.</p>";
      }
      echo "</div>";
  }

  $conn->close();
  ?>
</body>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Attach event to all links
    const view = document.getElementById('view');
    document.querySelectorAll('.result-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
          //  alert("You clicked on ID: " + id + id);
            document.getElementById('view').innerHTML = id ;
            document.getElementById('view2').value = id ;

          //  window.location.href="search.php";

            


       
            
        });
    });
});



   
        const fall = "away";
        // Put value into hidden input
        document.getElementById('view').value = fall;

        // Optionally submit form immediately
        // this.closest('form').submit(); // 




</script>



<!--
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.result-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const fullname = this.getAttribute('data-fullname');

            // Send to server to store in session
            fetch('set_session.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },

                body: 'fullname=' + encodeURIComponent(fullname)
            })
            .then(response => response.text())
            .then(() => {
                // Redirect after session is set
                window.location.href = 'search.php';
            });
        });
    });
});
</script>

-->

</html>
