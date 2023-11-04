function calculer(){
    N1=parseInt(document.getElementById('N1').value)
    N2=parseInt(document.getElementById('N2').value)
    R=N1+N2
    document.getElementById('resultat').innerText=R
    if (R<0){
        document.getElementById('resultat').style="color:red"
    }
    else{
        document.getElementById('resultat').style="color:black"
    }

}