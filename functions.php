<?php
// Os nomes das funções devem ser nomes únicos e mais detalhados para se diferenciar das funções do próprio wordpress.

function loading_scripts_cmb2() {
    wp_enqueue_media(); // Envia o script do WordPress para upload de arquivos
}

add_action('admin_enqueue_scripts', 'loading_scripts_cmb2');


// Função padrão para pegar campos do wordpress;
function get_field_cmb2($key, $page_id = 0) {
    $id = $page_id !== 0 ? $page_id : get_the_ID();

    return get_post_meta($id, $key, true);
}

function the_field_cmb2($key, $page_id = 0) {
    echo get_field_cmb2($key, $page_id);
}

// Adicionar ação: Toda vez que o primeiro parâmetro iniciar, execute a função do segundo parâmetro. Funciona como um gancho.
// cmb2_admin_init -> função que já existe no próprio plugin, então sempre que o plugin inicar acontecerá a chamada da função de fields para a página home.
add_action('cmb2_admin_init', 'cmb2_fields_home');

// Função de configuração de fields da página home
function cmb2_fields_home() {
    // Criar uma nova caixa de campo, função abaixo (nativa), recebe uma array com pares de chave e valor
    /* Configuração da caixa: 
        1 - id do campo;
        2 - title do campo;
        3 - object_types onde aparecerá o campo o seu valor é uma array com a definição de onde vai aparecer, pode ser mais de uma página ou não;
        4 - show_on, onde exatamente irá aparecer qual página, recebe uma array como valor sendo key, recebe o tipo de page e value que recebe o nome da pagina.extensão (tem que ser o nome exato);
    
    ! essa caixa aparece na página do arquivo que foi colocado em value, na configuração de show_on, aparece forma visual na interface do wordpress.
    */
    $cmb = new_cmb2_box([
        'id' => 'home_box',
        'title' => 'Menu da Semana',
        'object_types' => ['page'],
        'show_on' => [
            'key' => 'page-template',
            'value' => 'page-home.php',
        ],
    ]);

    /* Configuração dos campos:
        O campo é gerado dentro da caixa assim é necessária uma comunicação com a caixa, para isso a caixa vai virar um objeto, atribuindo a função a uma var;
        1 - Adicionar field/campo, var_objeto->add_field([key => value]);
        2 - Definir parâmetros: [nome_campo, id_campo, tipo];
        (tipos de field: https://cmb2.io/docs/field-types)
        3 - Atualiza a interface wordpress e adiciona um campo;
        4 - Puxar a informação do wordpress: mesma forma nativa do wordpress (anotação de como fazer no arquivo txt);
    */
    $cmb->add_field([
        'name' => 'Comida',
        'id' => 'comida',
        'type' => 'text',
    ]);

    $cmb->add_field([
        'name' => 'Descrição',
        'id' => 'descricao',
        'type' => 'textarea',
    ]);
}

// Aqui tem um erro do próprio plugin, vou comentar e usar como exemplo para caso volte a funcionar, vou utilizar outra estratégia para puxar imagens;
/*
// Ação para a página sobre
add_action('cmb2_admin_init', 'cmb2_fields_sobre');

// Função de configuração de fields da página sobre
function cmb2_fields_sobre() {
    $cmb = new_cmb2_box([
        'id' => 'sobre_box',
        'title' => 'Sobre',
        'object_types' => ['page'],
        'show_on' => [
            'key' => 'page-template',
            'value' => 'page-sobre.php',
        ],
    ]);

    error_log('CMB2 fields loaded');

    // Adionando campo de imagem, tipo do campo será 'file', permite configuração de outras opções
    $cmb->add_field([
        'name' => 'Foto Rest',
        'id' => 'foto_rest',
        'type' => 'file',
        'options' => [
            'url' => false,
        ],
        'text' => [
            'add_upload_file_text' => 'Adicionar uma imagem'
        ],
        'attributes' => [
            'data-mediaid' => '', // Certifique-se de que o campo 'mediaid' é inicializado
        ],
    ]);
}
*/
?>