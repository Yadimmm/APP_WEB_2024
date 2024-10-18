function operacion() {
    let n1,n2,tipo,ope,resul;

    n1 = parseFloat(document.getElementById("n1").value);
    n2 = parseFloat(document.getElementById("n2").value);
    tipo = document.getElementById("tipo").value;
    
    if (isNumber(n1) && isNumber(n2))
    {
            switch (tipo) 
            {
                case "+": ope = n1 + n2; break;
                case "-": ope = n1 - n2; break;
                case "*": ope = n1 * n2; break;
                case "/": ope = n1 / n2; break;
            }
    
            resul = document.getElementById("resultado").innerHTML = `<h2>${n1} ${tipo} ${n2} = ${ope} </h2>`
    }
    else{
    resul = document.getElementById("resultado").innerHTML = `<h2>Ingrese solo numeros...</h2>`
    alert("Ingrese solo numeros")
    }
   
}

function isNumber(n) {
    return !isNaN(parseFloat(n) && isFinite(n))
}