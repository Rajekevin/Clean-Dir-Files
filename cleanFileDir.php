   <?php

   /***
     * Nettoyage de fichier et de sous-dossiers
     *
     * @param $dirDest              => Destination du fichier
     * @param null $FileDirType     => csv, pdf OR isDir si c'est un Dossier
     * @param null $search          => mot clé pour rechercher      *
     */


    static public function deleteFileDir($dirDest, $FileDirType=null,$search=null){

        $filecount = 0 ; //Compteur de fichier supprimé
        $dirDirectory = get_include_path() .$dirDest; //chemin de notre fichier
        $typeFichier = ($FileDirType==null)? '/*' : '/*.'.$FileDirType; //type fichier qu'on veut supprimé

        if($FileDirType=="isDir") {
            foreach(glob($dirDirectory . '/*') as $file)
            {
                if(is_dir($file)){
                    echo '<br>'.$file;
                    $filecount++;
                    //                  rmdir($file);
                }
            }
            echo "<br/>". $filecount ." dossiers ont été supprimés sur  ". $dirDirectory."!<hr>";

        }else{
            $files = glob($dirDirectory . $typeFichier); //get all file names
            foreach ($files as $file) {
                if (is_file($file)) {
                    if(isset($search)){
                        $searchItem = strpos($file,$search);
                        if ($searchItem == true) {
                            echo '<br>'.$file;
                            echo " ok".'<br/>';
                            $filecount++;
                            //                unlink($file); //delete file
                        }

                    }else{
                        echo '<br/>' . $file;
                        $filecount++;
                        //                unlink($file); //delete file
                    }
                }
            }
            echo "<br/>" . $filecount." fichiers ont été supprimés sur  " . $dirDirectory . "!<hr>";
        }
    }
