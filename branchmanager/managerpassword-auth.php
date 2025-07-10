


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
           text-align: center;
           align-items: center;
           font-size: 2rem;
           font-family: Arial, sans-serif;
           margin: 0;
           margin-bottom: 0;
           background-color: rgb(178, 195, 241);
        }
        h3{

        }
        input{
            height: 2rem;
            width: 15rem;
            font-family:Arial, sans-serif ;
        
        
        }
        button{
            height: 2rem;
            width: 4rem;
        }
        form{
            padding-bottom: 1rem;
        }
        footer{
            height:10%;
            padding-top: 5rem;
            font-size: 1rem;

            
            

        }
        #username_display{
            
            font-size:2rem;
            text-align:center;
           

        }
    </style>
</head>
<body>
     

     
     

    <div class="content">
       <h3><b>Enter your password</b></h3>

      
       </div>
       <form id="sign_in" action="includes/adminpassword.php" method="post">
        <input type="text" name="pwd" placeholder="password"><br>
        <button id="login_button">log in</button>
        
       </form>

      
    </div>

    
    <footer>
        CPC Microfinance

    </footer>

   


</body>
</html>