 // dados de mysql
        $user = "implementacao";
        $pass = "implementacao";
        $dbname = "moradas_ftth";
        $host = "svlcvcpdb03";
// fim de dados de mysql


        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $sth = $db->prepare("SELECT
                                     m.c_area, m.arteria, m.c_predio, m.andar, m.lado, m.est_eleg, m.dt_prev_res, f.sintoma,m.N_UA, m.CP7, m.plc, m.obs_plc, m.logradouro
                                    FROM
                                        moradas_ftth.`moradas_ftth_new` m
                                    inner join
                                        moradas_ftth.`matriz_ftth` f ON f.est_eleg = m.est_eleg
                                                                    AND f.SITUACAO = m.SITUACAO
                                                                    AND f.SIT_CELULA = m.SIT_CELULA
                                    where
                                        m.N_UA = '$UA' GROUP BY  m.c_area, m.arteria, m.c_predio, m.andar, m.lado, m.est_eleg, m.dt_prev_res, f.sintoma,m.N_UA, m.CP7, m.plc, m.obs_plc, m.logradouro");
        $sth->execute();

        $result = $sth->fetchAll();
