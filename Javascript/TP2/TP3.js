window.addEventListener("load",()=>{

})
window.onload=function(){
    for(i=0;i<localStorage.length;i++){
        id=localStorage.key(i)
        student=localStorage.getItem(id)
        student=JSON.parse(student)
        ligne = document.createElement('tr')
        id=document.createElement('td')
        nom=document.createElement('td')
        prenom=document.createElement('td')
        filiere=document.createElement('td')
        action = document.createElement('td')
        id.innerHTML=student.id
        nom.innerHTML=student.nom
        prenom.innerHTML=student.prenom
        filiere.innerHTML=student.filiere
        action.innerHTML = "<img src=images/delete.png onclick=deleteStudent(event)>"
        ligne.appendChild(id)
        ligne.appendChild(nom)
        ligne.appendChild(prenom)
        ligne.appendChild(filiere)
        ligne.appendChild(action)
        students.appendChild(ligne)
    }
}

function addStudent(){
    students= document.getElementById('students')
    td=[
        document.getElementById('id').value,
        document.getElementById('nom').value,
        document.getElementById('prenom').value,
        document.getElementById('filiere').value,
        "<img src=images/delete.png onclick=deleteStudent(event)>"
    ]
    ligne = document.createElement('tr')
    td.forEach((e)=>{
        data=document.createElement('td')
        data.innerHTML=e
        ligne.appendChild(data)
    });
    students.appendChild(ligne)

    student={"id":td[0],"nom":td[1],"prenom":td[2],"filiere":td[3]}
    localStorage.setItem(td[0],JSON.stringify(student))
}

function deleteStudent(event){
    ligne=event.target.parentNode.parentNode
    ligne.remove()

    id=ligne.children[0].innerHTML
    localStorage.removeItem(id)
}