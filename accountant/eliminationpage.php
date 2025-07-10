<?php
session_start();

include("accoun/dbconfig.php");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Fetch user from the database
    $sql = "SELECT * FROM debtors_to_be_approved WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $client = $result->fetch_assoc();
       
           

            
      
    } else {
        echo "User not found.";
    }
}

$conn->close();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>elimination</title>
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
        #main{
           text-align: center;
           padding-top: 4rem;
            
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
        #profilePIC{
            border-radius: 3rem;
            

            
        }
        #profilePIC2{
            border-radius: 3rem;
            height: 4rem;
            width: 4rem;
        }
        #profile{
          padding-left: 2rem;
            
        }
        #profile_display{
           display: none;
        }
        #profile_name{
            padding-top: 2rem;
        }
        #profile_identification{
           text-align:start;
           padding:3rem;
        }

        a{
            padding-left: 2rem;
            color: white;
            text-decoration:none;
            
            
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
        #content_div{
            padding-top: 4rem;
        }
        #content{
            background-color: rgb(203, 215, 253);
            border-radius: 2px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 5px;
        

        
        
        }
        #close_links{
            color: black;
            
            
        }
        footer{
            background-color: gray;
            padding: 2rem;
            text-align: center;
            
        }

           /*.................style on specific page...................*/


           #table_content{
            display: flex;
            flex-direction: column;
            background-color: rgb(220, 227, 252);
            padding: 2rem;
            border-radius: 7px;
        
        }
        /div{
            background-color:rgb(236, 236, 236);
            padding:1rem;
            border-radius:4px;
            font-size:17px;
            width: 100%;
            
            

        
            
        }
        td{
            border: 1px solid black;
            text-align:start;
            padding-left:1rem;
            font-weight:400;
        }
        input{
            width: 5rem;
            height: 2rem;
        }
        button{
            width: 5rem;
            height: 3rem;
        }
        @media screen and (max-width: 390px){
            body{
                margin:0 ;
            }
            #content{
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
            background-color:rgba(126, 139, 141, 0.87);
            padding-left: 1rem;
            height: 100%;
            color: aliceblue;

            

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
        #content{
            width: 24rem;
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
       
    </div>
    <div id="open_links">
        <nav>
            <a href="./accountanthomepage.php">Back to HomePage</a>
        </nav>
        
    </div>
    <div id="main" onclick="closeNav()">
       
        

    <div id="fixed_nav">
       
        <nav>
            <div id="profile">
               <?php
               echo '<img src="' .$_SESSION['image'].'"id="profilePIC" style="height: 4rem; width: 4rem;">';
            
                
                ?>
                <p>
                <?php 
                    echo ($_SESSION['username']);
                
                ?>
                </p>
            </div>
            
            <a id="fixed_links" href="./accountanthomepage.php">Back to HomePage</a>
  
            
            
        </nav>
    </div>
    <div id="form">
        <div id="form_heading">
           <div id="heading">

            <div id="logo">
                <img src="./asset/logo.jpg" alt="" style="height: 4rem; width: 4rem; border-radius: 2rem;">
               </div>

            <h2>CDC MICROFINANCE LTD</h2>
    
            
           </div>
           
        </div>
         <div id="content">
            <div id="profile_display">
                <div id="profile2">
                    <img id="profilePIC2" src="./asset/profilePIC.jpg" alt="">
                </div>
                <div id="profile_name">
                    Hello,  <?php 
                    echo ($_SESSION['username']);
                
                ?>

                </div>
            </div>
            <div id="table_content">
            <form action="accoun/clientverification.php" method="post">
            <div>
                
            <div id="profile_identification">
             <img src="" style="height:4rem; width:4rem;">
             <p><b>JINA KAMILI:</b> </p><p><?php echo $client['fullname']; ?></p>
             <p><b>UTHIBISHO WA MANAJA:</b></p><p><?php echo $client['b_manager_approval']; ?></p>
             <p><b>UTHIBITISHO WA MHASIBU:</b></p><p> <?php echo $client['accountant_approval']; ?></p>
                
            </div>
            
        

   </div>
    <br>
    <input type="hidden" name="approvalStatus" value="<?php echo $client['fullname']; ?> ">
    <button type="submit">approve</button>
    </form>
    <br>
    <br>

      
<div>
    <p><b>ELIMINATE</b>  <?php echo $client['fullname'];?></p>
    <h2>
      
    </h2>
    <form action="accoun/elimination.inc.php" method="post">
        <input type="hidden" name="client_id" value="<?php echo $client["id"];?>">
        <button type="submit">eliminate</button>
    </form>

 </div>

            </div>

         </div>
    </div>
</div>
<footer>
    2025 &#169 CDC microfinance LTD
</footer>
</body>
<script>
    function openNav() {
        document.getElementById("side_nav").style.width ="70%";
    }

    function closeNav() {
        document.getElementById("side_nav").style.width ="0%";
    }
</script>
</html>

    





