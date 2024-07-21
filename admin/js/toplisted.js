$(function(){

      $("#symbol").keyup(function(){
            checksymbol();
      })

      $("#ltp").keyup(function(){
            checkltp();
      })

      $("#change").keyup(function(){
          checkchange();
      })


      function checksymbol(){
        let symbolvalue=/^[a-zA-Z]+$/;
        let symbolfield=$("#symbol").val();
        let symbolfieldlength=$("#symbol").val().length;

        
       if(symbolfieldlength<1){
            $("#symbolerror").html("Should be filled out");
            $("#symbolerror").show();
            $("#btn11").attr('disabled','disabled');

        }
        else if(!symbolvalue.test(symbolfield)){
            $("#symbolerror").html("Should be alphabet character");
            $("#symbolerror").show();
            $("#btn11").attr('disabled','disabled');
      }
        else if(symbolfieldlength<3){
            $("#symbolerror").html("Invalid symbol");
            $("#symbolerror").show();
            $("#btn11").attr('disabled','disabled');

        }
        
        else{
              $("#symbolerror").hide();
              $("#btn11").removeAttr("disabled");
        }




      }

      function checkltp(){
            let ltpvalue=/^[0-9]*$/;
            let ltpfield=$("#ltp").val();
            let ltpfieldlength=$("#ltp").val().length;
    
            if(!ltpvalue.test(ltpfield)){
                  $("#ltperror").html("Should be numerical character");
                  $("#ltperror").show();
                  $("#btn11").attr('disabled','disabled');
            }
            else if(ltpfieldlength<1){
                $("#ltperror").html("Should be filled out");
                $("#ltperror").show();
                $("#btn11").attr('disabled','disabled');
    
            }
            else if(ltpfieldlength<2){
                $("#ltperror").html("Invalid last transaction price");
                $("#ltperror").show();
                $("#btn11").attr('disabled','disabled');
    
            }
            
            else{
                  $("#ltperror").hide();
                  $("#btn11").removeAttr("disabled");
            }
    







      }

function checkchange(){
            let changevalue=/^[0-9]+[\.]*[0-9]$/;
            let changefield=$("#change").val();
            let changefieldlength=$("#change").val().length;
    
            if(!changevalue.test(changefield)){
                  $("#changeerror").html("Should be numerical character");
                  $("#changeerror").show();
                  $("#btn11").attr('disabled','disabled');
            }
            else if(changefieldlength<1){
                $("#changeerror").html("Should be filled out");
                $("#changeerror").show();
                $("#btn11").attr('disabled','disabled');
    
            }
            else if(changefieldlength>3){
                  $("#changeerror").html("Invalid field");
                  $("#changeerror").show();
                  $("#btn11").attr('disabled','disabled');
      
              }
           
            else{
                  $("#changeerror").hide();
                  $("#btn11").removeAttr("disabled");
            }
    







      }







});