<?php

session_start();
if (!isset($_SESSION['logged_in'])) {
     header("location: ../anotherpage.php");
     exit();
}
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
            background-color: rgb(203, 215, 253);
            display: flex;
            flex-direction: column;
            gap: 3px;
            text-align: start;
            padding: 2px;
            border-radius:4px;
            

        

        
        
        }
        #form_section{
            display:flex;
            flex-direction:row;
            gap: 1rem;
            padding: 1rem;
            
            
        }
        .form_section{
           
            background-color: rgb(255, 255, 255);
            padding: 1rem;
            border-radius:4px;
            
        }
      
        
        #logo{

        }
        #form{
            text-align: center;
            padding-top:6px;
            
            
        }
        input{
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
        #photos{
            display: flex;
            gap: 7px;
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
        <form action="includes/createform.inc.php"  method="post" id="forms" enctype="multipart/form-data">
        <p>
            
        </p>
            <div id="form_section">  
           <div id="form_section1" class="form_section">
            <div id="photos">
                <img id="previews">
            </div>
            <h2 style="text-align: center;">Taarifa kuhusu mkopaji</h2>
            <label for="name"><b>Majina:</br></b></label>
            <input type="firstname" name="debtor-firstname" placeholder="JINA LA KWANZA">
            <input type="firstname" name="debtor-midname" placeholder="JINA LA KATI">
            <input type="firstname" name="debtor-lastname" placeholder="JINA LA MWISHO"><br><br>
    
            <label for="address"><b>Anapoishi:</br></b></label>
            <input type="text" name="debtor-region-address" placeholder="MKOA">
            <input type="text" name="debtor-ward-address" placeholder="KATA">
            <input type="text" name="debtor-street-address" placeholder="MTAA">
             <br><br>
             <div id="age_and_sex">
                <div>
                    <lable for="occupation" ><b>namba ya kitambulisho:</b><br></lable>
                    <input type="text" name="debtor-IDN" placeholder="NAMBA YA KITAMBULISHO">
        
                </div>
                <div>
                    <label for="contants" ><b>Namba za simu:</b><br></label>
                    <input type="number" name="debtor-contacts1" placeholder="NAMBA ZA SIMU">
                    <br>
                    <br>
                    <input type="number" name="debtor-contacts2" placeholder="NAMBA ZA SIMU">
                </div>
            </div>
           

            <br>
                        
           <div id="age_and_sex">
            <div id="age">
                <label for="age" ><b>Miaka</b></label>
                <input type="number" name="debtor-age" placeholder="MIAKA">
    
              
            </div>
            <div id="sex">
         
    
                <label for="deptor-sex"><b>Jinsia</b></label>
                <input type="text" name="debtor-sex" placeholder="JINSIA">
            </div>
            
           </div>

           
             <h2 style="text-align: center;">Taarifa kuhusu shughuli ya mkopaji</h2>
    
            
        
             <br>
             <div id="age_and_sex">
                <div>
                    <lable for="occupation" ><b>Shughuli/kazi:</b><br></lable>
                    <input type="text" name="debtor-occupation" placeholder="SHUGHULI YA MKOPAJI">
        
                </div>
                <div>
                    <label for="contants" ><b>Mahali shughuli/kazi ilipo:</b><br></label>
                    <input type="text" name="debtor-occupation-area" placeholder="MAHALI PASHUGHULI">
                </div>
            </div>
           

            <br><br>
                        
           <div id="age_and_sex">
            <div id="age">
                <label for="age" ><b>kipato kwa mwezi</b></label>
                <input type="number" name="debtor-salary" placeholder="KIPATO">
    
              
            </div>
            <div id="sex">
         
    
                <label for="age" ><b>Muda aliokaa kazini</b></label>
                <input type="number" name="debtor-workspan" placeholder="MUDA KAZINI">
    
            </div>

            
           </div>
           <br>
           <label for="name"><b>picha za mkopaji:</br></b></label>
            <div id="photo_inputs_div">
            <input id="image_inputs" type="file" name="picha" accept="image/*" required>
            </div>
        <div id="mariage_div">
            <h2 style="text-align: center;">Mme au mke</h2>

            <label for="name"><b>Majina:</br></b></label>
            <input type="firstname" name="partiner-firstname" placeholder="JINA LA KWANZA">
            <input type="firstname" name="partiner-midname" placeholder="JINA LA KATI">
            <input type="firstname" name="partiner-lastname" placeholder="JINA LA MWISHO"><br><br>
            
             <div id="age_and_sex">
                <div>
                    <lable for="occupation" ><b>Shughuli/kazi:</b><br></lable>
                    <input type="text" name="partiner-occupation" placeholder="SHUGHULI YA MKOPAJI">
        
                </div>
                <div>
                    <label for="contants" ><b>Namba za simu:</b><br></label>
                    <input type="number" name="partiner-contacts1" placeholder="NAMBA ZA SIMU">
                    <input type="number" name="partiner-contacts2" placeholder="NAMBA ZA SIMU">
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <h2>Taarifa za mkopo unaombwa</h2>
            <div id="loan">
                <div id="loan_amount">
                 <label for="loan_amount"><b>MKOPO UNAOOMBA</b></label>
                 <input type="number" name="loan_amount" >
                </div><br>
       
                <div id="refund">
                 <label for="loan_amount"><b>MUDA WA MKOPO</b></label>
                 <input type="number" name="time" >
                </div>
             </div>
           </div>
        
          
              </div>
            

              <div id="form_section2" class="form_section">  

                <div id="photos">
                    <img id="previews_guarantor">
                 </div>
  
    <div>
     <h2 style="text-align: center;">Taarifa kuhusu mdhamini</h2>
     <label for="name"><b>Majina:</br></b></label>
     <input type="firstname" name="G-firstname" placeholder="JINA LA KWANZA">
     <input type="firstname" name="G-midname" placeholder="JINA LA KATI">
     <input type="firstname" name="G-lastname" placeholder="JINA LA MWISHO"><br><br>

     <label for="address"><b>Anapoishi:</br></b></label>
     <input type="text" name="G-region-address" placeholder="MKOA">
     <input type="text" name="G-ward-address" placeholder="KATA">
     <input type="text" name="G-street-address" placeholder="MTAA">
      <br><br>
      <div id="age_and_sex">
         <div>
             <lable for="occupation" ><b>namba ya kitambulisho:</b><br></lable>
             <input type="text" name="G-IDN" placeholder="NAMBA YA KITAMBULISHO">
 
         </div>
         <div>
             <label for="contants" ><b>Namba za simu:</b><br></label>
             <input type="number" name="G-contacts1" placeholder="NAMBA ZA SIMU">
             <input type="number" name="G-contacts2" placeholder="NAMBA ZA SIMU">
         </div>
     </div>
    

     <br>
                 
    <div id="age_and_sex">
     <div id="age">
         <label for="age" ><b>Miaka</b></label>
         <input type="number" name="G-age" placeholder="MIAKA">

       
     </div>
     <div id="sex">
  

         <label for="gender"><b>Jinsia</b></label>
         <input type="text" name="G-sex" placeholder="JINSIA">
     </div>
     
    </div>
    <h2 style="text-align: center;">Taarifa kuhusu shughuli ya mdhamini</h2>

    <br>
    <div id="age_and_sex">
       <div>
           <lable for="occupation" ><b>Shughuli/kazi:</b><br></lable>
           <input type="text" name="G-occupation" placeholder="SHUGHULI YA MKOPAJI">

       </div>
       <div>
           <label for="contants" ><b>Mahali shughuli/kazi ilipo:</b><br></label>
           <input type="text" name="G-occupation-area" placeholder="MAHALI PASHUGHULI">
       </div>
   </div>
   <br>
  

   <br>
               
  <div id="age_and_sex">
   <div id="age">
       <label for="age" ><b>kipato kwa mwezi</b></label>
       <input type="number" name="G-salary" placeholder="KIPATO">

     
   </div>
   <div id="sex">


       <label for="age" ><b>Muda aliokaa kazini</b></label>
       <input type="number" name="G-workspan" placeholder="MUDA KAZINI">

   </div>
   
   
  </div>
  <br>
  <div id="photo_inputs_div">
    <label for="name"><b>picha za mdhamini:</br></b></label>
    <input id="photo_inputs_guarantor" type="file" name="G-image">
    
</div>
<h2 style="text-align: center;">Taarifa kuhusu dhamana</h2>
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
 <br>
 
<br>

<label for="name"><b>Picha za dhamana kama zipo:</br></b></label>
<div id="photo_inputs2_div">
     <input class="photo_inputs2" id="photo_input_1" type="file" name="GuaranteeImage1-1">
     <input class="photo_inputs2" id="photo_input_2" type="file" name="GuaranteeImage1-2">
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

    

      </div>
</div>



    <div style="text-align: center;">
        
    <input type="submit" name="submit" value="Upload">

    </div>
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







 
document.addEventListener("DOMContentLoaded", function () {
 /* const section1Inputs = document.querySelectorAll("#form_section1 input, #form_section1 select");
  const section2Inputs = document.querySelectorAll("#form_section2 input, #form_section2 select");
  const section3Inputs = document.querySelectorAll("#form_section3 input, #form_section3 select");
  const section2 = document.getElementById("form_section2");
  const section3 = document.getElementById("form_section3");
  const section4 = document.getElementById("form_section4"); */

  const checkSection1Complete = () => {
    let allFilled = true;
    section1Inputs.forEach(input => {
      if (!input.value.trim()) {
        allFilled = false;
      }
    });
    section2.querySelectorAll("input, select").forEach(el => {

      el.disabled = !allFilled;
    });
  };

  // Disable section2 on page load
  section2.querySelectorAll("input, select").forEach(el => {
    el.disabled = true;
  });

  // Attach input event listeners
  section1Inputs.forEach(input => {
    input.addEventListener("input", checkSection1Complete);
  });







  const checkSection2Complete = () => {
    let allFilled = true;
    section2Inputs.forEach(input => {
      if (!input.value.trim()) {
        allFilled = false;
      }
    });
    section3.querySelectorAll("input, select").forEach(el => {

      el.disabled = !allFilled;
    });
  };

  // Disable section3 on page load
  section3.querySelectorAll("input, select").forEach(el => {
    el.disabled = true;
  });

  // Attach input event listeners
  section2Inputs.forEach(input => {
    input.addEventListener("input", checkSection2Complete);
  });








  const checkSection3Complete = () => {
    let allFilled = true;
    section3Inputs.forEach(input => {
      if (!input.value.trim()) {
        allFilled = false;
      }
    });
    section4.querySelectorAll("input, select").forEach(el => {

      el.disabled = !allFilled;
    });
  };

  // Disable section4 on page load
  section4.querySelectorAll("input, select").forEach(el => {
    el.disabled = true;
  });

  // Attach input event listeners
  section3Inputs.forEach(input => {
    input.addEventListener("input", checkSection3Complete);
  });
}



);







document.getElementById("photo_inputs").addEventListener("change", function(event){
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
document.getElementById("photo_inputs_guarantor").addEventListener("change", function(event){
    const file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            const preview = document.getElementById("previews_guarantor");
            preview.src = e.target.result;
            preview.style.display ="block";
        };
        reader.readAsDataURL(file);
    }
});
document.getElementById("photo_input_1").addEventListener("change", function(event){
    const file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            const preview = document.getElementById("preview_1");
            preview.src = e.target.result;
            preview.style.display ="block";
        };
        reader.readAsDataURL(file);
    }
});
document.getElementById("photo_input_2").addEventListener("change", function(event){
    const file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            const preview = document.getElementById("preview_2");
            preview.src = e.target.result;
            preview.style.display ="block";
        };
        reader.readAsDataURL(file);
    }
});
document.getElementById("photo_input_3").addEventListener("change", function(event){
    const file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            const preview = document.getElementById("preview_3");
            preview.src = e.target.result;
            preview.style.display ="block";
        };
        reader.readAsDataURL(file);
    }
});
document.getElementById("photo_input_4").addEventListener("change", function(event){
    const file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            const preview = document.getElementById("preview_4");
            preview.src = e.target.result;
            preview.style.display ="block";
        };
        reader.readAsDataURL(file);
    }
});





function previewPDF() {
  const element = document.getElementById('forms');

  html2pdf().from(element).set({
    margin: 10,
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
  }).outputPdf('blob').then(function(pdfBlob) {

    const blobUrl = URL.createObjectURL(pdfBlob);
    window.open(blobUrl); // Opens the PDF in a new tab
  });
}




    
    
</script>
</html>