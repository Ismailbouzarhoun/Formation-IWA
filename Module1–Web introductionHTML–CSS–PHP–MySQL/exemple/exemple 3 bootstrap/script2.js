fetch("students.json")
.then(function(response){
    return response.json();
})
.then(function(students){
    let placeholder = document.querySelector("#data-output");
    let out = "";
    for(let student of students){
        out += `
        <tr>
        <td>${student.N}</td>
        <td>${student.LastName}</td>
        <td>${student.FirstName}</td>
        <td>${student.Email}</td>
        <td> <img src='${student.Photo}'> </td>
        </tr>
        `;
    }
    placeholder.innerHTML = out;
});
