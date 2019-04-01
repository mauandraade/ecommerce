<?php

/**
 * Description of UsuariosDAO
 *
 * @author Galvão
 */

require_once ('./model/Usuarios.php'); 
require_once ('ConexaoDAO.php');

class UsuariosDAO {
    

    public function validarUser($user, $password) {
        $objCon = new ConexaoDAO();    
        $vConn = $objCon->abrirConexao();
        
        $objUser = new Usuarios();
        $sqlLogin = "SELECT * FROM users WHERE username like '$user' AND password like '$password'";
        $rsLogin = mysqli_query($vConn, $sqlLogin) or die(mysqli_error($vConn));
        
        if (mysqli_num_rows($rsLogin) == 0) {
            return null;
                    
        } else {
            $tblLogin = mysqli_fetch_array($rsLogin);
            $objUser->setUsername($tblLogin['username']);
            $objUser->setPassword($tblLogin['password']);
            $objUser->setPermission($tblLogin['permission']);
            
            return $objUser;
        }
        
        $objCon->fecharConexao();
    }
    
    
    public function cadastrarUser($objUser) {
        $objCon = new ConexaoDAO();    

        $vConn = $objCon->abrirConexao();
        
        $sql = "INSERT INTO users(username, password) VALUES($objUser->username, $objUser->password)";

        try {
            //code...
            $rs = mysqli_query($vConn, $sql);
    
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    
    public function consultarUser($user) {
        
    }
    
    public function deletarUser($user) {
        
    }
}

?>
