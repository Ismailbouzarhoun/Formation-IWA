function getData(){
    $.get("http://localhost:8090/api/etudiants",data=>{
        data.forEach(etudiants => {
            console.log(etudiants)
        });
    })
}
function addEtudiant(){
    id = $("#id").val()
    nom = $("#nom").val()
    age = $("#age").val()
    idFiliere = $("#filiere").val()
    backEndURL = "http://localhost:8090/api/filieres/"+idFiliere+"/etudiants"

    etudiant = {}
    etudiant["id"]=id; etudiant["nom"]=nom;etudiant["age"]=age;

    $.ajax({
        type: "post",
        url: backEndURL,
        data: JSON.stringify(etudiant),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            console.log(response)
        }
    });
}
window.addEventListener("online",()=>{
    $("#status").html("En ligne");
    $("#status").attr("class","online");
    readAll();
});
window.addEventListener("offline",()=>{
        $("#status").html("Hors ligne");
        $("#status").attr("class","offline");
});