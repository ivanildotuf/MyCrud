<?php
/**
 @todo Refatorar o código abaixo
 * Faças as alterações que achar necessário, mas o resultado em tela deve ser o mesmo.
 * Leve em consideração a sua interpretação de um código limpo e organizado.
 */
class Pessoas {

    public $idPessoa;
    public $nomePessoa;

    public function salvar_Pessoa($nome, Array &$listaPessoas = array()) {
        $this->idPessoa   = rand();
        $this->nomePessoa = $nome;
        array_push($listaPessoas, array('id' => $this->idPessoa, 'nome' => $this->nomePessoa));
}

    public function listarPessoas($listaPessoas, $listaAnimais) {
        foreach ($listaPessoas as $campo) {
            ?>
                <h2>Propriet&aacute;rio</h2>
                <strong>id :</strong> <?= $campo['id'] ?><br />
                <strong>Nome :</strong> <?= $campo['nome'] ?>
                <h2>Seus Animais cadastrados</h2>
                <?php 
                foreach ($listaAnimais[$campo['id']] as $animal) { 
                ?>
                    <strong>Nome Animal :</strong> <?= $animal['nome_Animal'] ?><br>
                    <strong>Especie :</strong> <?= $animal['Especie'] ?><br>
                    <strong>Raca :</strong> <?= $animal['Raca'] ?><br>
                    <?php if ($animal['Especie'] == 'cachorro') { ?>
                        <strong>nome Tecnico :</strong> Canino<br>
                    <?php } if ($animal['Especie'] == 'gato') { ?>
                        <strong>nome Tecnico :</strong> Felino<br> 
                    <?php } else { ?>
                        <strong>nome Tecnico :</strong> Indefinido<br>
                        <?php
                    }
                }
            ?>
            <hr>
            <?php
        }
    }

}

class Animal {

    public $nome_Animal;
    public $Especie;
    public $Raca;
    public $idPessoa;

    /*
     * Salva Animal
     * @return type
     */
    public function salvar(Array &$listaAnimais = array()) {

        $listaAnimais[$this->idPessoa][] = array(
            'nome_Animal' => $this->idPessoa,
            'Especie'     => $this->Especie,
            'Raca'        => $this->Raca
        );
    }

    public function addAnimalPessoa($nomeAnimal, $especie, $raca, $id_pessoa, $cor) {

        $animal = new Animal();
        $animal->nome_Animal = $nomeAnimal;
        $animal->Especie     = $especie;
        $animal->raca        = $raca;
        $animal->idPessoa    = $id_pessoa;
        $animal->Salvar($animal);
    }

}

$pessoa       = new Pessoas();
$listaPessoas = array();
$pessoa->salvar_Pessoa('Fulano', $listaPessoas);
$animais              = new Animal();
$listaAnimais         = array();
$animais->nome_Animal = 'toto';
$animais->Raca        = 'Australiano';
$animais->Especie     = 'Periquito';
$animais->idPessoa    = $pessoa->idPessoa;
$animais->salvar($listaAnimais);
?>

<html>
    <body>
<?php
$pessoa->listarPessoas($listaPessoas, $listaAnimais);
?>
    </body>
</html>
