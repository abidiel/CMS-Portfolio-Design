
<?php

    class Usuario{
        public function atualizarUsuario($user, $id_usuario, $nome,$senha,$imagem,$cargo){


            // echo '<br>';
            // echo 'debug';
            // echo '<br>';
            
            // echo $id_usuario;
            // echo '<br>';

            // echo $nome;
            // echo '<br>';

            // echo $senha;
            // echo '<br>';

            // echo $imagem;
            // echo '<br>';



            $sql = MySql::conectar()->prepare("UPDATE tb_admin_usuarios SET user= ?, nome=?, password=?, img=?, cargo=? WHERE id=?");
            if($sql->execute([$user, $nome, $senha, $imagem, $cargo, $id_usuario])){
                //atualizado com sucesso
                return true;
            } else {
                return false;
            }

        }
        

    }

?>