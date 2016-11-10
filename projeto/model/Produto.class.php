<?php 

include_once('../model/Tipo.class.php');
include_once('../model/Fornecedor.class.php');

class Produto{
    private $id;
    private $nome;
    private $valor;     
    private $fornecedor;
    private $validade;
    private $tipo;

    public function __construct(){
        $this->tipo = new Tipo();
        $this->fornecedor = new Fornecedor();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of valor.
     *
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Sets the value of valor.
     *
     * @param mixed $valor the valor
     *
     * @return self
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Gets the value of fornecedor.
     *
     * @return mixed
     */
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * Sets the value of fornecedor.
     *
     * @param mixed $fornecedor the fornecedor
     *
     * @return self
     */
    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }

    /**
     * Gets the value of validade.
     *
     * @return mixed
     */
    public function getValidade()
    {
        return $this->validade;
    }

    /**
     * Sets the value of validade.
     *
     * @param mixed $validade the validade
     *
     * @return self
     */
    public function setValidade($validade)
    {
        $this->validade = $validade;

        return $this;
    }

    /**
     * Gets the value of tipo.
     *
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Sets the value of tipo.
     *
     * @param mixed $tipo the tipo
     *
     * @return self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
}

 ?>