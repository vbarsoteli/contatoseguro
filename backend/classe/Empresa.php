<?php 

    class Empresa {

        public function Post() {

            //       
            $ch = curl_init('http://localhost/teste/contato_seguro_teste_senior/backend/api/empresa');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST, true));
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'Authorization: Bearer eyJ0eXAiOib929s69208siOiJIUzI1NiJ9'));
            $saida = json_decode(curl_exec($ch), true);
            curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            //
            return $saida;

        }

        public function Put() {

             //       
             $ch = curl_init('http://localhost/teste/contato_seguro_teste_senior/backend/api/empresa/'.$this->id);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
             curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST, true));
             curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'Authorization: Bearer eyJ0eXAiOib929s69208siOiJIUzI1NiJ9'));
             $saida = json_decode(curl_exec($ch), true);
             curl_getinfo($ch, CURLINFO_HTTP_CODE);
             curl_close($ch);

             //
             return $saida;

        }

        public function Delete() {
    
            //       
            $ch = curl_init('http://localhost/teste/contato_seguro_teste_senior/backend/api/empresa/'.$this->id);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'Authorization: Bearer eyJ0eXAiOib929s69208siOiJIUzI1NiJ9'));
            curl_exec($ch);
            curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

        }

        public function Get() {

            //
            $id_usuario = $this->id;

            //       
            $ch = curl_init('http://localhost/teste/contato_seguro_teste_senior/backend/api/empresa/'.$id_usuario);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'Authorization: Bearer eyJ0eXAiOib929s69208siOiJIUzI1NiJ9'));
            $saida = json_decode(curl_exec($ch), true);
            curl_close($ch);

            //
            return $saida;

        }

        public function List() {

            //       
            $ch = curl_init('http://localhost/teste/contato_seguro_teste_senior/backend/api/empresa');
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