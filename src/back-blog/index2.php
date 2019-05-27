<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Article blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" id="preview">
        <img src="" id="previewImage">
    </div>
    <div class="container">
        <label for="inputImage">Ajouter une image</label>
        <input type="file" id="inputImage">
    </div>
    <div class="container">
        <button id="envoyer">Envoyer</button>
    </div>


<script>
    
const inputImage = document.getElementById('inputImage');
const previewImage = document.getElementById('previewImage');

inputImage.addEventListener('change', function() {
    let file = inputImage.files[0];
    let reader = new FileReader();

    reader.addEventListener('load', function() {
        previewImage.src = reader.result;
    }, false);

    if(file) {
        reader.readAsDataURL(file);
        article.miniature.fichier = file;      
    }
})

const envoyer = document.getElementById('envoyer');
envoyer.addEventListener('click', function(){
    let formData = new FormData();
    formData.append('article', article);
    console.log('formdata');
    let req = new XMLHttpRequest();
    req.onreadystatechange = function(e) {
        if(this.readyState === 4 && this.status === 200) {
            console.log('requete envoyée')
        } else {
            console.log('erreur dans la requete')
        }
    }
    
    req.open('POST', 'controller.php');
    req.send(formData)
})

let article = {
    titre: "Titre de l'article",
    resume: "Resume de l'Article.",
    miniature: {
        name: "Titre de la miniature",
        fichier: 'fichier test'
    }
} 

let fichiers = [

]

</script>

</body>
</html>

