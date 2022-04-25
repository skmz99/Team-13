

<html>
    
    <body>
        
        <div class= "container">
            
            <h1>reports for employee</h1>
            
        </div>
        <div class= "data">
            <form action="reportEmplyeeHTML.php" method="POST">
                <select name="standards">
                    <?php
                    $query1 = "SELECT * FROM standards";
                    $result1= mysql_query($query1);
                    ?>
                    
                    
                    
                </select>
                
                
            </form>
            
            
        </div>
        
    </body>
    
    
</html>