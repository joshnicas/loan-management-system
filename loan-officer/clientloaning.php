<?php
session_start();

// Database connection
$host = 'localhost';
$db   = 'cdcluznr_cdc_database';
$client = 'cdcluznr_joshnicas'; // Replace with your MySQL firstname
$pass = 'J0sh_nica$';     // Replace with your MySQL password

// Create connection
$conn = new mysqli($host, $client, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    echo $id;

    /*
    $sql = "SELECT * FROM products WHERE id = $fullname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        echo "<h2>" . htmlspecialchars($product['firstname']) . "</h2>";
        echo "<p>" . htmlspecialchars($product['fullname']) . "</p>";
    } else {
        echo "<p>Product not found.</p>";
    }
        */
} else {
    echo "<p>No product ID provided.</p>";
}

$conn->close();

/*
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client-loaning</title>
      <link
      rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="shortcut icon" href="/asset/logo.jpg">
    <link rel="apple-touch-icon" sizes="144x144" href="/asset/logo.jpg">
    <link rel="apple-touch-icon" sizes="120x120" href="/asset/logo.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="/asset/logo.jpg">
    <link rel="apple-touch-icon" sizes="76x76" href="/asset/logo.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="/asset/logo.jpg">
    <link rel="apple-touch-icon-precomposed" href="/asset/logo.jpg">
    <style>
      body{
            font-family: Arial, Helvetica;
            background-color: rgb(178, 195, 241);
        }
       
        #fixed_nav{
           display: flex;
           position: fixed;
           margin: 1rem;
           top: 0;
           left: 0%;
           background-color: rgb(139, 147, 173);
            margin: 0;
            width: 100%;
            height: 4rem;
            
           
           
           
        }
        nav{
            display: flex;
            flex-direction: row;
            gap: 2rem;
            padding-top: 1rem;
        
           
            
        
        }
        a{
            padding-left: 2rem;
            color:white;
            text-decoration:none;
            
        }
        #open-button{
            font-size:19px;
        }
         
        #fixed_links{
            display: block;
            
            
        }
        #open_links{
            display: none;
            position: fixed;
            background-color: rgb(163, 184, 245);
            width: 100%;
            margin: 0;

        }
        #side_nav{
            display: none;
        }

        #profilePIC{
            border-radius: 3rem;
            

            
        }
    
        #profile{
          padding-left: 2rem;
            
        }
        
      

        #content_div{
        /*    background-color: rgb(203, 215, 253);  
            background-color: ;
            border-radius: 2px;
            margin-top:6rem;
            
            padding:1rem;
            text-align:center;
            align-items:center;
        
        }
        #profile_identification{
            text-align:start;
            padding-left:10%;
        }
        footer{
            background-color: rgb(128, 128, 128);
            padding: 2rem;
            text-align: center;
           
        }

           /*...............style on specific page...................
         
 
       
    
        button{
            border-radius: 3px;
            width: 7rem;
            height: 3rem;
            background-color:rgb(145, 252, 145);
            
        }
        #loan-button{
            display:none;
        }

        @media screen and (max-width: 450px){
            body{
                margin:0 ;
            }
            form{
            width: 17rem;


            }
            #loan{
                display: flex;
                flex-direction: column;
            }
            #age_and_sex{
                padding-left: 1px;
                gap: 2px;
            }
        #fixed_links{
                display: none;
            }
         #fixed_nav{
           
          display: none;
           
           
        }
        #main{
            padding-top: 4rem;
            padding-left: 1rem;
        }
        #content_div{
            
        }
        #side_nav{
            position: fixed;
            left: 0%;
            width: 0;
            height: 100%;
            overflow: hidden;
            top: 1rem;
            display: block;
            transition: 1s;
        
        }
        #side{
            padding-top: 4rem;
             background-color:rgba(73, 86, 88, 0.87);
            padding-left: 1rem;
            height: 100%;
            color: aliceblue;
            display:flex;
            flex-direction:column;

            

        }
        #close_links{
            padding:1rem;

        }
        #open_links{
            display: block;
            padding: 1rem;
        }

            
        }
      
        @media screen and (max-width:600px) {
            body{
                margin: 0;
            }
            #fixed_nav{
                display: none;
            }
          
           #fixed_links{
            display: none;
           }
           #open_links{
            display: block;
            padding: 1rem;
        }
        #main{
            padding-top: 4rem;
            padding-left: 1rem;
        }
        form{
            width: 24rem;


            }
            #loan{
                display: flex;
                flex-direction: column;
            }
            #side_nav{
            position: fixed;
            left: 0%;
            width: 0;
            height: 100%;
            overflow: hidden;
            top: 1rem;
            display: block;
            transition: 1s;
        
        }
        #side{
            padding-top: 4rem;
            background-color:rgba(73, 86, 88, 0.87);
            padding-left: 1rem;
            height: 100%;
            color: aliceblue;

            

        }
        

    }
    </style>
</head>
<body>
    <div id="side_nav">
       
        <nav id="side">
            
            <a id="" href="./homepage.php">Home</a>
            <a id="" href="./createform.php">create new form</a>
            <a id="" href="./employeeclientpage.php">approval status</a>
            <a id="" href="./employeeclientloaning.php">client loaning</a>
            <a id="" href="./clientrefund.php">refunds</a>
            <a id="">view client</a>
            <a id="">settings</a>
            <a id="" href="./includes/logout.php">log out</a>
        </nav>
    </div>
    <div id="open_links">
        <span id="open-button" class="span1" onclick="openNav()"><i class="fa-solid fa-bars"></i></span>
    </div>
    <div id="main" onclick="closeNav()">
       
        

    <div id="fixed_nav">
       
        <nav>
            <div id="profile">
                 <?php
               echo '<img src="' .$_SESSION['image'].'"id="profilePIC" style="height: 4rem; width: 4rem;">';
            
                ?>
                <p><?php echo $_SESSION['username'];?></p>
            </div>
            
            <a id="fixed_links" href="./homepage.php">Home</a>
            <a id="fixed_links" href="./createform.php">create new form</a>
            <a id="fixed_links" href="./employeeclientpage.php">approval status</a>
            <a id="fixed_links" href="./employeeclientloaning.php">client loaning</a>
            <a id="fixed_links" href="./clientrefund.php">refunds</a>
            <a id="fixed_links">view client</a>
            <a id="fixed_links">settings</a>
            <a id="fixed_links" href="./includes/logout.php">log out</a>
            
        </nav>
    </div>
    <div id="content_div">
        <div id="content_heading">
           <div id="heading">

            <div id="logo">
                <img src="./asset/logo.jpg" alt="" style="height: 4rem; width: 4rem; border-radius: 2rem;">
               </div>

           </div>
           
        </div>
        
           
           
           
           
           <div id="profile_identification">
               <img src="" style="height:4rem; width:4rem;">
           <p><b>JINA KAMILI:</b> </p><p><?php echo $client['fullname']; ?></p>
           <p><b>UTHIBISHO WA MANAJA:</b></p><p id="approval_1"><?php echo $client['b_manager_approval']; ?></p>
           <p><b>UTHIBITISHO WA MHASIBU:</b></p><p id="approval_2"><?php echo $client['accountant_approval']; ?></p>
           
           
          

       </div>
       <form action="./includes/clientloaning.inc.php" method="post">
       <input type="hidden" name="fullname" value="<?php echo $client['fullname'];?>">
       <input type="hidden" name="loan_taken" value="<?php echo $client['debt_requesting'];?>">
       <input type="hidden" name="loan_return" value="<?php echo $client['installment_debt'];?>">
       <input type="hidden" name="time_" value="<?php echo $client['time_'];?>">
       <div id="loan-button">
            <button type="submit">kopesha</button>
       </div>
       
       
       </form>
           
            
            
        </form>
    </div>
</div>
</body>
<script>
    function openNav() {
        document.getElementById("side_nav").style.width ="70%";
    }

    function closeNav() {
        document.getElementById("side_nav").style.width ="0%";
    }
    let z = document.getElementById("loan-button");
    let x = document.getElementById("approval_1").innerHTML;
    let y = document.getElementById("approval_2").innerHTML;

    if (x == "APPROVED" && y == "APPROVED") {
       
       z.style.display="block";
       
    }

   
</script>
</html>

*/