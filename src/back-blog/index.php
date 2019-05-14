<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Article blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div id="toolbar"></div>
        <div id="editor"></div>
        <button id="btn">enregistrer</button>
    </div>

<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>

var toolbarOptions = [
    ['bold', 'italic' ,'image', 'color', 'code'],
    [{'header':1}, {'header':2}]
]

var options = {
  debug: 'info',
  modules: {
      toolbar: toolbarOptions
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'
}

var editor = new Quill('#editor', options);



var btn = document.getElementById('btn');
    btn.addEventListener('click', function() {
        console.log('test')
        var delta = editor.getContents();
        console.log(delta)
        let article = JSON.stringify(delta);
        fetch('controller.php', {
            method: 'post',
            body: article
        })
        .then((response) => {
            console.log('réponse !')
        })
    
    })
    
let article : {
    titre: "Titre de l'article",
    resume: "Resume de l'Article.",
    miniature: {
        description: "Titre de la miniature",
        fichier: 
    }
}

</script>

</body>
</html>

