 // dados de mysql
        $user = "implementacao";
        $pass = "implementacao";
        $dbname = "moradas_ftth";
        $host = "hostname";
// fim de dados de mysql


        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $sth = $db->prepare("SELECT truque from spiderman");
        $sth->execute();

        $result = $sth->fetchAll();
        
        //contar numero de colunas afetadas
        $count = $sth->rowCount();
        
        
        //Usar resultado
        foreach($result as $key => $value)
        {
        
          echo $value["truque"]; //Imprime todas as linhas que tenham "truque" como indice
        
        
        }
