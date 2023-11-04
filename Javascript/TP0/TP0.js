//console.log("Bonjour")
//document.write("Bonsoir")
//alert("Hello")
//contenu=document.getElementById('div1').innerText
//console.log(contenu)
//document.getElementById('div1').innerText="Mohamed"
//document.getElementById('nom').value="Mohamed"

function copierColler(){
    document.getElementById("div1").innerText=document.getElementById("nom").value
}
function changeCouleur(){
    couleur=document.getElementById('couleur').value
    document.getElementById("div1").style="background-color:"+couleur
}