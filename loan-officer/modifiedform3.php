<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        /*...........style on every page...........*/
        body{
            font-family: Arial, Helvetica;
            background-color: rgb(178, 195, 241);
            text-align: center;
            align-items: center;
            
            
        }
        #main{
            display: flex;
            padding: 1rem;
            flex-direction: row;
            padding-top: 6rem;
            
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
            text-decoration: none;
            
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
        footer{
            background-color: rgb(128, 128, 128);
            padding: 2rem;
            text-align: center;
           
        }
    
   

      /*..............style on specific page ........*/
        
      form{
            background-color: rgb(209, 219, 247);
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            gap: 3px;
            text-align: start;
            border-radius:4px;
        
        }
        #form{
            background-color: rgb(191, 205, 243);
            width: 100%;
        }
        #form_section{
            display:flex;
            flex-direction:column;
            justify-content: center;
            gap: 1rem;
            padding: 1rem;
            text-align: center;
            align-items: center;
            background-color: rgb(255, 255, 255);
        
            
            
        }
     
        input{
            width: 20rem;
            height: 2rem;
            border-radius: 5px;
            padding-left:3px;
            border: 1px solid rgb(138, 137, 137);
            transition: box-shadow 0.5s, border-color 0.5s;
            
        }
        input:hover{
            border: 1px solid rgb(138, 137, 137);
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            

        }
        select{
            height: 2rem;
            width: 5rem;
        }
        #age_and_sex{
            display: flex;
            gap: 5rem;
            text-align: center;
        }
        #age{
            display: flex;
            flex-direction: column;
        }
        #sex{
            display: flex;
            flex-direction: column;
        }
        #loan{
            display: flex;
            gap: 7px;
            
        }
        #photo_inputs_div2{
            display: flex;
        }
        #photo_inputs{
            width: 27rem;
            display: flex;
            gap: 3px;
            
        }
        #photo_inputs2{
            width: 31rem;
            display: flex;
            gap: 3px;
            
        }
        #previews{
            height: 8rem;
            width: 8.5rem;
            border: 1px solid black;
            
        }
        #previews_guarantor{
             height: 8rem;
            width: 8.5rem;
            border: 1px solid black;
        }
        .preview2{
            height:7rem ;
            width:7.37rem ;
            border: 1px solid black;
        }
        #photos_div{
            display: flex;
            gap: 3rem;
            justify-content: start;
        
        }
        @media screen and (max-width: 450px){
            body{
                margin:0 ;
            }
            form{
            width: 17rem;


            }
            #form_section{
            display:flex;
            flex-direction:column;
            gap: 1rem;
            padding: 1rem;
            
            
           }
            #photo_inputs2{
                width:13rem;
            }
            #photo_inputs{
                width:13rem;
            }
            input{
                width:8rem;
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
    <div id="form">
        <div id="form_heading">
           <div id="heading">

            <div id="logo">
                <img src="/asset/logo.jpg" alt="" style="height: 4rem; width: 4rem; border-radius: 2rem;">
               </div>

            <h2>FOMU YA MKOPO</h2>
            <p>Jaza fomu ya mkopo kwa makini</p>
            
           </div> 
           
        </div>
        <form action="includes/modifiedform3.inc.php"  method="post" id="forms" enctype="multipart/form-data">
        
            <div id="form_section">  
                <div id="photos_div">
                    <div id="photos">
                        <img id="previews" src="<?php echo 'includes/'.$_SESSION['debtor_image'];?>">
                        <div>
                            <h3><?php echo $_SESSION['debtor_name']; ?></h3><br>
                            MKOPAJI
                        </div>
                        
                    </div>
                    <div id="photos">
                        <img id="previews" src="<?php echo 'includes/'.$_SESSION['guarantor_image'];?>">
                        <div>
                            <h3><?php echo $_SESSION['guarantor_name'];?></h3><br>
                            MDHAMINI
                        </div>
                        
                    </div>
                </div>
                <h2 style="text-align: center;">Taarifa kuhusu dhamana</h2>
    
                    
                 
           <div style="flex-direction:row ;">
            <label for="Guarantees"><b>Aina na thamani ya dhamana:</br></b></label>
            <input type="text" name="Guarantee1" placeholder="DHAMANA YA KWANZA">
            <input type="number" name="valueGuarantee1" placeholder="THAMANI YA DHAMANA"><br>

            <input type="text" name="Guarantee2" placeholder="DHAMANA YA PILI">
            <input type="number" name="valueGuarantee2" placeholder="THAMANI YA DHAMANA"><br>

            <input type="text" name="Guarantee3" placeholder="DHAMANA YA TATU">
            <input type="number" name="valueGuarantee3" placeholder="THAMANI YA DHAMANA"><br>

            <input type="text" name="Guarantee4" placeholder="DHAMANA YA NNE">
            <input type="number" name="valueGuarantee4" placeholder="THAMANI YA DHAMANA"><br>
 
            <input type="text" name="Guarantee5" placeholder="DHAMANA YA TANO">
            <input type="number" name="valueGuarantee5" placeholder="THAMANI YA DHAMANA">
           </div>
           
           <label for="name"><b>Picha za dhamana kama zipo:</br></b></label>
<div id="photo_inputs2_div">
     <input class="photo_inputs2" id="photo_input_1" type="file" name="GuaranteeImage1-1">
     <input class="photo_inputs2" id="photo_input_2" type="file" name="GuaranteeImage1-2"><br>
     <input class="photo_inputs2" id="photo_input_3" type="file" name="GuaranteeImage1-3">
     <input class="photo_inputs2" id="photo_input_4" type="file" name="GuaranteeImage1-4">
<br>
</div>
<div id="photos2">
    <img class="preview2" id="preview_1">
    <img class="preview2" id="preview_2">
    <img class="preview2" id="preview_3">
    <img class="preview2" id="preview_4">
</div>
    
        
    


 </div>
    <div style="text-align: center;">
        
    <input type="submit" name="submit" value="Upload">

    </div>




   <br>
   <br>
        
              
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


document.getElementById("image_inputs").addEventListener("change", function(event){
    const file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            const preview = document.getElementById("previews");
            preview.src = e.target.result;
            preview.style.display ="block";
        };
        reader.readAsDataURL(file);
    }
});

</script>
</html>