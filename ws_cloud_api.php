<?php 

namespace Classes;

class ws_cloud_api{

    public function __construct($ws, $texto){
        $this->ws = $ws;
        $this->texto = $texto;
    }

    public function send1textws(){
        //token de fb
        $token="mi token";
        //telefono al q se va emviar msj
        $telefono="57{$this->ws}";
        //url a donde se enviará el mensaje
        $url="https://graph.facebook.com/v17.0/115280074990733/messages";
        //configuración del mensaje
        /*
        $mensaje= '{'
                .'"messaging_product": "whatsapp", '
                .'"recipient_type": "individual", '
                .'"to": "'.$telefono.'", '
                .'"type": "template", '
                .'"template": '
                    .'{ '
                    .'"name": "hello_world", '
                    .'"language": { "code":"en_US" } '
                    .'} '
                .'}'
        ;
        */
        
        $mensaje= '{'
            .'"messaging_product": "whatsapp", '
            .'"recipient_type": "individual", '
            .'"to": "'.$telefono.'", '
            .'"type": "text", '
            .'"text": '
                .'{ '
                .'"preview_url": false, '
                .'"body": "'.$this->texto.'"'
                .'} '
            .'}'
        ;
        
        //declaramos las cabeceras
        $header=array("Authorization: Bearer " . $token, "Content-Type:application/json",);
        //iniciamos la curl
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); // Establecer la URL a la que se va a realizar la solicitud
        curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //obtenemos la respuesta del envío de la información
        $response=json_decode(curl_exec($curl), true); // Ejecutar la solicitud y obtener la respuesta
        //imprimimos la respuesta
        //print_r($response);
        //obtenemos el código de la respuesta
        $status_code=curl_getinfo($curl, CURLINFO_HTTP_CODE);
        //cerramos la curl
        curl_close($curl);
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $telws = $_POST['ws'];
    $mensaje = $_POST['mensaje'];
    $api = new ws_cloud_api($telws, $mensaje);
    $api->send1textws();
    header('Location: /');
}