<template>

<footer id="footer">
    <div class="container-fluid" id="cont-footer">
        <div class="row">
            <div class="col-4 ksl">
                <span>Keslène DENIS, 2019</span>
                <br>
                <span>8 rue Auguste Renoir 78400 CHATOU</span>
                <br>
                <span>06.61.35.53.37</span>
            </div>
            <div class="col-4">
                <span>
                    <a href="https://www.instagram.com/kl_beauty_artist/?hl=fr"><i class="fab fa-instagram ic-footer"></i></a>
                </span>
                <span>
                    <a href="https://www.facebook.com/klbeautyartist/"><i class="fab fa-facebook-square ic-footer"></i></a>
                </span>
            </div>
            <div class="col-4">
                <span id="jdsd"> 
                    Développé par <a href="https://www.jdsd.fr/">Jonathan DOS SANTOS DAMIAO</a>
                </span>
            </div>
        </div>
    </div>
</footer>

</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style>

#footer {
    position: absolute; 
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: black;
    text-align: center;
}

#cont-footer {
    padding-top:    10px;
    padding-bottom: 5px;
}

.ic-footer{
    font-size: 1.6rem;
    margin-right: 10px;
}

#jdsd, .ksl span {
    font-size: .9rem;
}

#jdsd a:visited {
    color: #7F38A8;
}


.ic-footer, #jdsd, .ksl span {
    color: #C5A164;
}


</style>

