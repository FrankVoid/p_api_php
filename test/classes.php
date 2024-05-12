<?php
//promotedproperties son propiedades que se pueden definir desde el constructor
class SuperHero{ //es una clase que define un objeto
    //propiedades y metodos
    //pueden ser privados, protegidos o publicos
    public function __construct( readonly public string $name, readonly public string $power, readonly public string $planet){

    } //metodo constructor que se ejecuta al instanciar un objeto de la clase


    public function descipcion(){
        return "El superheroe $this -> name 
        tiene el poder de $this -> power 
        y viene del planeta $this -> planet";
    }
}

$hero = new SuperHero("batman", "Fuerza, inteligencia", "Gothan/tierra"); //instanciar un objeto de la clase SuperHero

echo $hero -> descipcion(); //imprimir el resultado del metodo descripcion
?>