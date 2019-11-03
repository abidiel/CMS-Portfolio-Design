
<?php

    class Usuario{

        public function atualizarUsuario($user, $id_usuario, $nome,$senha,$imagem){
            $sql = MySql::conectar()->prepare("UPDATE tb_admin_usuarios SET user= ?, nome=?, password=?, img=? WHERE id=?");
            if($sql->execute([$user, $nome, $senha, $imagem, $id_usuario])){
                //atualizado com sucesso
                return true;
            } else {
                return false;
            }
        }

        public static function userExists($user){
            $sql = MySql::conectar()->prepare("SELECT id FROM tb_admin_usuarios WHERE user=? ");
            $sql->execute(array($user));
            if($sql->rowCount() == 1)
                return true;
            else
                return false;
        }

        public static function cadastrarUsuario($user, $senha, $imagem, $nome){
            $sql = MySql::conectar()->prepare("INSERT INTO tb_admin_usuarios VALUES (null,?,?,?,?)");
            $sql->execute(array($user,$senha, $imagem, $nome));

        }
    
    
    }

?>