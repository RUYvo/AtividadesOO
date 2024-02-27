<?php
// Aula 02 Exercícios:
// 01)------------------------------------------------------------------------------------------
// Crie uma classe chamada 'Livro' com propriedades privadas 'titulo' e 'autor'.
// Implemente um método construtor para inicializar essas propriedades.
// Em seguida, crie um objeto da classe 'Livro' e exiba suas propriedades.
namespace Aula02Atividade01{
class Livro {
    private $titulo;
    private $autor;

    public function __construct($titulo,$autor){
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function setNewTitulo($newTitulo){
        $this->titulo = $newTitulo;
    }
    public function setNewAutor($newAutor){
        $this->autor = $newAutor;
    }
}

$livro = new Livro("As aventruas de um casado","George Pamonha");
    
echo "Titulo do Livro: " . $livro -> getTitulo() . "<br>";
echo "Autor do Livro: " . $livro -> getAutor() . "<br>";

echo "<br>";
}
// 02)------------------------------------------------------------------------------------------------------------------------------------------------------
// Modifique a classe 'Livro' do exercício anterior.
// Adicione métodos públicos 'setTitulo($novoTitulo)' e 'setAutor($novoAutor)' que permitem modificar as propriedades.
// Use esses métodos para alterar o título e o autor do objeto criado.
namespace Aula02Atividade02{
$livro -> setNewTitulo("Aooooooooooo bebê!");
$livro -> setNewAutor("Luiz Felipekkkkkkkkkkkk");

echo "Titulo do Livro: " . $livro -> getTitulo() . "<br>";
echo "Autor do Livro: " . $livro -> getAutor() . "<br>";

echo "<br>";
}
// 03------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie uma classe base chamada 'Animal' com propriedades privadas 'nome' e 'idade'.
// Implemente um método construtor e métodos públicos para acessar e modificar essas propriedades.
// Crie uma classe derivada chamada 'Cachorro' que herda de 'Animal' e sobrescreva o método de acesso à propriedade 'idade'.
// Crie um objeto da classe 'Cachorro' e exiba suas propriedades.
namespace Aula02Atividade03{
class Animal {
    private $nome;
    private $idade;
    public function __construct($nome,$idade){
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }
}

class Cachorro1 extends Animal{
    public function getIdade(){
        return $this->idade;
    }
}

$cachorro = new Cachorro1("Bob", 5);

echo "Nome do cachorro:". $cachorro -> getNome() . "<br>";
echo "Idade do cachorrro:". $cachorro -> getIdade() . "<br>";

echo "<br>";
}
// 04)---------------------------------------------------------------------------------------------------------------------------------------
// Modifique a classe 'Cachorro' do exercício anterior.
// Torne as propriedades 'nome' e 'idade' protegidas e utilize métodos getters e setters para acessá-las e modificá-las.
namespace Aula02Atividade04{
class Cachorro extends Animal{
    public function getIdade(){
        return $this->idade;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
}

$cachorro = new Cachorro("Marley", 7);
echo "Nome do cachorro:". $cachorro -> getNome() . "<br>";
echo "Idade do cachorrro:". $cachorro -> getIdade() . "<br>";

echo "<br>";
}
// 05)---------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie uma classe chamada 'Calculadora' com um método estático chamado 'soma' que recebe dois números e retorna a soma.
// Não é necessário instanciar a classe para utilizar o método 'soma'.
// Demonstre a utilização deste método.
namespace Aula02Atividade05{
class Calculadora {
    public static function soma($num1, $num2){
        return $num1 + $num2;
    }
}

echo "A soma de 5 e 3 é: " . Calculadora::soma(5, 3) ."<br>";

echo "<br>";
}
//Aula 03
// 01)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Defina uma classe base 'Veiculo' com propriedades como 'marca' e 'modelo'.
// Crie duas classes derivadas, 'Carro' e 'Moto', que herdam de 'Veiculo'.
// Implemente métodos específicos para cada classe e um método comum para exibir informações gerais.
// Demonstre o polimorfismo chamando o método comum com objetos de ambas as classes derivadas.
namespace Aula03Atividade01{
class Veiculo {
    protected $marca;
    protected $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function exibirInformacoes() {
        echo "Marca: {$this->marca}, Modelo: {$this->modelo}\n";
    }
}

class Carro extends Veiculo {
    private $numeroPortas;

    public function __construct($marca, $modelo, $numeroPortas) {
        parent::__construct($marca, $modelo);
        $this->numeroPortas = $numeroPortas;
    }

    public function exibirInformacoes() {
        parent::exibirInformacoes();
        echo "Tipo: Carro, Número de Portas: {$this->numeroPortas}\n";
    }
}

class Moto extends Veiculo {
    private $cilindradas;

