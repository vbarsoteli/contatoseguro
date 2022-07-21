<?php 

    class UsuarioEmpresa {

        public function List() {

            //
            $id_usuario = $this->id;

            //       
            $ch = curl_init('http://localhost/teste/contato_seguro_teste_senior/backend/api/usuario_empresa/'.$id_usuario);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'Authorization: Bearer eyJ0eXAiOib929s69208siOiJIUzI1NiJ9'));
            $saida = curl_exec($ch);
            curl_close($ch);

            //
            return $saida;

        }

        
    }