<?php

session_start();
if (!isset($_SESSION['logged_in'])) {
     header("location:https://cdcloansystem.online/");
     exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
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
            gap: 5rem;
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
            display: flex;
            flex-direction: column;
            background-color: rgb(220, 227, 252);
            padding: 2rem;
            border-radius: 7px;
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
            gap :5px;
        

        
        
        }
        #close_links{
            color: black;
            
            
        }
        footer{
            background-color: gray;
            padding: 2rem;
            text-align: center;
            
            
        }
        @media screen and (max-width: 450px){
            body{
                margin: ;
                
            }
            #content{
            
        
            display:inline;


            }
            #profile_identification{
                display:;
            }
             #content_div{
        
        }
            #profile_display{
           display: block;
           }
           #profile_name{
            padding-top: 2rem;
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
        nav{
            flex-direction: column;
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
            padding-left: 12rem;
        }
    
        #open_links{
            display: block;
            padding: 1rem;
        }
        footer{
            width:;
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
        #profile_display{
           display: block;
           }
           #profile_name{
            padding-top: 2rem;
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
        nav{
            flex-direction: column;
            display: flex;
        }
        #side{
            padding-top: 4rem;
            background-color:rgba(73, 86, 88, 0.87);
            padding-left: 1rem;
            height: 100%;
            color: aliceblue;

            

        }
        #close_links{
            padding-left: 16rem;
        }

          
       }
       @media screen and (max-width:1300px){
        body{
            font-size:13px;
        }
        nav{
            gap:3rem;
        }
        
    }
    </style>
</head>
<body>
    <div id="side_nav">
       
        <nav id="side">
            <div id="close_links">
                <span onclick="closeNav()">CL</span>
            </div>
            <a id="" href="./accountanthomepage.php">Home</a>
            <a id="" href="./loan-verification.php">loan verification</a>
            <a id="" href="./.php">client</a>
            <a id="" href="./.php">employee management</a>
            <a id="">settings</a>
            <a id="" href="./account/logout.php">log out</a>
        </nav>
    </div>
    <div id="open_links">
        <span onclick="openNav()" >&#9776</span>
    </div>
    <div id="main" onclick="closeNav()">
       
        

    <div id="fixed_nav" onclick="closeNav()">
       
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
            
            <a id="fixed_links" href="./accountanthomepage.php">Home</a>
            <a id="fixed_links" href="./loan-verification.php">loan verification</a>
            <a id="fixed_links" href="./.php">client</a>
            <a id="fixed_links" href="./.php">employee management</a>
            <a id="fixed_links">settings</a>
            <a id="fixed_links" href="./accoun/logout.php">log out</a>
            
        </nav>
    </div>
    <div id="content_div">
        <div id="content_heading"> 
           <div id="heading">

            <div id="logo">
            
                <img src="/asset/logo.jpg"  style="height: 4rem; width: 4rem; border-radius: 2rem;">
             
              </div>

            <h2>CDC MICROFINANCE LTD</h2>
    
            
           </div>
           
        </div>
         <div id="conten">
            <div id="profile_display">
                <div id="profile2">
                   <?php
               echo '<img src="' .$_SESSION['image'].'"id="profilePIC" style="height: 4rem; width: 4rem;">';
            
                
                ?>
                </div>
                <div id="profile_name">
                    Hello,  <?php 
                    echo ($_SESSION['username']);
                
                ?>

                </div>
            </div>
            <div id="profile_identification">
                
                <p><b>First Name:</b> <?php echo $_SESSION['firstname']; ?></p>
                <p><b>Mid Name:</b> <?php echo $_SESSION['midname']; ?></p>
                <p><b>Last Name:</b> <?php echo $_SESSION['lastname']; ?></p>
                <p><b>Contact info:</b> <?php echo $_SESSION['contacts_1']; ?></p>
                <p><b>Second Contact info:</b> <?php echo $_SESSION['contacts_2']; ?></p>
                <p><b>Branch:</b> <?php echo $_SESSION['branch']; ?></p>
                <p><b>Unit:</b><?php echo $_SESSION['unit']; ?></p>
                <p><b>ID:</b> <?php echo $_SESSION['indexnumber']; ?></p>
                <p><b>Year employed:</b> 2020</p>
               
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