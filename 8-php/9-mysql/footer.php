 <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script type="application/javascript">
        $(".alternarFormularios").click(function() 
        {
            $("#formularioRegistro").toggle();
            $("#formularioLogin").toggle();

        });
        $('#diario').on('input propertychange', function(){
        
            $.ajax({
                 method:"POST",
                 url:"actualizarBD.php",
                 data:{ content: $("#diario").val()},
                success: function(d){ console.log(d); }
            });
        });
    </script>
    
  </body>
</html>