    public function __construct($marca, $modelo, $cilindradas) {
        parent::__construct($marca, $modelo);
        $this->cilindradas = $cilindradas;
    }

    public function exibirInformacoes() {
        parent::exibirInformacoes();
        echo "Tipo: Moto, Cilindradas: {$this->cilindradas}\n";
    }
}

$carro = new Carro("Toyota", "Corolla", 4);
$moto = new Moto("Honda", "CBR600RR", 600);

$carro->exibirInformacoes();
$moto->exibirInformacoes();
}
// 02)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie uma trait chamada 'Mensagens' que define um método 'enviarMensagem'.
// Crie duas classes, 'EmailSender' e 'SMSSender', que utilizam a trait 'Mensagens'.
// Demonstre a utilização da trait em ambas as classes.
namespace Aula03Atividade02{
trait Mensagens {
    public function enviarMensagem($mensagem) {
        echo "Enviando mensagem: {$mensagem}\n";
    }
}

class EmailSender {
    use Mensagens;

    public function enviarEmail($destinatario, $assunto, $corpo) {
        $mensagem = "Para: {$destinatario}, Assunto: {$assunto}, Corpo: {$corpo}";
        $this->enviarMensagem($mensagem);
    }
}

class SMSSender {
    use Mensagens;

    public function enviarSMS($numero, $texto) {
        $mensagem = "Para: {$numero}, Texto: {$texto}";
        $this->enviarMensagem($mensagem);
    }
}

$emailSender = new EmailSender();
$emailSender->enviarEmail("exemplo@example.com", "Teste", "Este é um e-mail de teste");

$smsSender = new SMSSender();
$smsSender->enviarSMS("123456789", "Este é um SMS de teste");
}
// 03)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie duas classes, 'Cliente' e 'Pedido', no namespace 'Loja'.
// Em seguida, crie uma classe 'Pagamento' em um namespace diferente, por exemplo, 'Financeiro'.
// Demonstre a utilização das classes em seus respectivos namespaces.
namespace Aula03Atividade03{
namespace Loja {
    class Cliente {
        private $nome;

        public function __construct($nome) {
            $this->nome = $nome;
        }

        public function getNome() {
            return $this->nome;
        }
    }

    class Pedido {
        private $numero;

        public function __construct($numero) {
            $this->numero = $numero;
        }

        public function getNumero() {
            return $this->numero;
        }
    }
}

namespace Financeiro {
    class Pagamento {
        private $valor;

        public function __construct($valor) {
            $this->valor = $valor;
        }

        public function getValor() {
            return $this->valor;
        }
    }
}

use Loja\Cliente;
use Loja\Pedido;
use Financeiro\Pagamento;

$cliente = new Cliente("João");
$pedido = new Pedido("123456");

echo "Cliente: " . $cliente->getNome() . "\n";
echo "Pedido: " . $pedido->getNumero() . "\n";

$pagamento = new Pagamento(100.50);
echo "Valor do Pagamento: " . $pagamento->getValor() . "\n";
}
// 04)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie uma classe base 'Animal' com um método 'emitirSom'.
// Crie duas classes derivadas, 'Cachorro' e 'Gato', que herdam de 'Animal'.
// Sobrescreva o método 'emitirSom' em ambas as classes derivadas para representar o som característico.
// Demonstre o polimorfismo chamando o método comum com objetos de ambas as classes derivadas.
namespace Aula03Atividade04{
class Animal {
    public function emitirSom() {
        echo "Som genérico de animal\n";
    }
}

class Cachorro extends Animal {
    public function emitirSom() {
        echo "Au au!\n";
    }
}

class Gato extends Animal {
    public function emitirSom() {
        echo "Miau!\n";
    }
}

$cachorro = new Cachorro();
$gato = new Gato();

echo "Cachorro faz: ";
$cachorro->emitirSom();

echo "Gato faz: ";
$gato->emitirSom();
}
// 05)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie duas traits, 'LogErro' e 'LogInfo', ambas com um método 'registrarLog'.
// Em seguida, crie uma classe 'Registro' que utiliza ambas as traits.
// Demonstre o uso da classe e resolva possíveis conflitos de métodos.
namespace Aula03Atividade05{
trait LogErro {
    public function registrarLog($mensagem) {
        echo "Erro: $mensagem\n";
    }
}

trait LogInfo {
    public function registrarLog($mensagem) {
        echo "Info: $mensagem\n";
    }
}

class Registro {
    use LogErro, LogInfo {
        LogErro::registrarLog insteadof LogInfo; // Resolve conflito usando o método da trait LogErro
        LogInfo::registrarLog as registrarLogInfo; // Renomeia o método da trait LogInfo
    }
}

$registro = new Registro();

$registro->registrarLog("Este é um erro");

$registro->registrarLogInfo("Esta é uma informação");
}
?>
