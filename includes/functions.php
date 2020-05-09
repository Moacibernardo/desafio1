<?php 
    
    /**
     * Defina uma função que receba um id numérico e retorne a
     * maquina que tem como id este que foi dado
     */
    function maquinaPorId($id){

        // Trazer o array de maquinas aqui para dentro!
        global $maquinas;

        // Realizar o 'for' procurando a maquina que tem o id igual a $id
        foreach ($maquinas as $maquina) {
            if($maquina["id"] == $id){
                return $maquina;
            }
        }

        // Terminando o for, se não encontrar maquina nenhuma, retornar false
        return false;
    }
    /**
     * Defina uma função que retorne um array com as maquinas
     * de destaque. Dica: $vetor[] = 3 adiciona o número 3
     * na última posição de $vetor
     */
    function maquinasComDestaque(){

        // Trazer o array de maquinas aqui para dentro!
        global $maquinas;

        // Criando um array vazio para guardar as maquinas em destaque
        $comDestaque = [];

        // Realizar o 'for' procurando as maquinas em destaque
        foreach ($maquinas as $maquina) {

            // Se a maquina for destaque...
            if($maquina["destaque"]){

                // ... adicionar ela ao array $emDestaque
                $comDestaque[] = $maquina;

            }
        }

        // Terminando o for! Devemos retornar todas as maquinas em destaque
        return $comDestaque;
        
    }


     /**
     * Defina uma função que retorne um array com as maquinas
     * de destaque. Dica: $vetor[] = 3 adiciona o número 3
     * na última posição de $vetor
     */
    function maquinasSemDestaque(){
        // Trazer o array de maquinas aqui para dentro!
        global $maquinas;

        // Criando um array vazio para guardar as maquinas em destaque
        $semDestaque = [];

        // Realizar o 'for' procurando as maquinas em destaque
        foreach ($maquinas as $maquina) {

            // Se a maquina for destaque...
            if(!$maquina["destaque"]){

                // ... adicionar ela ao array $emDestaque
                $semDestaque[] = $maquina;

            }
        }

        // Terminando o for! Devemos retornar todas as maquinas em destaque
        return $semDestaque;
    }

    /**
     * Defina uma função que retorne a maquina mais cara do menu
     * Essa função não recebe nenhum parâmetro.
     * Ela acessar a variável $maquinas utilizando o global
     */
    function maquinaMaisCara(){
        // Trazer o array de maquinas aqui para dentro!
        global $maquinas;

        // Verificando se existem maquinas no array de maquinas
        if(!$maquinas){
            return false;
        }

        // Realizar o 'for' procurando a maquina mais cara
        $maisCara = $maquinas[0];
        for ($i=1; $i < count($maquinas); $i++) {
            $maquina = $maquinas[$i];

            if($maquina["preco"] > $maisCara["preco"]){
                $maisCara = $maquina;
            }
        }

        // Terminando o for retornando a maquina que for mais cara
        return $maisCara;
    }

/**
 * Defina uma função que retorne a maquina mais barata do menu
 * Essa função não recebe nenhum parâmetro.
 * Ela acessar a variável $maquinas utilizando o global
 */
    function maquinaMaisBarata(){
        // Trazer o array de maquinas aqui para dentro!
        global $maquinas;

        // Verificando se existem maquinas no array de maquinas
        if(!$maquinas){
            return false;
        }

        // Realizar o 'for' procurando a maquina mais cara
        $maisBarata = $maquinas[0];
        for ($i=1; $i < count($maquinas); $i++) {
            $maquina = $maquinas[$i];

            if($maquina["preco"] < $maisBarata["preco"]){
                $maisBarata = $maquina;
            }
        }

        // Terminando o for retornando a maquina que for mais cara
        return $maisBarata;
    }

/**
 * Defina uma função que recebe o trecho de nome de uma maquina
 * e retorna um array contendo todas as maquinas que contenham
 * o trecho
 */
    function buscaMaquina($trecho){
        global $maquinas;
        $resultado = [];
        foreach ($maquinas as $maquina){
            if (stripos ($maquina['nome'], $trecho) !== false){
                $resultado[] = $maquina;
            }
        }
        return $resultado;
    }

/**
 * Defina uma função que impima as informações de uma maquina
 */
    function maquinaPrint($maquina){}
    /**
     * Carrega os usuários do arquivo usuarios.json
     * e retorna um array associativo contendo os usuários
     */
function carregaUsuarios()
{
    echo ('add usuario executada');
    // Ler o arquivo para uma variável string
    $strJson = file_get_contents("../includes/usuarios.json");

    // transformar a string em array assoc (json_decode)
    $usuarios = json_decode($strJson, true);

    // retornar o array assoc
    return $usuarios;
}

/**
 * Adiciona um novo usuário no arquivo usuarios.json
 */
function addUsuario($nome, $email, $senha, $imagem)
{
    //carrega usuarios usando a função anterior
    $usuarios = carregaUsuarios();

    //cria um array associativo $u com os dados passados por parâmetro
    $u = [
        'nome' => $nome,'email' => $email,'senha' => password_hash($senha, PASSWORD_DEFAULT), 'imagem' => $imagem
    ];

    //adiciona $u ao final do array
    $usuarios[] = $u;

    //transforma o array de usuários de volta em string json
    $stringjson = json_encode($usuarios);

    // Verificando se existe algum caractere na stringjson.
    // se tiver, salva no arquivo usuarios.json
    if ($stringjson) {
        //salva a string json no arquivo usuarios.json
        file_put_contents('../includes/usuarios.json', $stringjson);
    }
}


function carregaProdutos()
{
    echo ('add produto executada');
    // Ler o arquivo para uma variável string
    $strJson = file_get_contents("../desafio1/includes/produtos.json");

    // transformar a string em array assoc (json_decode)
    $produtos = json_decode($strJson, true);

    // retornar o array assoc
    return $produtos;
}

/**
 * Adiciona um novo produto no arquivo produtos.json
 */
function addProduto($nome, $descricao, $preco, $imagem)
{
    //carrega produtos  usando a função anterior
    $produtos = carregaprodutos();

    //cria um array associativo $p com os dados passados por parâmetro
    $p = [
        'nome' => $nome, 'descricao' => $descricao, 'preco' => $preco,
        'imagem' => $imagem
    ];

    //adiciona $p ao final do array
    $produtos[] = $p;

    //transforma o array de produtos de volta em string json
    $stringjson = json_encode($produtos);

    // Verificando se existe algum caractere na stringjson.
    // se tiver, salva no arquivo produtos.json
    if ($stringjson) {
        //salva a string json no arquivo produtos.json
        file_put_contents('../desafio1/includes/produtos.json', $stringjson);
    }
}



