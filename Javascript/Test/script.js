function ajouter(){
    nom=document.getElementById("nom").value
    age=document.getElementById("age").value
    person = {"nom":nom,"age":age}
    localStorage.setItem(nom,JSON.stringify(person))
    sessionStorage.setItem(nom,age)
}

function verifier(){
    nom=document.getElementById('nom').value
    person=localStorage.getItem(nom)
    person=JSON.parse(person)
    if(person!=null){
        document.getElementById("age").value=person.age
    }
    
}

function supprimer(){
    nom=document.getElementById('nom').value
    localStorage.removeItem(nom)
}

function afficher(){
    for(i=0;i<localStorage.length;i++){
        key=localStorage.key(i)
        person=localStorage.getItem(key)
        person=JSON.parse(person)
        console.log(person)
    }
}