window.addEventListener('load', () => {
    loadStudentsFromServer();

    window.addEventListener('online', () => {
        syncDataWithServer();
    });

    window.addEventListener('offline', () => {
    });
});
function loadStudentsFromServer() {
    $.get("http://localhost:8080/api/etudiants", (data) => {
        data.forEach(student => {
            tr=document.createElement('tr')
            
            id=document.createElement("td")
            id.innerHTML=student.id

            nom=document.createElement("td")            
            nom.innerHTML=student.nom

            age=document.createElement("td")
            age.innerHTML=student.age

            filiere=document.createElement("td")
            filiere.innerHTML=student.filiere.nomFiliere

            action=document.createElement("td")
            action.innerHTML="<img src=images/delete.png onclick=deleteStudent(event)>"

            tr.appendChild(id);
            tr.appendChild(nom);
            tr.appendChild(age);
            tr.appendChild(filiere);
            tr.appendChild(action);
            liste_students=document.getElementById('liste_students')
            liste_students.appendChild(tr)
        }
        );
    });


}

function addStudent() {
    const studentData = [
        document.getElementById('id').value,
        document.getElementById('nom').value,
        document.getElementById('age').value,
        document.getElementById('filiere').value,
    ];

    if (navigator.onLine) {
        sendDataToServer(studentData);
    } else {
        storeDataInOfflineQueue(studentData);
    }
}

function storeDataInOfflineQueue(studentData) {
    const offlineQueue = getOfflineQueue();
    offlineQueue.push(studentData);
    setOfflineQueue(offlineQueue);
    console.log("Data stored in offline queue:", studentData);
}


function storeDataLocally(studentData) {
    const key = `student_${studentData[0]}`;

    localStorage.setItem(key, JSON.stringify({
        id: studentData[0],
        nom: studentData[1],
        age: studentData[2],
        filiere: studentData[3]
    }));
}


function deleteDataLocally(studentData) {
    console.log("Deleting data locally");
    const key = `student_${studentData[0]}`;
    localStorage.removeItem(key);
}

function getOfflineQueue() {
    const offlineQueueString = localStorage.getItem('offlineQueue');
    return JSON.parse(offlineQueueString) || [];
}

function setOfflineQueue(offlineQueue) {
    localStorage.setItem('offlineQueue', JSON.stringify(offlineQueue));
}

function syncDataWithServer() {
    const offlineQueue = getOfflineQueue();

    offlineQueue.forEach(studentData => {
        sendDataToServer(studentData);
    });

    setOfflineQueue([]);
}


function sendDataToServer(studentData) {
    const studentspring = {
        id: studentData[0],
        nom: studentData[1],
        age: studentData[2]
    };

    $.ajax({
        type: "POST",
        url: `http://localhost:8080/api/filieres/${studentData[3]}/etudiants`,
        data: JSON.stringify(studentspring),
        success: function (response) {
            console.log("success");
            deleteDataLocally(studentData);
            location.reload();
            
            
        },
        error: function () {
            console.log("error");
        },
        contentType: "application/json"
    });
}

function deleteStudent(event) {
    const row = event.target.parentNode.parentNode;
    const id = row.children[0].innerHTML;

    localStorage.removeItem(id);

    deleteStudentFromServer(id);
}

function deleteStudentFromServer(studentId) {
    $.ajax({
        url: `http://localhost:8080/api/etudiants/${studentId}`,
        type: 'DELETE',
        success: function (result) {
            location.reload();
        },
        error: function () {
            console.log("error");
        }
    });
}