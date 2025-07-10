<?php

session_start();
if (!isset($_SESSION['logged_in'])) {
     header("location: ../frontloginpage.php");
     exit();
}


include("includes/dbconfig.php"); // Include database connection


  // Check username and password in the database
    $sql = ("SELECT * FROM debtors_to_be_approved ");
    $result = $conn->query($sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view-status</title>
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


    /*..............style on every page...........*/
        body{
            font-family: Arial, Helvetica;
            background-color: rgb(178, 195, 241);
            
        
        }
        #main{
           text-align: center;
            
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
            padding-top:7rem;
            
        }
      

        #content{
            background-color: rgb(203, 215, 253);
            border-radius: 2px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            
        

        
        
        }
        footer{
            background-color: gray;
            padding: 2rem;
            text-align: center;
        }

        /*...................style on specific page.........*/


        #table_content{
            display: flex;
            flex-direction: column;
            background-color: rgb(220, 227, 252);
            padding: 2rem;
            border-radius: 7px;
        
        }
        table{
            background-color:rgb(236, 236, 236);
            padding:1rem;
            border-radius:4px;
            font-size:17px;
            
            

        
            
        }
        td{
            border: 1px solid black;
            text-align:start;
            padding-left:1rem;
            font-weight:400;
        }
      


    
     
        @media screen and (max-width: 450px){
            body{
                margin:0 ;
            }
                #table_content{
            display: flex;
            flex-direction: column;
            background-color: rgb(220, 227, 252);
            padding: 2rem;
            border-radius: 7px;
        
            }
            table{
            background-color:rgb(236, 236, 236);
            padding:;
            border-radius:4px;
            font-size:10px;
            
            

        
            
        }
        td{
            border: 1px solid black;
            text-align:start;
            padding-left:5px;
            font-weight:400;
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
                <p>
                <?php 
                    echo ($_SESSION['username']);
                
                ?>
                </p>
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

            <h2>CDC MICROFINANCE LTD</h2>
    
            
           </div>
           
        </div>
         <div id="content">
           
            <div id="table_content">
            <table>
                <tr>
                    <th>SN</th>
                    <th>MAJINA</th>
                    <th>UTHIBITISHO WA MENEJA</th>
                    <th>UTHIBITISHO WA MWASIBU</th>
                    
        
        <?php 
          if ($result->num_rows > 0) {

   
           while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["id"] . "</td><td> " . $row["fullname"] . "</td><td id='approval'>" . $row["b_manager_approval"] . "</td><td>" . $row["accountant_approval"] . "</td></tr>";
                
                
               
           }
   
   
           
          
       } else {
           echo "<p>No client to be approved.</p>";
       }
       ?>

   </table>

            </div>

         </div>
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
</script>
</html>