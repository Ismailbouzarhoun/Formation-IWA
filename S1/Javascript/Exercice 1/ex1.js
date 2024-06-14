function ajouter() {
    var couleur = document.getElementById('color').value;
    var rectangles = document.querySelectorAll('.rectangle');
    for (var i = rectangles.length - 1; i > 0; i--) {
        rectangles[i].style.backgroundColor = rectangles[i - 1].style.backgroundColor;
    }
    rectangles[0].style.backgroundColor = couleur;
}