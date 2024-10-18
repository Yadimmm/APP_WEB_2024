//Esto es un comentario

/*
ESto es un comentario de varias lineas de codigo JS por que JS es muy JS y pues JS y JS para todos WOW que JS esta este JS
*/

//alerta
//alert("Hola que tal,soy una alerta")

//variables
var nombre = "Yadier Perez";
let nombre2 = "Rodolfo El Reno";
let edad = 20;
let estatura = 1.8;
let logico = true;
//Mostrar en consola
console.log("Hola estoy en la consola");
console.log("Hola tengo" + edad + "años");
//Mostrar en pantalla
document.write("Hola estoy en la pantalla <br>");
document.write("<h2>Hola tengo" + edad + "años</h2>");
//MOstrar en pantalla getElementById
let datos = document.getElementById("informacion");
datos.innerHTML = "Hola este es el contenido de innerHTML";
datos.innerHTML += "<hr><h3>Hola soy otro contenido de innerHTML</h3>";
datos.innerHTML += "<hr><h3>Mido:" + estatura + "</h3>";
datos.innerHTML += `
        <br>
        <h1>
        <hr>
        Hola soy contenido de innerHTML mi nombre es: ${nombre}
        <br> y mi estatura es ${estatura}
        </h1>`;
//Condicionales
if (edad >= 18) datos.innerHTML += `<hr>Soy Mayor de edad`;
else datos.innerHTML += `Soy menor de edad`;
//Ciclos
for (let i = 1; i <= 2; i++) {
  datos.innerHTML += `<hr><h3>El numero es ${i}</h3>`;
}
//While
let i=1;
while (i<5)
{
    datos.innerHTML+=`<hr><h3>El numero es ${i}</h3>`;
    i++
}
i=1;
do
{
    datos.innerHTML+=`<hr><h3>Do while El numero es ${i}</h3>`;
    i++;
}
while(i<=5);

//1.Funcion que no recibe parametros y no regresa valor
function suma1()
{
let n1=2;
let n2=3;
let suma=n1+n2;
datos.innerHTML=`<hr><h3>El resultado de la suma es: ${suma}</h3>`;
}

suma1();
//2.Funcion que no recibe parametros y regresa valor
function suma2()
{
let n1=1;
let n2=3;
let suma=n1+n2;
return suma;
}

let sum=suma2();
datos.innerHTML=`<hr><h3>El resultado de la suma2 es: ${sum}</h3>`;
//3.Funcion que recibe parametros y no regresa valor
function suma3(numero1,numero2)
{
let n1=numero1;
let n2=numero2;
let suma=n1+n2;
datos.innerHTML=`<hr><h3>El resultado de la suma3 es: ${suma}</h3>`;
}
suma3(23,45);
//4.Funcion que recibe parametros y regresa valor
function suma4(numero1,numero2)
{
let n1=numero1;
let n2=numero2;
let suma=n1+n2;
return suma;
}
let su=suma4(4,4);
datos.innerHTML=`<hr><h3>El resultado de la suma4 es: ${su}</h3>`;

//Arreglos
let animales=[];
animales[0]="Perro";
animales[1]="Gato";
animales[2]="Ave";

let animales2=["Tigre","Leon","Elefante"];

for(let i=0; i<=animales.length;i++)
{
  datos.innerHTML+=`<hr><h3> El animal es: ${animales[i]}</h3>`;
}

animales2.forEach(element => {
  datos.innerHTML+=`<hr><h3> El animal es: ${element}</h3>`;
});